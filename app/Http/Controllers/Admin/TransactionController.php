<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role == 'superadmin') {

            // Super Admin melihat semua transaksi
            $transactions = Transaction::with(['event.organization'])
                ->latest()
                ->paginate(20);

        } else {

            // Organizer hanya melihat transaksi organisasinya
            $transactions = Transaction::with(['event.organization'])
                ->whereHas('event', function ($query) use ($user) {
                    $query->where('organization_id', $user->organization_id);
                })
                ->latest()
                ->paginate(20);
        }

        return view('admin.transactions.index', compact('transactions'));
    }
}