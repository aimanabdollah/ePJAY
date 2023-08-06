<?php

namespace App\Http\Controllers;

use App\Models\Income;
use App\Models\Category;
use App\Models\Configuration;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\DB;

class IncomeController extends Controller
{
    // Display all income records in a view
    public function index()
    {
        $incomes = Income::with('category')->orderBy('created_at', 'desc')->get();
        return view('staf.pendapatan.senarai_pendapatan', compact('incomes'));
    }

    // Navigate to the form for adding a new income record
    public function createIncome()
    {
        $categories = Category::where('jenis', 'Pendapatan')->get();
        return view('staf.pendapatan.tambah_pendapatan', compact('categories'));
    }

    // Add a new income record to the database
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            // Validate the incoming request data
            $incomeData = $request->validate([
                'kategori' => 'required',
                'tarikh' => 'required|date|date_format:Y-m-d',
                'catatan' => 'nullable',
                'jumlah' => 'required',
                // Add other validation rules as needed for income attributes
            ]);

            do {
                $generatedId = 'TPN' . rand(111111, 999999);
            } while (Income::where('id_trax_pendapatan', $generatedId)->exists());

            // Create and save a new Income instance to the database
            Income::create([
                'id_kategori' => $incomeData['kategori'],
                'catatan' => $incomeData['catatan'],
                'jumlah_tpn' => $incomeData['jumlah'],
                'tarikh' => $incomeData['tarikh'],
                'id_trax_pendapatan' => $generatedId,
            ]);

            DB::commit();

            // Show SweetAlert success message and redirect to the index page
            Alert::success('Berjaya', 'Rekod telah berjaya ditambah');
            return redirect()->route('income.index');
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
            return redirect()->route('income.create');
        } catch (ValidationException $e) {
            DB::rollback();
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            DB::rollback();
            Alert::error('Harap Maaf', 'Rekod tidak berjaya ditambah: ' . $e->getMessage());
            return redirect()->route('income.create');
        }
    }

    // Display details of a specific income record
    public function show(Income $income)
    {
        return view('staf.pendapatan.lihat_pendapatan', ['income' => $income]);
    }

    // Navigate to the form for editing an existing income record
    public function edit(Income $income)
    {
        $categories = Category::where('jenis', 'Pendapatan')->get();
        return view('staf.pendapatan.edit_pendapatan', ['income' => $income], compact('categories'));
    }

    // Update an existing income record in the database
    public function update(Request $request, Income $income)
    {
        try {
            $validatedData = $request->validate([
                'kategori' => 'required',
                'tarikh' => 'required|date|date_format:Y-m-d',
                'catatan' => 'nullable',
                'jumlah' => 'required',
                // Add other validation rules as needed for income attributes
            ]);

            // Update the income record attributes with the validated data
            $income->id_kategori = $validatedData['kategori'];
            $income->catatan = $validatedData['catatan'];
            $income->jumlah_tpn = $validatedData['jumlah'];
            $income->tarikh = $validatedData['tarikh'];

            // Save the updated income record to the database
            $updateIncome = $income->save();

            if ($updateIncome) {
                Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
                return redirect('/admin-income');
            } else {
                Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini');
                return redirect('/admin-income');
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
            return redirect('/admin-income');
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini: ' . $e->getMessage());
            return redirect('/admin-income');
        }
    }

    // Delete an existing income record from the database
    public function destroy(Income $income)
    {
        try {
            $isDeleteSuccess = $income->delete();

            if ($isDeleteSuccess) {
                Alert::success('Berjaya', 'Rekod telah berjaya dihapus');
            } else {
                Alert::error('Harap Maaf', 'Rekod tidak berjaya dihapus');
            }

            return redirect('/admin-income');
        } catch (QueryException $e) {
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dihapus. Sila cuba sekali lagi.');
            return redirect('/admin-income');
        } catch (\Exception $e) {
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dihapus: ' . $e->getMessage());
            return redirect('/admin-income');
        }
    }

    // Generate and display a report of income records and their categories
    public function report()
    {
        $income = Income::orderBy('created_at', 'desc')->get();
        $configuration = Configuration::first();

        $categoriesWithSum = Category::withSum('incomes', 'jumlah_tpn')
            ->where('jenis', 'Pendapatan')
            ->has('incomes')
            ->get()
            ->toArray();

        $totalSum = array_sum(array_column($categoriesWithSum, 'incomes_sum_jumlah_tpn'));

        return view('staf.pendapatan.laporan_pendapatan', compact('income', 'configuration', 'categoriesWithSum', 'totalSum'));
    }
}
