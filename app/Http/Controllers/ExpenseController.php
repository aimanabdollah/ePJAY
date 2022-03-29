<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function index()
    {
         $expense = Expense::all();
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
          $expense = new Expense();
        
          $expense->category_tbj = $validateData['kategori'];
          $expense->notes_tbj = $validateData['catatan'];
          $expense->amount_tbj = $validateData['jumlah'];
          $expense->date_tbj = $validateData['tarikh'];
          $expense->id_trans_tbj = 'TBJ'.rand(111111,999999);

          $expense->save();
      
          return redirect('/admin/expense')
         ->with('message', "Rekod berjaya ditambah");
     }

    public function show(Expense $expense)
    {
        // dd($mahasiswa);

        // $result = Income::find($mahasiswa);  // akan error jika id mahasiswa belum ada
        // $result =  Income::findOrFail($mahasiswa);
        // return view('mahasiswa.show',['mahasiswa' => $result]);

        // depedency injection
         return view('staff.finance.expense-show',['expense' => $expense]);
    }


    public function edit(Expense $expense)
    {
        return view('staff.finance.finance-editExpense',['expense' => $expense]);
    }

    public function update(Request $request, Expense $expense)
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
          $expense->category_tbj = $validateData['kategori'];
          $expense->notes_tbj = $validateData['catatan'];
          $expense->amount_tbj = $validateData['jumlah'];
          $expense->date_tbj = $validateData['tarikh'];

          $expense->update();

        return redirect('/admin/expense')
         ->with('message', "Rekod berjaya dikemaskini");

        // return redirect()->route('mahasiswas.index')
        // ->with('pesan', "Update data {$validateData['nama']} berhasil");
    }

    public function destroy(Expense $expense)
    {
        $expense->delete();
        return redirect('/admin/expense')->with('message', "Rekod berjaya dihapus");
    }
}