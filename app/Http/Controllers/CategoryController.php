<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Configuration;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use App\Exceptions\CustomExceptionHandler;

class CategoryController extends Controller
{
    // Function to display the list of categories
    public function index()
    {
        $category = Category::orderBy('created_at', 'desc')->get();
        $configuration = Configuration::first();
        return view('admin.kategori.senarai_kategori', compact('category', 'configuration'));
    }

    // Function to display the form for creating a new category
    public function create()
    {
        $configuration = Configuration::first();
        return view('admin.kategori.tambah_kategori', compact('configuration'));
    }

    // Function to store a newly created category
    public function store(Request $request)
    {
        // Validate the input data
        $validateData = $request->validate([
            'jenis' => 'required',
            'nama' => 'required',
            'catatan' => 'required',
        ]);

        // Create a new Category instance
        $category = new Category();

        // Assign validated data to the category attributes
        $category->jenis = $validateData['jenis'];
        $category->nama = $validateData['nama'];
        $category->catatan = $validateData['catatan'];

        // Save the category to the database
        $saveCategory = $category->save();

        // Redirect with success or error message based on save result
        if ($saveCategory) {
            Alert::success('Berjaya', 'Rekod telah berjaya ditambah');
            return redirect('/admin-category');
        } else {
            Alert::error('Gagal', 'Rekod tidak berjaya ditambah');
            return redirect('/admin-category');
        }
    }

    // Function to display a single category
    public function show(Category $category)
    {
        $configuration = Configuration::first();
        return view('admin.kategori.lihat_kategori', ['category' => $category], compact('configuration'));
    }

    // Function to display the form for editing a category
    public function edit(Category $category)
    {
        $configuration = Configuration::first();
        return view('admin.kategori.edit_kategori', ['category' => $category], compact('configuration'));
    }

    // Function to update an existing category
    public function update(Request $request, Category $category)
    {
        // Validate the input data
        $validateData = $request->validate([
            'jenis' => 'required',
            'nama' => 'required',
            'catatan' => '',
        ]);

        // Update the category attributes with validated data
        $category->jenis = $validateData['jenis'];
        $category->nama = $validateData['nama'];
        $category->catatan = $validateData['catatan'];

        // Save the updated category to the database
        $updateCategory = $category->update();

        // Redirect with success or error message based on update result
        if ($updateCategory) {
            Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
            return redirect('/admin-category');
        } else {
            Alert::error('Gagal', 'Rekod tidak berjaya dikemaskini');
            return redirect('/admin-category');
        }
    }

    // Function to delete a category
    public function destroy(Category $category)
    {
        try {
            // Attempt to delete the category
            $isDeleteSuccess = $category->delete();

            // Show success or error message based on delete result
            if ($isDeleteSuccess) {
                Alert::success('Berjaya', 'Rekod telah berjaya dihapus');
            } else {
                Alert::error('Maaf', 'Rekod tidak berjaya dihapus');
            }

            return redirect('/admin-category');
        } catch (\Exception $e) {
            // Handle any exception that occurs during deletion
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dihapus');
            return redirect('/admin-category');
        }
    }
}
