<?php

namespace App\Console\Commands;

use App\Mail\SalesReport;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendDailySalesReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'report:daily';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send daily sales report at 23:50';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $start = Carbon::now()->subDay()->startOfDay();
        $end = Carbon::now()->subDay()->endOfDay();
        
        $sales = Sale::whereBetween('sales_date', [$start, $end])->get();
        $total = $sales->sum('total_amount');
        
        
        
        Mail::to(config('app.report_recipient'))
            ->cc(config('app.manager_email'))
            ->send(new SalesReport('Daily', $start, $end, $total, $sales));
    }
}
