<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use App\Models\Expense;
use Illuminate\Support\Facades\DB;

class StaffDashboardController extends Controller
{
    public function index() {
    
        // $income = DB::select(DB::raw('select sum(jumlah) as jumlah from incomes'));
        
        // $data1 = "";

        // foreach ($income as $val) {
        //     $data1.="$val->jumlah";
        // }
        // $income2 = $data1;

        // dd($income2);

        // return view('staff.dashboard', compact('income'));

    }


}
