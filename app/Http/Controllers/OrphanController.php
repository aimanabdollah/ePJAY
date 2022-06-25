<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

// use Illuminate\Support\Facades\File;

class OrphanController extends Controller
{
     public function index()
    {
        $orphan = Application::where('status_permohonan', 'Berjaya')->orderBy('created_at','desc')->get();
        return view('staff.orphan.orphan-list', compact('orphan'));
    }

    public function create()
    {
        return view('staff.orphan.orphan-add');
    }

    public function printLaporan()
    {
        $orphan = Application::where('status_permohonan', 'Berjaya')->orderBy('created_at','desc')->get();

        $jumlahKeseluruhan = Application::where('status_permohonan', 'Berjaya')->count();
        $jumlahLelaki = Application::where('status_permohonan', 'Berjaya')->where('jantina', 'Lelaki')->count();
        $jumlahPerempuan = Application::where('status_permohonan', 'Berjaya')->where('jantina', 'Perempuan')->count();

        $umurBawah7thn = DB::select(DB::raw(' SELECT COUNT(umur) AS jumlah 
                                                 FROM applications WHERE status_permohonan="Berjaya" AND umur < 7
                                                 AND deleted_at IS NULL'));
        $d7thn = "";
        foreach ($umurBawah7thn as $val) {
              $d7thn=$val->jumlah;
        }
        $umurBawah7thn = $d7thn; 

        $umur7h12 = DB::select(DB::raw(' SELECT COUNT(umur) AS jumlah 
                                                 FROM applications WHERE status_permohonan="Berjaya" AND umur >= 7 && umur <=12
                                                 AND deleted_at IS NULL'));
        $d7h12 = "";
        foreach ($umur7h12 as $val) {
              $d7h12=$val->jumlah;
        }
        $umur7h12 = $d7h12; 
       
        $umur13h17 = DB::select(DB::raw(' SELECT COUNT(umur) AS jumlah 
                                                 FROM applications WHERE status_permohonan="Berjaya" AND umur >= 13 && umur <=17
                                                 AND deleted_at IS NULL'));
        $d13h17 = "";
        foreach ($umur13h17 as $val) {
              $d13h17=$val->jumlah;
        }
        $umur13h17 = $d13h17; 

        $umur18 = DB::select(DB::raw(' SELECT COUNT(umur) AS jumlah 
                                                 FROM applications WHERE status_permohonan="Berjaya" AND umur > 17
                                                 AND deleted_at IS NULL'));
        $d18 = "";
        foreach ($umur18 as $val) {
              $d18=$val->jumlah;
        }
        $umur18 = $d18; 


        $kehilanganAyah = Application::where('status_permohonan', 'Berjaya')->where('status', 'Kehilangan Ayah')->count();
        $kehilanganIbu = Application::where('status_permohonan', 'Berjaya')->where('status', 'Kehilangan Ibu')->count();
        $kehilanganIbuAyah = Application::where('status_permohonan', 'Berjaya')->where('status', 'Kehilangan Ibu dan Ayah')->count();

        return view('staff.orphan.orphan-print', compact('orphan', 'jumlahKeseluruhan', 'jumlahLelaki', 'jumlahPerempuan', 
        'umurBawah7thn', 'umur7h12', 'umur13h17', 'umur18',
        'kehilanganAyah', 'kehilanganIbu', 'kehilanganIbuAyah'));
    }

    public function store(Request $request, Application $orphan)
    {
         $validateData = $request->validate([

             // VALIDATION MAKLUMAT ANAK JAGAAN

             'nama_penuh' => 'required',
             'nama_sekolah'   => 'required',
             'tarikh_lahir' => 'required',
             'umur'   => 'required|numeric|min:1',
             'alamat'   => 'required',
             'poskod'   => 'required|digits:5',
             'bandar'   => 'required',
             'negeri'   => 'required',
             'no_kad_pengenalan' => 'required|digits:12|unique:applications,no_kad_pengenalan,'.$orphan->id,
             'no_telefon'    => '',
             'jantina'   => 'required',
             'status'   => 'required',           
             'tarikh_daftar'   => 'required',
             'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',

      
             // VALIDATION DOKUMEN SOKONGAN

             'sijil_lahir' => 'required|mimes:pdf|max:2048',
             'sijil_kematian' => 'required|mimes:pdf|max:2048',  

             // VALIDATION MAKLUMAT PERKEMBANGAN            
             
             'komunikasi' => '',
             'matematik'   => '',
             'deria' => '',
             'fizikal' => '',
             'kreativiti'   => '',

             // VALIDATION MAKLUMAT IBU BAPA

             'nama_penuh_ayah' => 'required',
             'no_kad_pengenalan_ayah' => 'digits:12',
             'no_telefon_ayah'    => '',
             'pekerjaan_ayah'   => '',
             'pendapatan_ayah'   => '',

             'nama_penuh_ibu' => 'required',
             'no_kad_pengenalan_ibu' => 'digits:12',
             'no_telefon_ibu'    => '',
             'pekerjaan_ibu'   => '',
             'pendapatan_ibu'   => '',

         ]);

        $orphan = new Application();

        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.'.$ext;
            $file->move('assets/orphan-img',$filename);
            $orphan->gambar = $filename;

        }

        if($request->hasFile('sijil_lahir'))
        {
            $file = $request->file('sijil_lahir');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '_sijil_lahir.'.$ext;
            $file->move('assets/sijil_lahir',$filename);
            $orphan->sijil_lahir = $filename;

        }

        if($request->hasFile('sijil_kematian'))
        {
            $file = $request->file('sijil_kematian');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '_sijil_kematian.'.$ext;
            $file->move('assets/sijil_kematian',$filename);
            $orphan->sijil_kematian = $filename;

        }
        
        $orphan->nama_penuh = $validateData['nama_penuh'];
        $orphan->nama_sekolah = $validateData['nama_sekolah'];
        $orphan->tarikh_lahir = $validateData['tarikh_lahir'];
        $orphan->umur = $validateData['umur'];
        $orphan->alamat = $validateData['alamat'];
        $orphan->poskod = $validateData['poskod'];
        $orphan->bandar = $validateData['bandar'];
        $orphan->negeri = $validateData['negeri'];
        $orphan->status_permohonan = 'Berjaya';
        $orphan->id_anak_jagaan = 'AKG'.rand(111111,999999);

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
        }
        else {
                Alert::error('Gagal', 'Rekod tidak berjaya ditambah');
                return redirect('/admin-orphan');
        }
     }

    public function show(Application $orphan)
    {
        return view('staff.orphan.orphan-view',['orphan' => $orphan]);
    }

    public function report(Application $orphan)
    {
        return view('staff.orphan.orphan-report',['orphan' => $orphan]);
    }

    public function edit(Application $orphan)
    {
        return view('staff.orphan.orphan-edit',['orphan' => $orphan]);
    }

    public function update(Request $request, Application $orphan)
    {
        $validateData = $request->validate([

            // VALIDATION MAKLUMAT ANAK JAGAAN

             'nama_penuh' => '',
             'nama_sekolah'   => '',
             'tarikh_lahir' => '',
             'umur'   => 'required|numeric|min:1',
             'alamat'   => '',
             'poskod'   => 'required|digits:5',
             'bandar'   => '',
             'negeri'   => '',

             'no_kad_pengenalan' => 'required|digits:12',
             'no_telefon'    => '',
             'jantina'   => '',
             'status'   => '',          
          
             'tarikh_daftar'   => '',
             'tarikh_keluar'   => '',

             // VALIDATION MAKLUMAT PERKEMBANGAN

             'komunikasi' => '',
             'matematik'   => '',
             'deria' => '',
             'fizikal' => '',
             'kreativiti'   => '',
     
             // VALIDATION MAKLUMAT IBU BAPA

             'nama_penuh_ayah' => '',
             'no_kad_pengenalan_ayah' => 'required|digits:12',
             'no_telefon_ayah'    => '',
             'pekerjaan_ayah'   => '',
             'pendapatan_ayah'   => '',

             'nama_penuh_ibu' => '',
             'no_kad_pengenalan_ibu' => 'required|digits:12',
             'no_telefon_ibu'    => '',
             'pekerjaan_ibu'   => '',
             'pendapatan_ibu'   => '',
        ]);


        // VALIDATION GAMBAR

        if($request->hasFile('gambar')){
            $request->validate([
              'gambar' => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);

            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.'.$ext;
            $file->move('assets/orphan-img',$filename);
            $orphan->gambar = $filename;
        }

        // VALIDATION SIJIL LAHIR

        if($request->hasFile('sijil_lahir')){
            $request->validate([
              'sijil_lahir' => 'mimes:pdf|max:2048',
            ]);

            $file = $request->file('sijil_lahir');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '_sijil_lahir.'.$ext;
            $file->move('assets/sijil_lahir',$filename);
            $orphan->sijil_lahir = $filename;
        }

        // VALIDATION SIJIL KEMATIAN

        if($request->hasFile('sijil_kematian')){
            $request->validate([
              'sijil_kematian' => 'mimes:pdf|max:2048',
            ]);

            $file = $request->file('sijil_kematian');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '_sijil_kematian.'.$ext;
            $file->move('assets/sijil_kematian',$filename);
            $orphan->sijil_kematian = $filename;
        }

        $orphan->nama_penuh = $validateData['nama_penuh'];
        $orphan->nama_sekolah = $validateData['nama_sekolah'];
        $orphan->tarikh_lahir = $validateData['tarikh_lahir'];
        $orphan->umur = $validateData['umur'];
        $orphan->alamat = $validateData['alamat'];
        $orphan->poskod = $validateData['poskod'];
        $orphan->bandar = $validateData['bandar'];
        $orphan->negeri = $validateData['negeri'];

        $orphan->no_kad_pengenalan = $validateData['no_kad_pengenalan'];
        $orphan->no_telefon = $validateData['no_telefon'];
        $orphan->jantina = $validateData['jantina'];
        $orphan->status = $validateData['status'];
        $orphan->tarikh_daftar = $validateData['tarikh_daftar'];
        $orphan->tarikh_keluar = $validateData['tarikh_keluar'];

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

        $updateOrphan = $orphan->update();

        // MESEJ KEMASKINI - SWEETALERT
        if ($updateOrphan) {
                Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
                return redirect('/admin-orphan');
        }
        else {
                Alert::error('Gagal', 'Rekod tidak berjaya dikemaskini');
                return redirect('/admin-orphan');
        }
    }

    public function destroy(Application $orphan)
    {
        $orphan->delete();
        Alert::success('Berjaya', 'Rekod telah berjaya dihapus');
        return redirect('/admin-orphan');
    }




}
