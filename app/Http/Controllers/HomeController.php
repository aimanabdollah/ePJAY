<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
   
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('parent.dashboard');
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
         //return view('adminHome');
        return view('staff.dashboard');
    }

    public function adminFinance()
    {
        return view('staff.finance.finance');
    }

    public function adminAddIncome()
    {
        return view('staff.finance.finance-addIncome');
    }

    public function adminAddExpense()
    {
        return view('staff.finance.finance-addExpense');
    }

    public function adminEditIncome()
    {
        return view('staff.finance.finance-editIncome');
    }

    public function adminEditExpense()
    {
        return view('staff.finance.finance-editExpense');
    }

    public function adminListIncome()
    {
        return view('staff.finance.finance-listIncome');
    }

    public function adminListExpense()
    {
        return view('staff.finance.finance-listExpense');
    }

    public function adminApplication()
    {
        return view('staff.application.application-list');
    }

    public function adminViewApplication()
    {
        return view('staff.application.application-view');
    }



    
    public function adminOrphan()
    {
        return view('staff.orphan.orphan-list');
    }

    public function adminAddOrphan()
    {
        return view('staff.orphan.orphan-add');
    }

    public function adminEditOrphan()
    {
        return view('staff.orphan.orphan-edit');
    }

    public function adminViewOrphan()
    {
        return view('staff.orphan.orphan-view');
    }
    
}