<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
   
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
        $application = Application::where('id_pemohon', Auth::id())->count();
        $successApp = Application::where('id_pemohon', Auth::id())->where('status_permohonan', 'Berjaya')->count();
        $failApp = Application::where('id_pemohon', Auth::id())->where('status_permohonan', 'Tidak_Berjaya')->count();
        $pendingApp = Application::where('id_pemohon', Auth::id())->where('status_permohonan', 'Dalam_Proses')->count();
        
        return view('parent.dashboard', compact('application', 'successApp', 'failApp', 'pendingApp'));
    }
  
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function adminHome()
    {
        $income = Income::all()->sum('amount_tpn');
        $expense = Expense::all()->sum('amount_tbj');
        $orphan = Application::where('status_permohonan', 'Berjaya')->count();
        $application = Application::whereNotNull('id_pemohon')->count();
        return view('staff.dashboard', compact('income', 'expense', 'orphan', 'application'));
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