<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SalesReport extends Mailable
{
    use Queueable, SerializesModels;

    public $period;
    public $start;
    public $end;
    public $total;
    public $sales;

    /**
     * Create a new message instance.
     */
    public function __construct($period, $start, $end, $total, $sales)
    {
        $this->period = $period;
        $this->start = $start;
        $this->end = $end;
        $this->total = $total;
        $this->sales = $sales;
    }

    public function build()
    {
        return $this->markdown('emails.sales_report')
            ->subject("{$this->period} Sales Report - " . config('app.name'));
    }

   

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
