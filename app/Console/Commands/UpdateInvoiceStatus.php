<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use Carbon\Carbon;

class UpdateInvoiceStatus extends Command
{
    protected $signature = 'invoice:update-status';
    protected $description = 'Update invoice status to overdue if the end date is today and status is not paid or partially paid';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = Carbon::today();

        $invoices = Invoice::where('end_date', $today)
            ->whereNotIn('status', ['paid', 'partially paid'])
            ->get();

        foreach ($invoices as $invoice) {
            $invoice->status = 'overdue';
            $invoice->save();

            $this->info("Invoice ID {$invoice->id} status updated to overdue.");
        }

        $this->info('Invoice status update completed.');
    }
}
