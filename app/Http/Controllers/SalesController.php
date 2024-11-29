<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function index()
    {
        // Joriy oy uchun umumiy ma'lumotlarni olish
        $statusValues = ['draft', 'sent', 'paid', 'partially paid', 'overdue', 'canceled'];
        $data = [];

        foreach ($statusValues as $status) {
            // Har bir status uchun invoicelar
            $totalAmount = DB::table('invoices')
                ->where('status', $status)
                ->whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', date('Y'))
                ->sum('amount');

            $countInvoices = DB::table('invoices')
                ->where('status', $status)
                ->whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', date('Y'))
                ->count();

            // Har bir status uchun transaction'larni hisoblash
            $transactionAmount = DB::table('transactions')
                ->join('invoices', 'transactions.invoice_id', '=', 'invoices.id')
                ->where('invoices.status', $status)
                ->whereMonth('transactions.created_at', '=', date('m'))
                ->whereYear('transactions.created_at', '=', date('Y'))
                ->sum('transactions.amount');

            $transactionCount = DB::table('transactions')
                ->join('invoices', 'transactions.invoice_id', '=', 'invoices.id')
                ->where('invoices.status', $status)
                ->whereMonth('transactions.created_at', '=', date('m'))
                ->whereYear('transactions.created_at', '=', date('Y'))
                ->count();

            $data[$status] = [
                'totalAmount' => $totalAmount,
                'countInvoices' => $countInvoices,
                'transactionAmount' => $transactionAmount,
                'transactionCount' => $transactionCount,
            ];
        }

        // Refunded va Disputed holatlari uchun ma'lumotlarni alohida olish
        $refundedAmount = DB::table('invoices')
            ->where('status', 'refunded')
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->sum('amount');

        $refundedCount = DB::table('invoices')
            ->where('status', 'refunded')
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->count();

        $disputedAmount = DB::table('invoices')
            ->where('status', 'disputed')
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->sum('amount');

        $disputedCount = DB::table('invoices')
            ->where('status', 'disputed')
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->count();

        $criticalIssues = DB::table('invoices')
            ->whereIn('status', ['refunded', 'disputed'])
            ->whereMonth('created_at', '=', date('m'))
            ->whereYear('created_at', '=', date('Y'))
            ->get();


        return view('pages.reports.sales', compact('data', 'refundedAmount', 'refundedCount', 'disputedAmount', 'disputedCount', 'criticalIssues'));
    }
}