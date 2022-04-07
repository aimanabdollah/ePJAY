<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Transaction;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense = Transaction::where('jenis', 'Perbelanjaan')->get();
         return view('staff.finance.finance-listExpense', compact('expense'));

    }

    public function create()
    {
        return view('staff.finance.finance-addExpense');
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
          $expense = new Transaction();
        
          $expense->kategori = $validateData['kategori'];
          $expense->catatan = $validateData['catatan'];
          $expense->jumlah_tbj = $validateData['jumlah'];
          $expense->tarikh = $validateData['tarikh'];
          $expense->id_trans_tbj = 'TBJ'.rand(111111,999999);
           $expense->jenis = 'Perbelanjaan';

          $expense->save();
      
          return redirect('/admin/expense')
         ->with('message', "Rekod berjaya ditambah");
     }

    public function show(Transaction $expense)
    {
        // dd($mahasiswa);

        // $result = Income::find($mahasiswa);  // akan error jika id mahasiswa belum ada
        // $result =  Income::findOrFail($mahasiswa);
        // return view('mahasiswa.show',['mahasiswa' => $result]);

        // depedency injection
         return view('staff.finance.expense-show',['expense' => $expense]);
    }


    public function edit(Transaction $expense)
    {
        return view('staff.finance.finance-editExpense',['expense' => $expense]);
    }

    public function update(Request $request, Transaction $expense)
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
          $expense->kategori = $validateData['kategori'];
          $expense->catatan = $validateData['catatan'];
          $expense->jumlah_tbj = $validateData['jumlah'];
          $expense->tarikh = $validateData['tarikh'];

          $expense->update();

        return redirect('/admin/expense')
         ->with('message', "Rekod berjaya dikemaskini");

        // return redirect()->route('mahasiswas.index')
        // ->with('pesan', "Update data {$validateData['nama']} berhasil");
    }

    public function destroy(Transaction $expense)
    {
        $expense->delete();
        return redirect('/admin/expense')->with('message', "Rekod berjaya dihapus");
    }
}