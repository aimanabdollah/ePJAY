<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Configuration;
use App\Models\Orphan;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\Expense;
use App\Models\Income;
use App\Models\Application;
use App\Models\User;
use Carbon\Carbon;
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
        $configuration = Configuration::first();
        return view('home', compact('configuration'));
    }

    public function adminHome()
    {
        // Get the current month, current year and previous year
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');
        $previousYear = $currentYear - 1;

        // Get the months as an array to use for grouping
        $months = range(1, 12);

        // Calculation for small card
        $countAllApplication = Application::count();
        $countAllOrphan = Orphan::count();
        $countAllUser = User::count();
        $sumJumlahTpnCurrentMonth = Income::whereMonth('tarikh', $currentMonth)
            ->whereYear('tarikh', $currentYear)
            ->sum('jumlah_tpn');
        $sumJumlahTbjCurrentMonth = Expense::whereMonth('tarikh', $currentMonth)
            ->whereYear('tarikh', $currentYear)
            ->sum('jumlah_tbj');

        // Query for chart at dashboard

        // Get the sum of jumlah_tpn from the income table, grouped by month for the current year
        $sumJumlahTpnByMonthCurrentYear = Income::selectRaw('MONTH(tarikh) as month')
            ->selectRaw('SUM(jumlah_tpn) as total')
            ->whereYear('tarikh', $currentYear)
            ->groupBy('month')
            ->get()
            ->map(function ($item) use ($months) {
                return [
                    'month' => Carbon::createFromDate(null, $item['month'])->format('M'),
                    'total' => $item['total'],
                ];
            })
            ->toArray();

        // Get the sum of jumlah_tbj from the expense table, grouped by month for the current year
        $sumJumlahTbjByMonthCurrentYear = Expense::selectRaw('MONTH(tarikh) as month')
            ->selectRaw('SUM(jumlah_tbj) as total')
            ->whereYear('tarikh', $currentYear)
            ->groupBy('month')
            ->get()
            ->map(function ($item) use ($months) {
                return [
                    'month' => Carbon::createFromDate(null, $item['month'])->format('M'),
                    'total' => $item['total'],
                ];
            })
            ->toArray();

        // Get the sum of jumlah_tpn from the income table, grouped by month for the previous year
        $sumJumlahTpnByMonthPreviousYear = Income::selectRaw('MONTH(tarikh) as month')
            ->selectRaw('SUM(jumlah_tpn) as total')
            ->whereYear('tarikh', $previousYear)
            ->groupBy('month')
            ->get()
            ->map(function ($item) use ($months) {
                return [
                    'month' => Carbon::createFromDate(null, $item['month'])->format('M'),
                    'total' => $item['total'],
                ];
            })
            ->toArray();

        // Get the sum of jumlah_tbj from the expense table, grouped by month for the previous year
        $sumJumlahTbjByMonthPreviousYear = Expense::selectRaw('MONTH(tarikh) as month')
            ->selectRaw('SUM(jumlah_tbj) as total')
            ->whereYear('tarikh', $previousYear)
            ->groupBy('month')
            ->get()
            ->map(function ($item) use ($months) {
                return [
                    'month' => Carbon::createFromDate(null, $item['month'])->format('M'),
                    'total' => $item['total'],
                ];
            })
            ->toArray();

        $orphanByGender = Orphan::select('Jantina')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('Jantina')
            ->get()
            ->toArray();

        $orphans = Orphan::all();
        $orphanByAge = [
            '6 tahun dan ke bawah' => [],
            '7 hingga 12 tahun' => [],
            '13 hingga 17 tahun' => [],
            '18 tahun dan ke atas' => [],
        ];

        foreach ($orphans as $orphan) {
            $tarikhLahir = Carbon::createFromFormat('Y-m-d', $orphan->tarikh_lahir);
            $age = $tarikhLahir->diffInYears(Carbon::now());

            if ($age <= 6) {
                $orphanByAge['6 tahun dan ke bawah'][] = $orphan->toArray();
            } elseif ($age >= 7 && $age <= 12) {
                $orphanByAge['7 hingga 12 tahun'][] = $orphan->toArray();
            } elseif ($age >= 13 && $age <= 17) {
                $orphanByAge['13 hingga 17 tahun'][] = $orphan->toArray();
            } else {
                $orphanByAge['18 tahun dan ke atas'][] = $orphan->toArray();
            }
        }


        $applicationByStatus = Application::select('status_permohonan')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('status_permohonan')
            ->get()
            ->toArray();

        $userByType = User::selectRaw("CASE
                        WHEN Role = '1' THEN 'Admin'
                        WHEN Role = '2' THEN 'Staf'
                        WHEN Role = '3' THEN 'Penjaga / Waris'
                        ELSE 'Unknown Role' END AS RoleName")
            ->selectRaw('COUNT(*) as count')
            ->groupBy('RoleName')
            ->get()
            ->toArray();

        $expenseDataByCategory = Expense::select('categories.nama as Kategori')
            ->selectRaw('SUM(expenses.jumlah_tbj) as Jumlah')
            ->join('categories', 'categories.id', '=', 'expenses.id_kategori')
            ->groupBy('categories.nama')
            ->get()
            ->toArray();

        return view('admin.dashboard', compact(
            'currentYear',
            'previousYear',
            'countAllApplication',
            'countAllOrphan',
            'countAllUser',
            'sumJumlahTpnCurrentMonth',
            'sumJumlahTbjCurrentMonth',
            'expenseDataByCategory',
            'sumJumlahTpnByMonthCurrentYear',
            'sumJumlahTbjByMonthCurrentYear',
            'sumJumlahTpnByMonthPreviousYear',
            'sumJumlahTbjByMonthPreviousYear',
            'applicationByStatus',
            'userByType',
            'orphanByGender',
            'orphanByAge'
        ));
    }

    public function stafHome()
    {
        // Get the current month, current year and previous year
        $currentMonth = Carbon::now()->format('m');
        $currentYear = Carbon::now()->format('Y');
        $previousYear = $currentYear - 1;

        // Get the months as an array to use for grouping
        $months = range(1, 12);

        // Calculation for small card
        $countAllApplication = Application::count();
        $countAllOrphan = Orphan::count();
        $countAllUser = User::count();
        $sumJumlahTpnCurrentMonth = Income::whereMonth('tarikh', $currentMonth)
            ->whereYear('tarikh', $currentYear)
            ->sum('jumlah_tpn');
        $sumJumlahTbjCurrentMonth = Expense::whereMonth('tarikh', $currentMonth)
            ->whereYear('tarikh', $currentYear)
            ->sum('jumlah_tbj');

        // Query for chart at dashboard

        // Get the sum of jumlah_tpn from the income table, grouped by month for the current year
        $sumJumlahTpnByMonthCurrentYear = Income::selectRaw('MONTH(tarikh) as month')
            ->selectRaw('SUM(jumlah_tpn) as total')
            ->whereYear('tarikh', $currentYear)
            ->groupBy('month')
            ->get()
            ->map(function ($item) use ($months) {
                return [
                    'month' => Carbon::createFromDate(null, $item['month'])->format('M'),
                    'total' => $item['total'],
                ];
            })
            ->toArray();

        // Get the sum of jumlah_tbj from the expense table, grouped by month for the current year
        $sumJumlahTbjByMonthCurrentYear = Expense::selectRaw('MONTH(tarikh) as month')
            ->selectRaw('SUM(jumlah_tbj) as total')
            ->whereYear('tarikh', $currentYear)
            ->groupBy('month')
            ->get()
            ->map(function ($item) use ($months) {
                return [
                    'month' => Carbon::createFromDate(null, $item['month'])->format('M'),
                    'total' => $item['total'],
                ];
            })
            ->toArray();

        // Get the sum of jumlah_tpn from the income table, grouped by month for the previous year
        $sumJumlahTpnByMonthPreviousYear = Income::selectRaw('MONTH(tarikh) as month')
            ->selectRaw('SUM(jumlah_tpn) as total')
            ->whereYear('tarikh', $previousYear)
            ->groupBy('month')
            ->get()
            ->map(function ($item) use ($months) {
                return [
                    'month' => Carbon::createFromDate(null, $item['month'])->format('M'),
                    'total' => $item['total'],
                ];
            })
            ->toArray();

        // Get the sum of jumlah_tbj from the expense table, grouped by month for the previous year
        $sumJumlahTbjByMonthPreviousYear = Expense::selectRaw('MONTH(tarikh) as month')
            ->selectRaw('SUM(jumlah_tbj) as total')
            ->whereYear('tarikh', $previousYear)
            ->groupBy('month')
            ->get()
            ->map(function ($item) use ($months) {
                return [
                    'month' => Carbon::createFromDate(null, $item['month'])->format('M'),
                    'total' => $item['total'],
                ];
            })
            ->toArray();

        $orphanByGender = Orphan::select('Jantina')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('Jantina')
            ->get()
            ->toArray();

        $orphans = Orphan::all();
        $orphanByAge = [
            '6 tahun dan ke bawah' => [],
            '7 hingga 12 tahun' => [],
            '13 hingga 17 tahun' => [],
            '18 tahun dan ke atas' => [],
        ];

        foreach ($orphans as $orphan) {
            $tarikhLahir = Carbon::createFromFormat('Y-m-d', $orphan->tarikh_lahir);
            $age = $tarikhLahir->diffInYears(Carbon::now());

            if ($age <= 6) {
                $orphanByAge['6 tahun dan ke bawah'][] = $orphan->toArray();
            } elseif ($age >= 7 && $age <= 12) {
                $orphanByAge['7 hingga 12 tahun'][] = $orphan->toArray();
            } elseif ($age >= 13 && $age <= 17) {
                $orphanByAge['13 hingga 17 tahun'][] = $orphan->toArray();
            } else {
                $orphanByAge['18 tahun dan ke atas'][] = $orphan->toArray();
            }
        }


        $applicationByStatus = Application::select('status_permohonan')
            ->selectRaw('COUNT(*) as count')
            ->groupBy('status_permohonan')
            ->get()
            ->toArray();

        $userByType = User::selectRaw("CASE
                        WHEN Role = '1' THEN 'Admin'
                        WHEN Role = '2' THEN 'Staf'
                        WHEN Role = '3' THEN 'Penjaga / Waris'
                        ELSE 'Unknown Role' END AS RoleName")
            ->selectRaw('COUNT(*) as count')
            ->groupBy('RoleName')
            ->get()
            ->toArray();

        $expenseDataByCategory = Expense::select('categories.nama as Kategori')
            ->selectRaw('SUM(expenses.jumlah_tbj) as Jumlah')
            ->join('categories', 'categories.id', '=', 'expenses.id_kategori')
            ->groupBy('categories.nama')
            ->get()
            ->toArray();

        return view('staf.dashboard', compact(
            'currentYear',
            'previousYear',
            'countAllApplication',
            'countAllOrphan',
            'countAllUser',
            'sumJumlahTpnCurrentMonth',
            'sumJumlahTbjCurrentMonth',
            'expenseDataByCategory',
            'sumJumlahTpnByMonthCurrentYear',
            'sumJumlahTbjByMonthCurrentYear',
            'sumJumlahTpnByMonthPreviousYear',
            'sumJumlahTbjByMonthPreviousYear',
            'applicationByStatus',
            'userByType',
            'orphanByGender',
            'orphanByAge'
        ));
    }

    public function userHome()
    {
        $countAllApplicationForUser = Application::where('id_pemohon', Auth::id())->count();
        $countPendingApplicationForUser = Application::where('id_pemohon', Auth::id())->where('status_permohonan', 'Dalam Proses')->count();
        $countSuccessApplicationForUser = Application::where('id_pemohon', Auth::id())->where('status_permohonan', 'Berjaya')->count();

        $orphan = Orphan::orderBy('created_at', 'desc')->get();

        return view('penjaga.dashboard', compact('countAllApplicationForUser', 'countPendingApplicationForUser', 'countSuccessApplicationForUser', 'orphan'));
    }
}
