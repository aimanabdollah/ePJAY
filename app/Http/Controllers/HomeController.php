<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
   
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

       
        $user = auth()->id();

        $groupStatus2 = DB::table('applications')
            ->select('id_pemohon', 'status_permohonan', DB::raw('CASE WHEN status_permohonan = "Dalam_Proses" THEN "Dalam Proses"
                                                        WHEN status_permohonan = "Tidak_Berjaya"  THEN "Tidak Berjaya"  
                                                        ELSE "Berjaya"
                                         END AS status_permohonan, COUNT(status_permohonan) AS jumlah'))
            ->where('id_pemohon', $user)
            ->groupBy(DB::raw('status_permohonan'))
            ->get();

        
        $data1 = "";
        foreach ($groupStatus2 as $val) {
              $data1.="['".$val->status_permohonan."', ".$val->jumlah."],";
        }
        $statusCate1 = $data1;

     
       // dd($statusCate1);

        $amountApplication = DB::table('applications')
            ->select('id_pemohon', DB::raw('DATE_FORMAT(created_at, "%m/%Y") AS day_date, COUNT(status_permohonan) AS jumlah'))
            ->where('id_pemohon', $user)
            ->groupBy(DB::raw('DATE_FORMAT(created_at, "%m/%Y") ORDER BY day_date ASC'))
            ->get();

        
        $data2 = "";
        foreach ($amountApplication as $val) {
              $data2.="['".$val->day_date."', ".$val->jumlah."],";
        }
        $chartApplication = $data2;

        
        return view('parent.dashboard', compact('application', 'successApp', 'failApp', 'pendingApp', 'statusCate1', 'chartApplication'));
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


         $amountByMonth = DB::select(DB::raw('select DATE_FORMAT(tarikh, "%m/%Y") AS day_date, SUM(jumlah_tpn) AS jumlah_tpn, SUM(jumlah_tbj) AS jumlah_tbj
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

        $groupGender = DB::select(DB::raw('SELECT jantina, COUNT(jantina) AS jumlah 
                                           FROM applications WHERE status_permohonan="Berjaya" 
                                           AND deleted_at IS NULL GROUP BY jantina'));
        $data4 = "";
        foreach ($groupGender as $val) {
              $data4.="['".$val->jantina."', ".$val->jumlah."],";
        }
        $genderCate = $data4;

 
        $groupAge = DB::select(DB::raw(' SELECT CASE WHEN umur < 7 THEN "A: 6 Tahun dan ke bawah"
                                                     WHEN umur >= 7 && umur <=12  THEN "B: 7 - 12 Tahun"
                                                     WHEN umur >= 13 && umur <=17 THEN "C: 13 - 17 Tahun"
                                                     ELSE "D: 18 Tahun dan ke atas"
                                         END AS kategori, COUNT(umur) AS jumlah 
                                         FROM applications WHERE status_permohonan="Berjaya"
                                         AND deleted_at IS NULL GROUP BY kategori
                                         ORDER BY kategori ASC'));

        $data5 = "";
        foreach ($groupAge as $val) {
              $data5.="['".$val->kategori."', ".$val->jumlah."],";
        }
        $ageCate = $data5; 
        
        $groupStatus = DB::select(DB::raw(' SELECT CASE WHEN status_permohonan = "Dalam_Proses" THEN "Dalam Proses"
                                                        WHEN status_permohonan = "Tidak_Berjaya"  THEN "Tidak Berjaya"  
                                                        ELSE "Berjaya"
                                         END AS status_permohonan, COUNT(status_permohonan) AS jumlah 
                                         FROM applications WHERE id_permohonan IS NOT NULL
                                         GROUP BY status_permohonan'));

        $data6 = "";
        foreach ($groupStatus as $val) {
              $data6.="['".$val->status_permohonan."', ".$val->jumlah."],";
        }
        $statusCate = $data6;

         $amountApplication = DB::select(DB::raw('select DATE_FORMAT(created_at, "%m/%Y") AS day_date, COUNT(status_permohonan) AS jumlah
         FROM applications WHERE id_permohonan IS NOT NULL GROUP BY day_date'));

         $data7 = "";
         foreach ($amountApplication as $val) {
               $data7.="['".$val->day_date."', ".$val->jumlah."],";
         }
         $chartApplication = $data7;

        //dd($chartApplication);

        return view('staff.dashboard', compact('income', 'expense', 'orphan', 'application', 'amountLine', 'incomeCate', 'expenseCate', 'genderCate', 'ageCate', 'statusCate', 'chartApplication'));
    }

    public function userList()
    {
        $user = User::whereNotNull('id')->get(); 
        return view('staff.user.user-list', compact('user'));
    }
   
    public function userCreate()
    {
        return view('staff.user.user-add');
    }

    public function userStore(Request $request)
    {
         $validateData = $request->validate([
             'kategori' => 'required',
             'name' => 'required',
             'email'    => 'required',
             'num_phone'   => 'required',
             'password'   => 'required',
         ]);

        // CARA ELOQUENT ORM
          $user = new User();
        
          $user->is_admin = $validateData['kategori'];
          $user->name = $validateData['name'];
          $user->email = $validateData['email'];
          $user->num_phone = $validateData['num_phone'];
          $user->password = $validateData['password'];
    
          $saveUser = $user->save();
         
          if ($saveUser) {
                Alert::success('Berjaya', 'Rekod telah berjaya ditambah');
                return redirect('/admin/user');
          }
          else {
                Alert::error('Gagal', 'Rekod tidak berjaya ditambah');
                return redirect('/admin/user');
           }
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