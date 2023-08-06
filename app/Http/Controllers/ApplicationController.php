<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Configuration;
use App\Models\Orphan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\View; // Import the View facade.


class ApplicationController extends Controller
{
    public function index()
    {
        $application = Application::where('id_pemohon', Auth::id())->orderBy('created_at', 'desc')->get();
        $configuration = Configuration::first();
        return view('penjaga.permohonan.senarai_permohonan', compact('application', 'configuration'));
    }

    public function viewApplicationApproval()
    {
        $applications = Application::whereNotNull('id_pemohon')
            ->where('status_permohonan', 'Dalam Proses')
            ->latest('created_at')
            ->get();

        $configuration = Configuration::first();

        return view('staf.permohonan.pengesahan_permohonan', compact('applications', 'configuration'));
    }

    public function editApplicationApproval(Application $application)
    {
        $configuration = Configuration::first();
        return view('staf.permohonan.kemaskini_permohonan', ['application' => $application], compact('configuration'));
    }

    public function updateApplicationApproval(Request $request, Application $application)
    {
        $validateData = $request->validate([
            'status_permohonan' => '',
            'tarikh_daftar' => '',
            'ulasan' => '',
        ]);

        $application->update([
            'status_permohonan' => $validateData['status_permohonan'],
            'tarikh_daftar' => $validateData['tarikh_daftar'],
            'ulasan' => $validateData['ulasan'],
            'status_pendaftaran' => ($validateData['status_permohonan'] === 'Berjaya') ? 'Dalam Proses' : null,
        ]);

        Alert::success('Berjaya', 'Permohonan telah dikemaskini');
        return redirect('/application-approval');
    }

    public function viewApplicationRecord()
    {
        $applications = Application::whereNotNull('id_pemohon')
            ->whereIn('status_permohonan', ['Berjaya', 'Tidak Berjaya'])
            ->latest('created_at')
            ->get();

        $configuration = Configuration::first();
        return view('staf.permohonan.senarai_permohonan', compact('applications', 'configuration'));
    }

    public function viewApplicationRegistration()
    {
        $applications = Application::whereNotNull('id_pemohon')
            ->where('status_permohonan', 'Berjaya')
            ->latest('created_at')
            ->get();

        $countApplicationRegistration = $applications->count();

        View::share('applications', $applications);
        View::share('countApplicationRegistration', $countApplicationRegistration);

        $configuration = Configuration::first();
        return view('staf.permohonan.konfirmasi_pendaftaran', compact('applications', 'configuration'));
    }

    public function editApplicationRegistration(Application $application)
    {
        $configuration = Configuration::first();
        return view('staf.permohonan.pendaftaran_permohonan', ['application' => $application], compact('configuration'));
    }

    public function updateApplicationRegistration(Request $request, Application $application)
    {
        $validateData = $request->validate([
            'status_pendaftaran' => 'required',
        ]);


        if ($validateData['status_pendaftaran'] === 'Telah Berdaftar') {

            $application->update([
                'status_pendaftaran' => $validateData['status_pendaftaran'],
            ]);

            do {
                $generatedId = 'AKG' . rand(111111, 999999);
            } while (Orphan::where('id_anak_jagaan', $generatedId)->exists());


            // Populate the orphanData array with fields from the Application model
            $orphanData = [
                'id_pemohon' => $application->id_pemohon,
                'id_permohonan' => $application->id_permohonan,
                'nama_penuh' => $application->nama_penuh,
                'nama_sekolah' => $application->nama_sekolah,
                'tarikh_lahir' => $application->tarikh_lahir,

                'id_anak_jagaan' => $generatedId,

                'alamat' => $application->alamat,
                'poskod' => $application->poskod,
                'bandar' => $application->bandar,
                'negeri' => $application->negeri,
                'no_kad_pengenalan' => $application->no_kad_pengenalan,
                'no_telefon' => $application->no_telefon,
                'jantina' => $application->jantina,
                'status' => $application->status,
                'tarikh_daftar' => $application->tarikh_daftar,
                'tarikh_keluar' => $application->tarikh_keluar,
                'gambar' => $application->gambar,
                'sijil_lahir' => $application->sijil_lahir,
                'sijil_kematian' => $application->sijil_kematian,
                'nama_penuh_ayah' => $application->nama_penuh_ayah,
                'nama_penuh_ibu' => $application->nama_penuh_ibu,
                'no_kad_pengenalan_ayah' => $application->no_kad_pengenalan_ayah,
                'no_kad_pengenalan_ibu' => $application->no_kad_pengenalan_ibu,
                'no_telefon_ayah' => $application->no_telefon_ayah,
                'no_telefon_ibu' => $application->no_telefon_ibu,
                'pekerjaan_ayah' => $application->pekerjaan_ayah,
                'pekerjaan_ibu' => $application->pekerjaan_ibu,
                'pendapatan_ayah' => $application->pendapatan_ayah,
                'pendapatan_ibu' => $application->pendapatan_ibu,
            ];

            Orphan::create($orphanData);
        } else {

            $application->update([
                'status_pendaftaran' => $validateData['status_pendaftaran'],
            ]);
        }

        Alert::success('Berjaya', 'Permohonan telah dikemaskini');
        return redirect('/application-registration');
    }

