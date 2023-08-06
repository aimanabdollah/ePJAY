<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use App\Models\Configuration;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\File;

class OrphanController extends Controller
{
    public function index()
    {
        $orphan = Orphan::orderBy('created_at', 'desc')->get();
        $configuration = Configuration::first();
        return view('staf.anak_jagaan.senarai_anak_jagaan', compact('orphan', 'configuration'));
    }

    public function orphanList()
    {
        $configuration = Configuration::first();
        $orphans = Orphan::where('id_pemohon', Auth::id())->get();
        return view('penjaga.anak_jagaan.senarai_anak_jagaan', compact('orphans', 'configuration'));
    }

    public function create()
    {
        $configuration = Configuration::first();
        return view('staf.anak_jagaan.tambah_anak_jagaan', compact('configuration'));
    }

    public function reportList()
    {
        $configuration = Configuration::first();
        $orphan = Orphan::orderBy('created_at', 'desc')->get();

        $jumlahKeseluruhan = Orphan::count();
        $jumlahLelaki = Orphan::where('jantina', 'Lelaki')->count();
        $jumlahPerempuan = Orphan::where('jantina', 'Perempuan')->count();

        $kehilanganAyah = Orphan::where('status', 'Kehilangan Ayah')->count();
        $kehilanganIbu = Orphan::where('status', 'Kehilangan Ibu')->count();
        $kehilanganIbuAyah = Orphan::where('status', 'Kehilangan Ayah dan Ibu')->count();

        return view('staf.anak_jagaan.senarai_laporan_anak_jagaan', compact(
            'configuration',
            'orphan',
            'jumlahKeseluruhan',
            'jumlahLelaki',
            'jumlahPerempuan',
            'kehilanganAyah',
            'kehilanganIbu',
            'kehilanganIbuAyah'
        ));
    }

    public function store(Request $request, Orphan $orphan)
    {
        $validateData = $request->validate([

            'nama_penuh' => 'required',
            'nama_sekolah'   => 'nullable',
            'tarikh_lahir' => 'required',
            'alamat'   => 'required',
            'poskod'   => 'required|digits:5',
            'bandar'   => 'required',
            'negeri'   => 'required',

            'no_kad_pengenalan' => 'required|digits:12|unique:orphans,no_kad_pengenalan',
            'no_telefon'    => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'jantina'   => 'required',
            'status'   => 'required',

            'nama_penuh_ayah' => 'required',
            'no_kad_pengenalan_ayah' => 'required|digits:12',
            'no_telefon_ayah'    => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'pekerjaan_ayah'   => 'nullable',
            'pendapatan_ayah'   => 'nullable',

            'nama_penuh_ibu' => 'required',
            'no_kad_pengenalan_ibu' => 'required|digits:12',
            'no_telefon_ibu'    => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'pekerjaan_ibu'   => 'nullable',
            'pendapatan_ibu'   => 'nullable',

            'sijil_lahir'   => 'required|mimes:pdf|max:2048',
            'sijil_kematian' => 'required|mimes:pdf|max:2048',
            'gambar' => 'nullable|mimes:jpg,png,jpeg|max:2048',

            'tarikh_daftar'   => 'required',

            'komunikasi' => '',
            'matematik'   => '',
            'deria' => '',
            'fizikal' => '',
            'kreativiti'   => '',

        ]);

        $orphan = new Orphan();

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/orphan-img', $filename);
            $orphan->gambar = $filename;
        }

        if ($request->hasFile('sijil_lahir')) {
            $file = $request->file('sijil_lahir');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_sijil_lahir.' . $ext;
            $file->move('assets/sijil_lahir', $filename);
            $orphan->sijil_lahir = $filename;
        }

        if ($request->hasFile('sijil_kematian')) {
            $file = $request->file('sijil_kematian');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_sijil_kematian.' . $ext;
            $file->move('assets/sijil_kematian', $filename);
            $orphan->sijil_kematian = $filename;
        }

