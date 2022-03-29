<?php

namespace App\Http\Controllers;

use App\Models\Orphan;
use Illuminate\Http\Request;

// use Illuminate\Support\Facades\File;

class OrphanController extends Controller
{
     public function index()
    {
        $orphan = Orphan::all();
        return view('staff.orphan.orphan-list', compact('orphan'));
    }

    public function create()
    {
        return view('staff.orphan.orphan-add');
    }

    public function store(Request $request)
     {
         $validateData = $request->validate([

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

        // $name = $request->file('image')->getClientOriginalName();
        // $path = $request->file('image')->store('uploads');
        //$name = $request->file('gambar')->getClientOriginalName();
       // $path = $request->file('gambar')->store('public/images');

  

        // CARA ELOQUENT ORM
        $orphan = new Orphan();

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

        $orphan->no_kad_pengenalan = $validateData['no_kad_pengenalan'];
        $orphan->no_telefon = $validateData['no_telefon'];
        $orphan->jantina = $validateData['jantina'];
        $orphan->status = $validateData['status'];
       // $orphan->gambar = $imageName;
       // $orphan->gambar_path = '/storage/'.$path;
        //$orphan->gambar = $name;
       // $orphan->path_gambar = $path;


        $orphan->tarikh_daftar = $validateData['tarikh_daftar'];
        // $orphan->tarikh_keluar = $validateData['tarikh_keluar'];
        // $orphan->sijil_lahir = $validateData['sijil_lahir'];
        // $orphan->sijil_kematian = $validateData['sijil_kematian'];

        // $orphan->id_anak_jagaan = $validateData['id_anak_jagaan'];
        // $orphan->id_pemohon = $validateData['id_pemohon'];

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
        $orphan->save();
 
        return redirect('/admin/orphan')
          ->with('message', "Rekod berjaya ditambah");
     }

    public function show(Orphan $orphan)
    {
        // depedency injection
         return view('staff.orphan.orphan-view',['orphan' => $orphan]);
    }

    public function edit(Orphan $orphan)
    {
        return view('staff.orphan.orphan-edit',['orphan' => $orphan]);
    }

    public function update(Request $request, Orphan $orphan)
    {
       // dump($request->all());
       // dump($orphan);

        
        $validateData = $request->validate([
             'nama_penuh' => '',
             'nama_sekolah'   => '',
             'tarikh_lahir' => '',
             'umur'   => 'required|numeric|min:0|max:99999999',
             'alamat'   => '',
             'poskod'   => '',
             'bandar'   => '',
             'negeri'   => '',

             'no_kad_pengenalan' => 'required|digits:12|unique:orphans,no_kad_pengenalan,'.$orphan->id,
             'no_telefon'    => '',
             'jantina'   => '',
             'status'   => '',          
          
             'tarikh_daftar'   => '',
              'tarikh_keluar'   => '',

            //'gambar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            //  'sijil_lahir'   => '',
            //  'sijil_kematian'   => '',  
             
            //  'id_anak_jagaan'   => '',
            //  'id_pemohon'   => '',   

             'nama_penuh_ayah' => '',
             'no_kad_pengenalan_ayah' => 'required|digits:12|unique:orphans,no_kad_pengenalan_ayah,'.$orphan->id,
             'no_telefon_ayah'    => '',
             'pekerjaan_ayah'   => '',
             'pendapatan_ayah'   => 'required|numeric|min:0|max:99999999',

             'nama_penuh_ibu' => '',
             'no_kad_pengenalan_ibu' => 'required|digits:12|unique:orphans,no_kad_pengenalan_ibu,'.$orphan->id,
             'no_telefon_ibu'    => '',
             'pekerjaan_ibu'   => '',
             'pendapatan_ibu'   => 'required|numeric|min:0|max:99999999',
        ]);

        // if($request->hasFile('gambar'))
        // {
        //         $path = 'assets/uploads/category/'.$orphan->gambar;
        //         if(File::exists($path))
        //         {
        //             File::delete($path);

        //         }
        //         $file = $request->file('gambar');
        //         $ext = $file->getClientOriginalExtension();
        //         $filename = time(). '.'.$ext;
        //         $file->move('assets/uploads/category',$filename);
        //         $orphan->gambar = $filename;
        // }
 
        // if($request->hasFile('gambar'))
        // {
        //     $file = $request->file('gambar');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time(). '.'.$ext;
        //     $file->move('assets/orphan-img',$filename);
        //     $orphan->gambar = $filename;

        // }

       //$post = Post::find($id);
        if($request->hasFile('gambar')){
            $request->validate([
              'gambar' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);

            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.'.$ext;
            $file->move('assets/orphan-img',$filename);
            $orphan->gambar = $filename;
        }

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
        // $orphan->sijil_lahir = $validateData['sijil_lahir'];
        // $orphan->sijil_kematian = $validateData['sijil_kematian'];

        // $orphan->id_anak_jagaan = $validateData['id_anak_jagaan'];
        // $orphan->id_pemohon = $validateData['id_pemohon'];

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

        $orphan->update();

        return redirect('/admin/orphan')
         ->with('message', "Rekod berjaya dikemaskini");
    }

    public function destroy(Orphan $orphan)
    {
        $orphan->delete();
        return redirect('/admin/orphan')->with('message', "Rekod berjaya dihapus");
    }




}
