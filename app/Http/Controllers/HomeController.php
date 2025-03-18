<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use App\Models\Supply;
use App\Models\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

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

        // Cache::put('name', auth()->user(), 1000);
        // dd(
        //     Cache::get('name')
        // );

        return view('home');
    }


    /**
     * Show the application cms.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function cms()
    {

        $wallet = Wallet::first();
        $currentBalance = $wallet->balance;

        $dailySales = Sale::whereDate('sales_date', Carbon::today())
            ->sum('total_amount');

        $dailySales_quantity = Sale::whereDate('sales_date', Carbon::today())
            ->sum('quantity');

        $weeklySales = Sale::whereBetween('sales_date', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->sum('total_amount');

        $weeklySales_quantity = Sale::whereBetween('sales_date', [
            Carbon::now()->startOfWeek(),
            Carbon::now()->endOfWeek()
        ])->sum('quantity');

        $monthlySales = Sale::whereYear('sales_date', Carbon::now()->year)
            ->whereMonth('sales_date', Carbon::now()->month)
            ->sum('total_amount');

        $monthlySales_quantity = Sale::whereYear('sales_date', Carbon::now()->year)
            ->whereMonth('sales_date', Carbon::now()->month)
            ->sum('quantity');

        $quarterlySales = Sale::whereBetween('sales_date', [
            Carbon::now()->startOfQuarter(),
            Carbon::now()->endOfQuarter()
        ])->sum('total_amount');

        $yearlySales = Sale::whereYear('sales_date', Carbon::now()->year)
            ->sum('total_amount');


        $lastWeekTrends = Sale::select(DB::raw('DATE(sales_date) as date'), DB::raw('SUM(total_amount) as total_sales'))
            ->where('sales_date', '>=', Carbon::now()->subDays(7))
            ->groupBy(DB::raw('DATE(sales_date)'))
            ->orderBy('date')
            ->get();


        $lastMonthTrends = Sale::select(DB::raw('DATE(sales_date) as date'), DB::raw('SUM(total_amount) as total_sales'))
            ->where('sales_date', '>=', Carbon::now()->subMonth())
            ->groupBy(DB::raw('DATE(sales_date)'))
            ->orderBy('date')
            ->get();

        $lastMonthSupplies = Supply::select(DB::raw('DATE(supply_date) as date'), DB::raw('SUM(total_amount) as total_sales'))
            ->where('supply_date', '>=', Carbon::now()->subMonth())
            ->groupBy(DB::raw('DATE(supply_date)'))
            ->orderBy('date')
            ->get();


        $topProductsSold = Sale::orderByDesc('quantity')
            ->with(['product' => ['product_category']])
            ->limit(6)
            ->get();

        // dd( $topProductsSold);
        return view(
            'cms.index',
            compact(
                'currentBalance',
                'dailySales',
                'dailySales_quantity',
                'weeklySales',
                'weeklySales_quantity',
                'monthlySales',
                'monthlySales_quantity',
                'quarterlySales',
                'yearlySales',
                'lastWeekTrends',
                'lastMonthTrends',
                'lastMonthSupplies',
                'topProductsSold',
            )
        );
    }
}