        $orphan->nama_penuh = $validateData['nama_penuh'];
        $orphan->nama_sekolah = $validateData['nama_sekolah'];
        $orphan->tarikh_lahir = $validateData['tarikh_lahir'];

        $orphan->alamat = $validateData['alamat'];
        $orphan->poskod = $validateData['poskod'];
        $orphan->bandar = $validateData['bandar'];
        $orphan->negeri = $validateData['negeri'];
        $orphan->status_permohonan = 'Berjaya';
        do {
            $generatedId = 'AKG' . rand(111111, 999999);
        } while (Orphan::where('id_anak_jagaan', $generatedId)->exists());

        $orphan->id_anak_jagaan = $generatedId;
        $orphan->no_kad_pengenalan = $validateData['no_kad_pengenalan'];
        $orphan->no_telefon = $validateData['no_telefon'];
        $orphan->jantina = $validateData['jantina'];
        $orphan->status = $validateData['status'];
        $orphan->tarikh_daftar = $validateData['tarikh_daftar'];

        $orphan->komunikasi = $validateData['komunikasi'];
        $orphan->matematik = $validateData['matematik'];
        $orphan->deria = $validateData['deria'];
        $orphan->fizikal = $validateData['fizikal'];
        $orphan->kreativiti = $validateData['kreativiti'];

        $orphan->nama_penuh_ayah = $validateData['nama_penuh_ayah'];
        $orphan->no_kad_pengenalan_ayah = $validateData['no_kad_pengenalan_ayah'];
        $orphan->no_telefon_ayah = $validateData['no_telefon_ayah'];
        $orphan->pekerjaan_ayah = $validateData['pekerjaan_ayah'];
        $orphan->pendapatan_ayah = $validateData['pendapatan_ayah'];

        $orphan->nama_penuh_ibu = $validateData['nama_penuh_ibu'];
        $orphan->no_kad_pengenalan_ibu = $validateData['no_kad_pengenalan_ibu'];
        $orphan->no_telefon_ibu = $validateData['no_telefon_ibu'];
        $orphan->pekerjaan_ibu = $validateData['pekerjaan_ibu'];
        $orphan->pendapatan_ibu = $validateData['pendapatan_ibu'];

        $saveOrphan = $orphan->save();

