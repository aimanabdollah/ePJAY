<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bookcategory;
use App\Models\Configuration;

class BookcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function BookCategoryList(Request $request)
    {
             $configuration = Configuration::first();

        $list = Bookcategory::table('bookcategories')->get();
        return view('backend.bookcategory.list_bookcategory',compact('list', 'configuration'));
    }


public function BookCategoryAdd()
{
$all = Bookcategory::table('bookcategories')->get();
 $configuration = Configuration::first();
return view('backend.bookcategory.create_bookcategory',compact('all', 'configuration'));
}



    public function BookCategoryInsert(Request $request)
    {
$data = array();
$data['name'] = $request->name;
$data['slug'] = $request->slug;
$insert = Bookcategory::table('bookcategories')->insert($data);

if ($insert)
{

                return Redirect()->route('bookcategory.index')->with('success','Book Category created successfully!');

        }
else
        {
        $notification=array
        (
        'messege'=>'error ',
        'alert-type'=>'error'
        );
        return Redirect()->route('bookcategory.index')->with($notification);
        }

}

      public function BookEditCategory ($id)
    {
        $edit=Bookcategory::table('bookcategories')
             ->where('id',$id)
             ->first();
        return view('backend.bookcategory.edit_bookcategory', compact('edit'));
    }

        public function BookUpdateCategory(Request $request,$id)
    {

        Bookcategory::table('bookcategories')->where('id', $id)->first();
        $data = array();
        $data['name'] = $request->name;
        $data['slug'] = $request->slug;
        $update = Bookcategory::table('bookcategories')->where('id', $id)->update($data);

        if ($update)
    {

            return Redirect()->route('bookcategory.index')->with('success','Book Category Updated successfully!');
    }
        else
    {
        $notification=array
        (
        'messege'=>'error ',
        'alert-type'=>'error'
        );
        return Redirect()->route('bookcategory.index')->with($notification);
    }

    }

public function BookDeleteCategory ($id)
    {

        $delete = Bookcategory::table('bookcategories')->where('id', $id)->delete();
        if ($delete)
                            {
                            $notification=array(
                            'messege'=>'Successfully Book Category Deleted ',
                            'alert-type'=>'success'
                            );
                            return Redirect()->back()->with($notification);
                            }
             else
                  {
                  $notification=array(
                  'messege'=>'error ',
                  'alert-type'=>'error'
                  );
                  return Redirect()->back()->with($notification);

                  }

      }
}
