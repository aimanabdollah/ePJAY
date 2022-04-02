<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ApplicationController extends Controller
{
    public function index()
    {
         $application = Application::where('id_pemohon', Auth::id())->get();
         return view('parent.application.application-list', compact('application'));
    }

    public function viewApplication()
    {
         $application = Application::whereNotNull('id_pemohon')->get();
         return view('staff.application.application-list', compact('application'));

    }

    public function orphanList()
    {
        $application = Application::where('id_pemohon', Auth::id())->where('status_permohonan', 'Berjaya')->get();
         return view('parent.orphan.orphan-list', compact('application'));

    }

    public function create()
    {
        return view('parent.application.application-add');
    }

    
    public function store(Request $request)
     {
         $validateData = $request->validate([

             'nama_penuh_pemohon' => '',
             'no_tel_pemohon'   => '',
          
            'nama_penuh' => '',
             'nama_sekolah'   => '',
             'tarikh_lahir' => '',
             'umur'   => 'numeric|min:0|max:99999999',
             'alamat'   => '',
             'poskod'   => '',
             'bandar'   => '',
             'negeri'   => '',

             'no_kad_pengenalan' => 'digits:12',
             'no_telefon'    => '',
             'jantina'   => '',
             'status'   => '',          
          
             'tarikh_daftar'   => '',
            //  'tarikh_keluar'   => '',

            //'gambar' => 'required',
            // 'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
             'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            //'gambar' =>'',
      
             'sijil_lahir' => 'required|mimes:pdf|max:2048',
             'sijil_kematian' => 'required|mimes:pdf|max:2048',  
             
            //  'id_anak_jagaan'   => '',
            //  'id_pemohon'   => '',   

             'nama_penuh_ayah' => '',
             'no_kad_pengenalan_ayah' => 'digits:12',
             'no_telefon_ayah'    => '',
             'pekerjaan_ayah'   => '',
             'pendapatan_ayah'   => 'numeric|min:0|max:99999999',

             'nama_penuh_ibu' => '',
             'no_kad_pengenalan_ibu' => 'digits:12',
             'no_telefon_ibu'    => '',
             'pekerjaan_ibu'   => '',
             'pendapatan_ibu'   => 'numeric|min:0|max:99999999',

         ]);

        // CARA ELOQUENT ORM
        $application = new Application();

        if($request->hasFile('gambar'))
        {
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.'.$ext;
            $file->move('assets/orphan-img',$filename);
            $application->gambar = $filename;

        }

        if($request->hasFile('sijil_lahir'))
        {
            $file = $request->file('sijil_lahir');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '_sijil_lahir.'.$ext;
            $file->move('assets/sijil_lahir',$filename);
            $application->sijil_lahir = $filename;

        }

        if($request->hasFile('sijil_kematian'))
        {
            $file = $request->file('sijil_kematian');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '_sijil_kematian.'.$ext;
            $file->move('assets/sijil_kematian',$filename);
            $application->sijil_kematian = $filename;

        }
        
        $application->id_permohonan = 'PMH'.rand(111111,999999);
        $application->id_anak_jagaan = 'AKG'.rand(111111,999999);
        $application->status_permohonan = 'Dalam Proses';

        $application->id_pemohon = Auth::user()->id;

        $application->nama_penuh_pemohon = $validateData['nama_penuh_pemohon'];
        $application->no_tel_pemohon = $validateData['no_tel_pemohon'];
        
        $application->nama_penuh = $validateData['nama_penuh'];
        $application->nama_sekolah = $validateData['nama_sekolah'];
        $application->tarikh_lahir = $validateData['tarikh_lahir'];
        $application->umur = $validateData['umur'];
        $application->alamat = $validateData['alamat'];
        $application->poskod = $validateData['poskod'];
        $application->bandar = $validateData['bandar'];
        $application->negeri = $validateData['negeri'];

        $application->no_kad_pengenalan = $validateData['no_kad_pengenalan'];
        $application->no_telefon = $validateData['no_telefon'];
        $application->jantina = $validateData['jantina'];
        $application->status = $validateData['status'];
       // $application->gambar = $imageName;
       // $application->gambar_path = '/storage/'.$path;
        //$application->gambar = $name;
       // $application->path_gambar = $path;


        $application->tarikh_daftar = $validateData['tarikh_daftar'];
        // $application->tarikh_keluar = $validateData['tarikh_keluar'];
        // $application->sijil_lahir = $validateData['sijil_lahir'];
        // $application->sijil_kematian = $validateData['sijil_kematian'];

        // $application->id_anak_jagaan = $validateData['id_anak_jagaan'];
        // $application->id_pemohon = $validateData['id_pemohon'];

        $application->nama_penuh_ayah = $validateData['nama_penuh_ayah'];
        $application->no_kad_pengenalan_ayah = $validateData['no_kad_pengenalan_ayah'];
        $application->no_telefon_ayah = $validateData['no_telefon_ayah'];
        $application->pekerjaan_ayah = $validateData['pekerjaan_ayah'];
        $application->pendapatan_ayah = $validateData['pendapatan_ayah'];

        $application->nama_penuh_ibu = $validateData['nama_penuh_ibu'];
        $application->no_kad_pengenalan_ibu = $validateData['no_kad_pengenalan_ibu'];
        $application->no_telefon_ibu = $validateData['no_telefon_ibu'];
        $application->pekerjaan_ibu = $validateData['pekerjaan_ibu'];
        $application->pendapatan_ibu = $validateData['pendapatan_ibu']; 
        $application->save();
 
        return redirect('application')
          ->with('message', "Permohonan berjaya dihantar");
     }

    public function show(Application $application)
    {
        // depedency injection
         return view('staff.application.application-view',['application' => $application]);
    }


    public function orphanShow(Application $orphan)
    {
         return view('parent.orphan.orphan-view',['application' => $orphan]);
    }
}
