<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Configuration;

class UsermanagementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function UserList(Request $request)
    {
        $configuration = Configuration::first();
        $list = User::table('users')->get();
        return view('backend.user.list_user', compact('list', 'configuration'));
    }


    public function UserAdd()
    {
        $configuration = Configuration::first();
        $all = User::table('users')->get();
        return view('backend.user.create_User', compact('all', 'configuration'));
    }



    //     public function UserInsert(Request $request)
    //     {
    // $data = array();
    // $data['role'] = $request->role;

    // $insert = User::table('users')->insert($data);

    // if ($insert)
    // {

    //                 return Redirect()->route('user.index')->with('success','User created successfully!');

    //         }
    // else
    //         {
    //         $notification=array
    //         (
    //         'messege'=>'error ',
    //         'alert-type'=>'error'
    //         );
    //         return Redirect()->route('User.index')->with($notification);
    //         }

    // }

    public function UserEdit($id)
    {
        $edit = User::table('users')
            ->where('id', $id)
            ->first();

        $configuration = Configuration::first();
        return view('backend.user.edit_User', compact('edit', 'configuration'));
    }

    public function UserUpdate(Request $request, $id)
    {

        User::table('users')->where('id', $id)->first();
        $data = array();
        $data['role'] = $request->role;
        $update = User::table('users')->where('id', $id)->update($data);

        if ($update) {

            return Redirect()->route('user.index')->with('success', 'User Updated successfully!');
        } else {

            return Redirect()->route('user.index')->with('error', 'Somthing is Wrong!');
        }
    }

    public function UserDelete($id)
    {

        $delete = User::table('users')->where('id', $id)->delete();
        if ($delete) {
            return Redirect()->route('user.index')->with('success', 'User Deleted successfully!');
        } else {
            return Redirect()->route('user.index')->with('error', 'Somthing is Wrong!');
        }
    }
}
