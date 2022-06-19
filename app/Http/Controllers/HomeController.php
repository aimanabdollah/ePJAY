<?php
   
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Expense;
use App\Models\User;
use App\Models\Transaction;
use App\Models\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

        // ================= [ JUMLAH KESELURUHAN PERMOHONAN, ANAK JAGAAN, PENDAPATAN & PERBELANJAAN ] =================

        $application = Application::whereNotNull('id_pemohon')->count();
        $orphan = Application::where('status_permohonan', 'Berjaya')->count();
        $income = Transaction::where('jenis', 'Pendapatan')->sum('jumlah_tpn');
        $expense = Transaction::where('jenis', 'Perbelanjaan')->sum('jumlah_tbj');

        
        // ================= [ JUMLAH STATISTIK PERMOHONAN, ANAK JAGAAN, PENDAPATAN & PERBELANJAAN ] ==================


        // 1. STATISTIK BAGI MODUL ANAK JAGAAN

        // SQL - JUMLAH ANAK JAGAAN MENGIKUT UMUR
        $SQL_kategoriUmur = DB::select(DB::raw(' SELECT CASE WHEN umur < 7 THEN "A: 6 Tahun dan ke bawah"
                                                     WHEN umur >= 7 && umur <=12  THEN "B: 7 - 12 Tahun"
                                                     WHEN umur >= 13 && umur <=17 THEN "C: 13 - 17 Tahun"
                                                     ELSE "D: 18 Tahun dan ke atas"
                                         END AS kategori, COUNT(umur) AS jumlah 
                                         FROM applications WHERE status_permohonan="Berjaya"
                                         AND deleted_at IS NULL GROUP BY kategori
                                         ORDER BY kategori ASC'));

        $data_kategoriUmur = "";
        foreach ($SQL_kategoriUmur as $val) {
              $data_kategoriUmur.="['".$val->kategori."', ".$val->jumlah."],";
        }
        $kategoriUmur = $data_kategoriUmur; 

        // SQL - JUMLAH ANAK JAGAAN MENGIKUT JANTINA
        $SQL_kategoriJantina = DB::select(DB::raw('SELECT jantina, COUNT(jantina) AS jumlah 
                                           FROM applications WHERE status_permohonan="Berjaya" 
                                           AND deleted_at IS NULL GROUP BY jantina'));
        $data_kategoriJantina = "";
        foreach ($SQL_kategoriJantina as $val) {
              $data_kategoriJantina.="['".$val->jantina."', ".$val->jumlah."],";
        }
        $kategoriJantina = $data_kategoriJantina;


        // 2. STATISTIK BAGI MODUL PERMOHONAN

        // SQL - JUMLAH PERMOHONAN DITERIMA MENGIKUT BULAN
        $SQL_jumlahPermohonan = DB::select(DB::raw('select DATE_FORMAT(created_at, "%m/%Y") AS day_date, COUNT(status_permohonan) AS jumlah
        FROM applications WHERE id_permohonan IS NOT NULL GROUP BY day_date'));

        $data_jumlahPermohonan = "";
        foreach ($SQL_jumlahPermohonan as $val) {
               $data_jumlahPermohonan.="['".$val->day_date."', ".$val->jumlah."],";
        }
        $jumlahPermohonan = $data_jumlahPermohonan;

        // SQL - JUMLAH PERMOHONAN MENGIKUT STATUS
        $SQL_statusPermohonan = DB::select(DB::raw(' SELECT CASE WHEN status_permohonan = "Dalam_Proses" THEN "Dalam Proses"
                                                        WHEN status_permohonan = "Tidak_Berjaya"  THEN "Tidak Berjaya"  
                                                        ELSE "Berjaya"
                                         END AS status_permohonan, COUNT(status_permohonan) AS jumlah 
                                         FROM applications WHERE id_permohonan IS NOT NULL
                                         GROUP BY status_permohonan'));

        $data_statusPermohonan = "";
        foreach ($SQL_statusPermohonan as $val) {
              $data_statusPermohonan.="['".$val->status_permohonan."', ".$val->jumlah."],";
        }
        $statusPermohonan = $data_statusPermohonan;


        // 3. STATISTIK BAGI MODUL PENDAPATAN DAN PERBELANJAAN

        // SQL - JUMLAN PENDAPATAN DAN PERBELANJAAN MENGIKUT BULAN
        $SQL_pendapatanPerbelanjaan = DB::select(DB::raw('select DATE_FORMAT(tarikh, "%m/%Y") AS day_date, SUM(jumlah_tpn) AS jumlah_tpn, SUM(jumlah_tbj) AS jumlah_tbj
        FROM transactions GROUP BY day_date ORDER BY day_date ASC'));

        $data_pendapatanPerbelanjaan = "";
        foreach ($SQL_pendapatanPerbelanjaan as $val) {
             $data_pendapatanPerbelanjaan.="['".$val->day_date."', ".$val->jumlah_tpn.", ".$val->jumlah_tbj."],";
        }
        $jumlahPendapatanDanPerbelanjaan = $data_pendapatanPerbelanjaan;

        // SQL - JUMLAN PENDAPATAN MENGIKUT KATEGORI 
        $SQL_kategoriPendapatan = DB::select(DB::raw('select kategori as kategori, sum(jumlah_tpn) as jumlah_tpn from transactions where jenis = "Pendapatan" GROUP BY kategori'));
        $data_kategoriPendapatan = "";
        foreach ($SQL_kategoriPendapatan as $val) {
             $data_kategoriPendapatan.="['".$val->kategori."', ".$val->jumlah_tpn."],";
         }
         $kategoriPendapatan = $data_kategoriPendapatan;

        // SQL - JUMLAH PERBELANJAAN MENGIKUT KATEGORI
        $SQL_kategoriPerbelanjaan = DB::select(DB::raw('select kategori as kategori, sum(jumlah_tbj) as jumlah_tbj from transactions where jenis = "Perbelanjaan" GROUP BY kategori'));
        $data_kategoriPerbelanjaan = "";
        foreach ($SQL_kategoriPerbelanjaan as $val) {
             $data_kategoriPerbelanjaan.="['".$val->kategori."', ".$val->jumlah_tbj."],";
         }
        $kategoriPerbelanjaan = $data_kategoriPerbelanjaan;


        return view('staff.dashboard', compact('income', 'expense', 'orphan', 'application', 
        'jumlahPendapatanDanPerbelanjaan', 'kategoriPendapatan', 'kategoriPerbelanjaan', 
        'kategoriJantina', 'kategoriUmur', 'statusPermohonan', 'jumlahPermohonan'));
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
             'password'   => ['required', 'min:6', 'max:10'],
         ]);

        // CARA ELOQUENT ORM
          $user = new User();
        
          $user->is_admin = $validateData['kategori'];
          $user->name = $validateData['name'];
          $user->email = $validateData['email'];
          $user->num_phone = $validateData['num_phone'];
          $user->password =  Hash::make($validateData['password']);
    
          $saveUser = $user->save();
         
          if ($saveUser) {
                Alert::success('Berjaya', 'Rekod telah berjaya ditambah');
                return redirect('/admin-user');
          }
          else {
                Alert::error('Gagal', 'Rekod tidak berjaya ditambah');
                return redirect('/admin-user');
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