        if ($saveOrphan) {
            Alert::success('Berjaya', 'Rekod telah berjaya ditambah');
            return redirect('/admin-orphan');
        } else {
            Alert::error('Gagal', 'Rekod tidak berjaya ditambah');
            return redirect('/admin-orphan');
        }
    }

    public function show(Orphan $orphan)
    {
        $configuration = Configuration::first();
        return view('staf.anak_jagaan.lihat_anak_jagaan', ['orphan' => $orphan], compact('configuration'));
    }

    public function report(Orphan $orphan)
    {

        $configuration = Configuration::first();
        return view('penjaga.anak_jagaan.laporan_anak_jagaan', ['orphan' => $orphan], compact('configuration'));
    }

    public function edit(Orphan $orphan)
    {
        $configuration = Configuration::first();
        return view('staf.anak_jagaan.edit_anak_jagaan', ['orphan' => $orphan], compact('configuration'));
    }

    public function update(Request $request, Orphan $orphan)
    {
        $validateData = $request->validate([
            'nama_penuh' => 'required',
            'nama_sekolah'   => 'nullable',
            'tarikh_lahir' => 'required',
            'alamat'   => 'required',
            'poskod'   => 'required|digits:5',
            'bandar'   => 'required',
            'negeri'   => 'required',

            'no_kad_pengenalan' => 'required|digits:12',
            'no_telefon'    => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'jantina'   => 'required',
            'status'   => 'required',

            'nama_penuh_ayah' => 'required',
            'no_kad_pengenalan_ayah' => 'required|digits:12',
            'no_telefon_ayah'    => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'pekerjaan_ayah'   => 'nullable',
            'pendapatan_ayah'   => 'nullable',

            'nama_penuh_ibu' => 'required',
            'no_kad_pengenalan_ibu' => 'required|digits:12',
            'no_telefon_ibu'    => 'nullable|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'pekerjaan_ibu'   => 'nullable',
            'pendapatan_ibu'   => 'nullable',

            'sijil_lahir'   => 'nullable|mimes:pdf|max:2048',
            'sijil_kematian' => 'nullable|mimes:pdf|max:2048',
            'gambar' => 'nullable|mimes:jpg,png,jpeg|max:2048',

            'tarikh_daftar'   => 'required',

            'komunikasi' => '',
            'matematik'   => '',
            'deria' => '',
            'fizikal' => '',
            'kreativiti'   => '',
        ]);


        // VALIDATION GAMBAR

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/orphan-img', $filename);
            $orphan->gambar = $filename;
        }

        // VALIDATION SIJIL LAHIR

        if ($request->hasFile('sijil_lahir')) {
            $request->validate([
                'sijil_lahir' => 'mimes:pdf|max:2048',
            ]);

            $file = $request->file('sijil_lahir');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_sijil_lahir.' . $ext;
            $file->move('assets/sijil_lahir', $filename);
            $orphan->sijil_lahir = $filename;
        }

        // VALIDATION SIJIL KEMATIAN

        if ($request->hasFile('sijil_kematian')) {
            $request->validate([
                'sijil_kematian' => 'mimes:pdf|max:2048',
            ]);

            $file = $request->file('sijil_kematian');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_sijil_kematian.' . $ext;
            $file->move('assets/sijil_kematian', $filename);
            $orphan->sijil_kematian = $filename;
        }

        $orphan->nama_penuh = $request->nama_penuh;
        $orphan->nama_sekolah = $request->nama_sekolah;
        $orphan->tarikh_lahir = $request->tarikh_lahir;

        $orphan->alamat = $request->alamat;
        $orphan->poskod = $request->poskod;
        $orphan->bandar = $request->bandar;
        $orphan->negeri = $request->negeri;

        $orphan->no_kad_pengenalan = $request->no_kad_pengenalan;
        $orphan->no_telefon = $request->no_telefon;
        $orphan->jantina = $request->jantina;
        $orphan->status = $request->status;
        $orphan->tarikh_daftar = $request->tarikh_daftar;
        $orphan->tarikh_keluar = $request->tarikh_keluar;

        $orphan->komunikasi = $request->komunikasi;
        $orphan->matematik = $request->matematik;
        $orphan->deria = $request->deria;
        $orphan->fizikal = $request->fizikal;
        $orphan->kreativiti = $request->kreativiti;

        $orphan->nama_penuh_ayah = $request->nama_penuh_ayah;
        $orphan->no_kad_pengenalan_ayah = $request->no_kad_pengenalan_ayah;
        $orphan->no_telefon_ayah = $request->no_telefon_ayah;
        $orphan->pekerjaan_ayah = $request->pekerjaan_ayah;
        $orphan->pendapatan_ayah = $request->pendapatan_ayah;

        $orphan->nama_penuh_ibu = $request->nama_penuh_ibu;
        $orphan->no_kad_pengenalan_ibu = $request->no_kad_pengenalan_ibu;
        $orphan->no_telefon_ibu = $request->no_telefon_ibu;
        $orphan->pekerjaan_ibu = $request->pekerjaan_ibu;
        $orphan->pendapatan_ibu = $request->pendapatan_ibu;

        $updateOrphan = $orphan->update();

        // MESEJ KEMASKINI - SWEETALERT
        if ($updateOrphan) {
            Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
            return redirect('/admin-orphan');
        } else {
            Alert::error('Gagal', 'Rekod tidak berjaya dikemaskini');
            return redirect('/admin-orphan');
        }
    }

    public function destroy(Orphan $orphan)
    {
        $orphan->delete();
        Alert::success('Berjaya', 'Rekod telah berjaya dihapus');
        return redirect('/admin-orphan');
    }
}
