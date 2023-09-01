<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Configuration;
use Illuminate\Http\Request;
use PHPUnit\Event\TestRunner\Configured;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;


class UserController extends Controller
{
    // Function to get roles from a JSON file
    private function getRoles()
    {
        // Read roles JSON file
        $jsonPath = public_path('assets/dropdown_type.json');
        if (File::exists($jsonPath)) {
            $rolesJson = File::get($jsonPath);
            $rolesData = json_decode($rolesJson, true); // true to decode as an associative array
            $roles = [];
            // Convert roles data to an associative array with value-label pairs
            foreach ($rolesData['roles'] as $role) {
                $roles[$role['value']] = $role['label'];
            }
            return $roles;
        }
        return [];
    }

    // Function to display the index page with a list of users
    public function index()
    {
        $configuration = Configuration::first();
        $user = User::orderBy('created_at', 'desc')->get();
        return view('admin.pengguna.senarai_pengguna', compact('user', 'configuration'));
    }

    // Function to display the user creation page
    public function create()
    {
        $configuration = Configuration::first();
        return view('admin.pengguna.tambah_pengguna', compact('configuration'));
    }

    // Function to display the user edit page
    public function edit(User $user)
    {
        $configuration = Configuration::first();
        $roles = $this->getRoles();
        return view('admin.pengguna.edit_pengguna', ['user' => $user], compact('configuration', 'roles'));
    }

    // Function to update user data
    public function update(Request $request, User $user)
    {
        // Validate user data
        $validateData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'role' => 'required',
            'no_tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        // Update user data with validated input
        $user->name = $validateData['name'];
        $user->email = $validateData['email'];
        $user->role = $validateData['role'];
        $user->no_tel = $validateData['no_tel'];

        // Handle profile image update if provided
        if ($request->hasFile('gambar')) {
            // Validate and process the profile image
            $request->validate([
                'gambar' => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/profile-img', $filename);
            $user->gambar = $filename;
        }

        // Save the updated user data to the database
        $updateUser = $user->update();

        // Display success or error message based on the update result
        if ($updateUser) {
            Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
            return redirect('/admin-user');
        } else {
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini');
            return redirect('/admin-user');
        }
    }

    // Function to display the edit profile page
    public function editProfile(User $user)
    {
        // Check if the authenticated user is authorized to edit the profile
        if (Auth::user()->id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $configuration = Configuration::first();

        return view('admin.pengguna.edit_profil', ['user' => $user], compact('configuration'));
    }

    // Function to update the user's profile data
    public function updateProfile(Request $request, User $user)
    {
        // Validate user profile data
        $validateData = $request->validate([
            'name' => 'required',
            'nama_panggilan' => 'required|max:8',
            'email' => 'required|email',
            'no_tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'jantina' => 'required',
        ]);

        // Update user profile data with validated input
        $user->name = $validateData['name'];
        $user->nama_panggilan = $validateData['nama_panggilan'];
        $user->email = $validateData['email'];
        $user->no_tel = $validateData['no_tel'];
        $user->jantina = $validateData['jantina'];

        // Handle profile image update if provided
        if ($request->hasFile('gambar')) {
            // Validate and process the profile image
            $request->validate([
                'gambar' => 'image|mimes:jpg,png,jpeg|max:2048',
            ]);
            $file = $request->file('gambar');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('assets/profile-img', $filename);
            $user->gambar = $filename;
        }

        // Save the updated user profile data to the database
        $updateUser = $user->update();

        // Display success or error message based on the update result
        if ($updateUser) {
            Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
            return redirect(route('profile.edit', ['user' => Auth::user()->id]));
        } else {
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini');
            return redirect('/profile');
        }
    }

    // Function to display the edit password page
    public function editPassword(User $user)
    {
        // Check if the authenticated user is authorized to edit the profile
        if (Auth::user()->id !== $user->id) {
            abort(403, 'Unauthorized action.');
        }

        $configuration = Configuration::first();
        return view('admin.pengguna.edit_kata_laluan', ['user' => $user], compact('configuration'));
    }

    // Function to update the user's password
    public function updatePassword(Request $request, User $user)
    {
        // Validate the new password
        $validatedData = $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        // Update user's password with the hashed new password
        $user->password = Hash::make($validatedData['password']);

        // Save the updated password to the database
        $updateUser = $user->update();

        // Display success or error message based on the update result
        if ($updateUser) {
            Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
            return redirect()->route('password.edit', ['user' => Auth::user()->id]);
        } else {
            Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini');
            return redirect()->route('password.edit', ['user' => Auth::user()->id]);
        }
    }
}
