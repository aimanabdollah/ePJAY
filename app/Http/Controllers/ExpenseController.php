<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Category;
use App\Models\Configuration;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class ExpenseController extends Controller
{
    // Display all expense records in a view
    public function index()
    {
        $expenses = Expense::with('category')->orderBy('created_at', 'desc')->get();
        return view('staf.perbelanjaan.senarai_perbelanjaan', compact('expenses'));
    }

    // Navigate to the form for adding a new expense record
    public function createExpense()
    {
        $categories = Category::where('jenis', 'Perbelanjaan')->get();
        return view('staf.perbelanjaan.tambah_perbelanjaan', compact('categories'));
    }

    // Add a new expense record to the database
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validate the incoming request data
            $expenseData = $request->validate([
                'kategori' => 'required',
                'tarikh' => 'required|date|date_format:Y-m-d',
                'catatan' => 'nullable',
                'jumlah' => 'required',
                'resit' => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048',
                // Add other validation rules as needed for expense attributes
            ]);

            do {
                $generatedId = 'TBJ' . rand(111111, 999999);
            } while (Expense::where('id_trax_perbelanjaan', $generatedId)->exists());

            // Create and save a new Expense instance to the database
            $expense = new Expense();

            if ($request->hasFile('resit')) {
                $file = $request->file('resit');
                $ext = $file->getClientOriginalExtension();
                $filename = $generatedId . '_' . time() . '.' . $ext;
                $file->move('assets/resit_perbelanjaan', $filename);
                $expense->resit = $filename;
            }

            $expense->id_trax_perbelanjaan = $generatedId;
            $expense->id_kategori = $expenseData['kategori'];
            $expense->catatan = $expenseData['catatan'];
            $expense->jumlah_tbj = $expenseData['jumlah'];
            $expense->tarikh = $expenseData['tarikh'];

            $expense->save();

            DB::commit();

            // Show SweetAlert success message and redirect to the index page
            Alert::success('Berjaya', 'Rekod telah berjaya ditambah');
            return redirect()->route('expense.index');
        } catch (QueryException $e) {
            DB::rollback();

            $errorMessage = 'Rekod tidak berjaya ditambah.';

            if ($e->getCode() === '22007') {
                $errorMessage .= ' Error: Invalid date format.';
            } else if ($e->getCode() === '22003') {
                $errorMessage .= ' Error: Numeric value out of range.';
            } else {
                $errorMessage .= ' Error: ' . $e->getMessage();
            }

            // Show SweetAlert error message and redirect back to the create page
            Alert::error('Harap Maaf', $errorMessage);
            return redirect()->route('expense.create');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Harap Maaf', 'Rekod tidak berjaya ditambah: ' . $e->getMessage());
            return redirect()->route('expense.create');
        }
    }

    // Display details of a specific expense record
    public function show(Expense $expense)
    {
        return view('staf.perbelanjaan.lihat_perbelanjaan', ['expense' => $expense]);
    }

    // Navigate to the form for editing an existing expense record
    public function edit(Expense $expense)
    {
        $categories = Category::where('jenis', 'Perbelanjaan')->get();
        return view('staf.perbelanjaan.edit_perbelanjaan', ['expense' => $expense], compact('categories'));
    }

    // Update an existing expense record in the database
    public function update(Request $request, Expense $expense)
    {
        try {
            $validatedData = $request->validate([
                'kategori' => 'required',
                'tarikh' => 'required|date|date_format:Y-m-d',
                'catatan' => 'nullable',
                'jumlah' => 'required',
                'resit' => 'nullable|mimes:jpg,png,jpeg,pdf|max:2048',
                // Add other validation rules as needed for expense attributes
            ]);

            // Update the expense record attributes with the validated data
            $expense->id_kategori = $validatedData['kategori'];
            $expense->catatan = $validatedData['catatan'];
            $expense->jumlah_tbj = $validatedData['jumlah'];
            $expense->tarikh = $validatedData['tarikh'];

            if ($request->hasFile('resit')) {
                $file = $request->file('resit');
                $ext = $file->getClientOriginalExtension();
                $filename = $expense->id_trax_perbelanjaan . '_' . time() . '.' . $ext;
                $file->move('assets/resit_perbelanjaan', $filename);
                $expense->resit = $filename;
            }

            // Save the updated expense record to the database
            $updateExpense = $expense->save();

            if ($updateExpense) {
                Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
                return redirect('/admin-expense');
            } else {
                Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini');
                return redirect('/admin-expense');
            }
        } catch (QueryException $e) {
            $errorMessage = 'Rekod tidak berjaya dikemaskini.';

            if ($e->getCode() === '22007') {
                $errorMessage .= ' Error: Invalid date format.';
            } else if ($e->getCode() === '22003') {
                $errorMessage .= ' Error: Numeric value out of range.';
            } else {
                $errorMessage .= ' Error: ' . $e->getMessage();
            }

            // Show SweetAlert error message and redirect back to the create page
            Alert::error('Harap Maaf', $errorMessage);
            return redirect('/admin-expense');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini: ' . $e->getMessage());
            return redirect('/admin-expense');
        }
    }

    // Delete an existing expense record from the database
    public function destroy(Expense $expense)
    {
        try {
            $isDeleteSuccess = $expense->delete();

            if ($isDeleteSuccess) {
                Alert::success('Berjaya', 'Rekod telah berjaya dihapus');
            } else {
                Alert::error('Harap Maaf', 'Rekod tidak berjaya dihapus');
            }

            return redirect('/admin-expense');
        } catch (QueryException $e) {
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dihapus. Sila cuba sekali lagi.');
            return redirect('/admin-expense');
        } catch (\Exception $e) {
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dihapus: ' . $e->getMessage());
            return redirect('/admin-expense');
        }
    }

    // Generate and display a report of expense records and their categories
    public function report()
    {
        $expense = Expense::orderBy('created_at', 'desc')->get();
        $configuration = Configuration::first();

        $categoriesWithSum = Category::withSum('expenses', 'jumlah_tbj')
            ->where('jenis', 'Perbelanjaan')
            ->has('expenses')
            ->get()
            ->toArray();

        $totalSum = array_sum(array_column($categoriesWithSum, 'expenses_sum_jumlah_tbj'));

        return view('staf.perbelanjaan.laporan_perbelanjaan', compact('expense', 'configuration', 'categoriesWithSum', 'totalSum'));
    }
}
