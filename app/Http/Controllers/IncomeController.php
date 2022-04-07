<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Transaction;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    public function index()
    {
        $income = Transaction::where('jenis', 'Pendapatan')->get();
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
          $income = new Transaction();
        
          $income->kategori = $validateData['kategori'];
          $income->catatan = $validateData['catatan'];
          $income->jumlah_tpn = $validateData['jumlah'];
          $income->tarikh = $validateData['tarikh'];
          $income->id_trans_tpn = 'TPN'.rand(111111,999999);
          $income->jenis = 'Pendapatan';

          $income->save();
      
          return redirect('/admin/income')
         ->with('message', "Rekod berjaya ditambah");
     }

    public function show(Transaction $income)
    {
        // dd($mahasiswa);

        // $result = Income::find($mahasiswa);  // akan error jika id mahasiswa belum ada
        // $result =  Income::findOrFail($mahasiswa);
        // return view('mahasiswa.show',['mahasiswa' => $result]);

        // depedency injection
         return view('staff.finance.income-show',['income' => $income]);
    }


    public function edit(Transaction $income)
    {
        return view('staff.finance.finance-editIncome',['income' => $income]);
    }

    public function update(Request $request, Transaction $income)
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
          $income->kategori = $validateData['kategori'];
          $income->catatan = $validateData['catatan'];
          $income->jumlah_tpn = $validateData['jumlah'];
          $income->tarikh = $validateData['tarikh'];

          $income->update();

        return redirect('/admin/income')
         ->with('message', "Rekod berjaya dikemaskini");

        // return redirect()->route('mahasiswas.index')
        // ->with('pesan', "Update data {$validateData['nama']} berhasil");
    }

    public function destroy(Transaction $income)
    {
        $income->delete();
        return redirect('/admin/income')->with('message', "Rekod berjaya dihapus");
    }
}
