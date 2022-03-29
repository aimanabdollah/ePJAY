<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
         $income = Income::all();
         return view('staff.finance.finance-listIncome', compact('income'));

    }

    public function create()
    {
        return view('staff.finance.finance-addIncome');
    }

    
     public function store(Request $request)
     {
         $validateData = $request->validate([
             'kategori' => 'required',
             'tarikh' => 'required',
             'catatan'    => 'required',
             'jumlah'   => 'required',
         ]);

        // CARA ELOQUENT ORM
          $income = new Income();
        
          $income->category_tpn = $validateData['kategori'];
          $income->notes_tpn = $validateData['catatan'];
          $income->amount_tpn = $validateData['jumlah'];
          $income->date_tpn = $validateData['tarikh'];
          $income->id_trans_tpn = 'TPN'.rand(111111,999999);

          $income->save();
      
          return redirect('/admin/income')
         ->with('message', "Rekod berjaya ditambah");
     }

    public function show(Income $income)
    {
        // dd($mahasiswa);

        // $result = Income::find($mahasiswa);  // akan error jika id mahasiswa belum ada
        // $result =  Income::findOrFail($mahasiswa);
        // return view('mahasiswa.show',['mahasiswa' => $result]);

        // depedency injection
         return view('staff.finance.income-show',['income' => $income]);
    }


    public function edit(Income $income)
    {
        return view('staff.finance.finance-editIncome',['income' => $income]);
    }

    public function update(Request $request, Income $income)
    {
       // dump($request->all());
       // dump($income);

        
         $validateData = $request->validate([
             'kategori' => 'required',
             'tarikh' => 'required',
             'catatan'    => 'required',
             'jumlah'   => 'required',
         ]);

        //Mahasiswa::where('id',$mahasiswa->id)->update($validateData);
          $income->category_tpn = $validateData['kategori'];
          $income->notes_tpn = $validateData['catatan'];
          $income->amount_tpn = $validateData['jumlah'];
          $income->date_tpn = $validateData['tarikh'];

          $income->update();

        return redirect('/admin/income')
         ->with('message', "Rekod berjaya dikemaskini");

        // return redirect()->route('mahasiswas.index')
        // ->with('pesan', "Update data {$validateData['nama']} berhasil");
    }

    public function destroy(Income $income)
    {
        $income->delete();
        return redirect('/admin/income')->with('message', "Rekod berjaya dihapus");
    }
}
