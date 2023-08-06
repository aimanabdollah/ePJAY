<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use App\Models\Configuration;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function sidebar()
    {
        $configuration = Configuration::get();
        return view('backend.layouts.sidebar', compact('configuration'));
    }

    public function header()
    {
        $configuration = Configuration::get();
        return view('backend.layouts.app', compact('configuration'));
    }
}