    public function viewKeputusan(Application $application)
    {
        $configuration = Configuration::first();
        $status = $application->status_permohonan;

        if ($status === 'Berjaya' || $status === 'Tidak Berjaya') {
            return view('penjaga.permohonan.keputusan_permohonan', ['application' => $application], compact('configuration'));
        } else {
            return redirect('/application');
        }
    }

    public function reportList()
    {
        $configuration = Configuration::first();
        $application = Application::whereNotNull('id_pemohon')->orderBy('created_at', 'desc')->get();

        $jumlahPermohonan = Application::whereNotNull('id_pemohon')->count();
        $berjaya = Application::whereNotNull('id_pemohon')->where('status_permohonan', 'Berjaya')->count();
        $tidakBerjaya = Application::whereNotNull('id_pemohon')->where('status_permohonan', 'Tidak Berjaya')->count();
        $dalamProses = Application::whereNotNull('id_pemohon')->where('status_permohonan', 'Dalam Proses')->count();

        return view('staf.permohonan.senarai_laporan_permohonan', compact('application', 'configuration', 'jumlahPermohonan', 'berjaya', 'tidakBerjaya', 'dalamProses'));
    }

    public function create()
    {
        $configuration = Configuration::first();
        return view('penjaga.permohonan.tambah_permohonan', compact('configuration'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([

            'nama_penuh_pemohon' => 'required',
            'no_tel_pemohon'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email_pemohon'   => 'required|email',
            'hubungan_pemohon'   => 'required',
            'pekerjaan_pemohon'   => 'required',

            'nama_penuh' => 'required',
            'nama_sekolah'   => 'nullable',
            'tarikh_lahir' => 'required',
            'alamat'   => 'required',
            'poskod'   => 'required|digits:5',
            'bandar'   => 'required',
            'negeri'   => 'required',

            'no_kad_pengenalan' => 'required|digits:12|unique:applications,no_kad_pengenalan',
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
            'gambar' => 'nullable|mimes:jpg,png,jpeg|max:2048'
        ]);


        $application = new Application();

        do {
            $generatedId = 'PMH' . rand(111111, 999999);
        } while (Application::where('id_permohonan', $generatedId)->exists());

        $application->id_permohonan = $generatedId;

        $application->status_permohonan = 'Dalam Proses';

        $application->id_pemohon = Auth::user()->id;

        if ($request->hasFile('gambar')) {
            $request->validate([
                'gambar' => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/orphan-img', $filename);
            $application->gambar = $filename;
        }

        if ($request->hasFile('sijil_lahir')) {
            $request->validate([
                'sijil_lahir' => 'mimes:pdf|max:2048',
            ]);

            $file = $request->file('sijil_lahir');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_sijil_lahir.' . $ext;
            $file->move('assets/sijil_lahir', $filename);
            $application->sijil_lahir = $filename;
        }

        if ($request->hasFile('sijil_kematian')) {
            $request->validate([
                'sijil_kematian' => 'mimes:pdf|max:2048',
            ]);

            $file = $request->file('sijil_kematian');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '_sijil_kematian.' . $ext;
            $file->move('assets/sijil_kematian', $filename);
            $application->sijil_kematian = $filename;
        }

        $application->fill($validateData);

        $application->save();

        return redirect('application')
            ->with('message', "Permohonan anda telah dihantar");
    }

    public function applicationShow(Application $application)
    {
        $configuration = Configuration::first();
        return view('penjaga.permohonan.lihat_permohonan', ['application' => $application], compact('configuration'));
    }
}
