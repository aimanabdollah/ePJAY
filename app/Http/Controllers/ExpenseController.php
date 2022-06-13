<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Transaction;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ExpenseController extends Controller
{
    public function index()
    {
        $expense = Transaction::where('jenis', 'Perbelanjaan')->orderBy('created_at','desc')->get();
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

          $saveExpense = $expense->save();
         
          if ($saveExpense) {
                Alert::success('Berjaya', 'Rekod telah berjaya ditambah');
                return redirect('/admin-expense');
          }
          else {
                Alert::error('Gagal', 'Rekod tidak berjaya ditambah');
                return redirect('/admin-expense');
           }
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

          $updateExpense = $expense->update();
         
          if ($updateExpense) {
                Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
                return redirect('/admin-expense');
          }
          else {
                Alert::error('Gagal', 'Rekod tidak berjaya dikemaskini');
                return redirect('/admin-expense');
           }

        // return redirect()->route('mahasiswas.index')
        // ->with('pesan', "Update data {$validateData['nama']} berhasil");
    }

    public function destroy(Transaction $expense)
    {
        $expense->delete();
        Alert::success('Berjaya', 'Rekod telah berjaya dihapus');
        return redirect('/admin-expense');
    }
}