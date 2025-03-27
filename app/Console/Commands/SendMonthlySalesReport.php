<?php

namespace App\Console\Commands;

use App\Mail\SalesReport;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendMonthlySalesReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:Monthly';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Monthly sales report at end of month';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $start = Carbon::now()->subMonth()->startOfMonth();
        $end = Carbon::now()->subMonth()->endOfMonth();
        
        $sales = Sale::whereBetween('sales_date', [$start, $end])->get();
        $total = $sales->sum('total_amount');
        
        Mail::to(config('app.report_recipient'))
            ->cc(config('app.manager_email'))
            ->send(new SalesReport('Daily', $start, $end, $total, $sales));
    }
}
