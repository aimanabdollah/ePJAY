<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Database\QueryException;
use Illuminate\Validation\ValidationException;

class ConfigurationController extends Controller
{
    // Method to display the list of configurations
    public function index()
    {
        // Retrieve configurations ordered by creation date in descending order
        $configuration = Configuration::orderBy('created_at', 'desc')->get();
        return view('admin.konfigurasi.senarai_konfigurasi', compact('configuration'));
    }

    // Method to display the form for creating a new configuration
    public function create()
    {
        // Display the form for creating a new configuration
        return view('admin.konfigurasi.tambah_konfigurasi');
    }

    // Method to display the form for editing a system configuration
    public function editSys(Configuration $configuration)
    {
        // Display the form for editing a system configuration
        return view('admin.konfigurasi.edit_konfigurasi_sistem', ['configuration' => $configuration]);
    }

    // Method to display the form for editing an organization configuration
    public function editOrg(Configuration $configuration)
    {
        // Display the form for editing an organization configuration
        return view('admin.konfigurasi.edit_konfigurasi_pusat_jagaan', ['configuration' => $configuration]);
    }

    // Method to update the system configuration
    public function updateSys(Request $request, Configuration $configuration)
    {
        try {
            // Validate the input data for updating the system configuration
            $validateData = $request->validate([
                'nama_sistem' => 'required',
                'singkatan_sistem' => 'required',
            ]);

            // Update the configuration data from the validated input
            $configuration->nama_sistem = $validateData['nama_sistem'];
            $configuration->singkatan_sistem = $validateData['singkatan_sistem'];

            // Check if a new logo for the system is uploaded
            if ($request->hasFile('logo_sistem')) {
                $request->validate([
                    'logo_sistem' => 'image|mimes:jpg,png,jpeg|max:2048',
                ]);

                // Move the uploaded logo to the 'assets/sistem' directory and update the filename in the configuration
                $file = $request->file('logo_sistem');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/sistem', $filename);
                $configuration->logo_sistem = $filename;
            }

            // Save the updated configuration
            $updateConfiguration = $configuration->update();

            if ($updateConfiguration) {
                // Show SweetAlert success message and redirect to the admin-configuration page
                Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
                return redirect('/admin-configuration');
            } else {
                // Show SweetAlert error message and redirect to the admin-configuration page
                Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini');
                return redirect('/admin-configuration');
            }
        }  catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
           Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini: ' . $e->getMessage());
            return redirect('/admin-configuration');
        }

    }

    // Method to update the organization configuration
    public function updateOrg(Request $request, Configuration $configuration)
    {
        try {
            // Validate the input data for updating the organization configuration
            $validateData = $request->validate([
                'nama_pusat_jagaan' => 'required',
                'singkatan_pusat_jagaan' => '',
                'logo_pusat_jagaan' => '',
                'alamat1' => 'required',
                'poskod' => 'required|digits:5',
                'bandar' => 'required',
                'negeri' => 'required',
                'no_fax' => '',
                'no_tel' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
                'emel' => 'required|email',
            ]);

            // Update the configuration data from the validated input
            $configuration->nama_pusat_jagaan = $validateData['nama_pusat_jagaan'];
            $configuration->signkatan_pusat_jagaan = $validateData['singkatan_pusat_jagaan'];
            $configuration->alamat1 = $validateData['alamat1'];
            $configuration->poskod = $validateData['poskod'];
            $configuration->bandar = $validateData['bandar'];
            $configuration->negeri = $validateData['negeri'];
            $configuration->no_fax = $validateData['no_fax'];
            $configuration->no_tel = $validateData['no_tel'];
            $configuration->emel = $validateData['emel'];

            // Check if a new logo for the organization is uploaded
            if ($request->hasFile('logo_pusat_jagaan')) {
                $request->validate([
                    'logo_pusat_jagaan' => 'image|required|mimes:jpg,png,jpeg|max:2048',
                ]);

                // Move the uploaded logo to the 'assets/pusat_jagaan' directory and update the filename in the configuration
                $file = $request->file('logo_pusat_jagaan');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/pusat_jagaan', $filename);
                $configuration->logo_pusat_jagaan = $filename;
            }

            // Save the updated configuration
            $updateConfiguration = $configuration->update();

            if ($updateConfiguration) {
                // Show SweetAlert success message and redirect to the admin-configuration page
                Alert::success('Berjaya', 'Rekod telah berjaya dikemaskini');
                return redirect('/admin-configuration');
            } else {
                // Show SweetAlert error message and redirect to the admin-configuration page
                Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini');
                return redirect('/admin-configuration');
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
           Alert::error('Harap Maaf', 'Rekod tidak berjaya dikemaskini: ' . $e->getMessage());
            return redirect('/admin-configuration');
        }
    }
}
