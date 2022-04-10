<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Transaction;
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
        $income = Transaction::where('jenis', 'Pendapatan')->sum('jumlah_tpn');
        $expense = Transaction::where('jenis', 'Perbelanjaan')->sum('jumlah_tbj');
        $orphan = Application::where('status_permohonan', 'Berjaya')->count();
        $application = Application::whereNotNull('id_pemohon')->count();


         $amountByMonth = DB::select(DB::raw('select DATE_FORMAT(tarikh, "%Y-%m") AS day_date, SUM(jumlah_tpn) AS jumlah_tpn, SUM(jumlah_tbj) AS jumlah_tbj
         FROM transactions GROUP BY day_date ORDER BY day_date ASC'));

         $data1 = "";
         foreach ($amountByMonth as $val) {
             $data1.="['".$val->day_date."', ".$val->jumlah_tpn.", ".$val->jumlah_tbj."],";
         }
         $amountLine = $data1;

        $groupIncome = DB::select(DB::raw('select kategori as kategori, sum(jumlah_tpn) as jumlah_tpn from transactions where jenis = "Pendapatan" GROUP BY kategori'));
        $data2 = "";
        foreach ($groupIncome as $val) {
             $data2.="['".$val->kategori."', ".$val->jumlah_tpn."],";
         }
         $incomeCate = $data2;

        $groupExpense = DB::select(DB::raw('select kategori as kategori, sum(jumlah_tbj) as jumlah_tbj from transactions where jenis = "Perbelanjaan" GROUP BY kategori'));
        $data3 = "";
        foreach ($groupExpense as $val) {
             $data3.="['".$val->kategori."', ".$val->jumlah_tbj."],";
         }
         $expenseCate = $data3;

         //dd($expenseCate);

     

        return view('staff.dashboard', compact('income', 'expense', 'orphan', 'application', 'amountLine', 'incomeCate', 'expenseCate'));
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