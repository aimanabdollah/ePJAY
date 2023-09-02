<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Configuration;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use App\Exceptions\CustomExceptionHandler;

class RecordDeleteController extends Controller
{
    // Display all soft deleted categories
    public function indexCategory()
    {
        $category = Category::onlyTrashed()->orderBy('deleted_at', 'desc')->get();
        $configuration = Configuration::first();

        return view('admin.penghapusan_rekod.kategori', compact('category', 'configuration'));
    }

    public function deleteCategory(Category $category)
    {
        dd('Inside deleteCategory');
        try {
            // Attempt to delete the category
            $isDeleteSuccess = $category->history()->forceDelete();

            // Show success or error message based on delete result
            if ($isDeleteSuccess) {
                Alert::success('Berjaya', 'Rekod telah berjaya dihapus');
            } else {
                Alert::error('Maaf', 'Rekod tidak berjaya dihapus');
            }

            return redirect('/record-delete/category');
        } catch (\Exception $e) {
            // Handle any exception that occurs during deletion
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dihapus');
            return redirect('/record-delete/category');
        }
    }
}
