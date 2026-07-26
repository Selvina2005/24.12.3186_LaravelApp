<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Transaction;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Jika Super Admin
        if (Auth::user()->role == 'superadmin') {
            return $this->superAdminDashboard();
        }

        // Jika Organizer
        return $this->organizerDashboard();
    }

    /**
     * Dashboard Organizer
     */
    private function organizerDashboard()
    {
        $organizationId = Auth::user()->organization_id;

        $totalRevenue = Transaction::whereHas('event', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })
        ->whereIn('status', ['success', 'settlement'])
        ->sum('total_price');

        $ticketsSold = Transaction::whereHas('event', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })
        ->whereIn('status', ['success', 'settlement'])
        ->count();

        $activeEvents = Event::where('organization_id', $organizationId)
            ->where('date', '>=', now())
            ->count();

        $pendingOrders = Transaction::whereHas('event', function ($query) use ($organizationId) {
            $query->where('organization_id', $organizationId);
        })
        ->where('status', 'pending')
        ->count();

        $recentTransactions = Transaction::with('event')
            ->whereHas('event', function ($query) use ($organizationId) {
                $query->where('organization_id', $organizationId);
            })
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'totalRevenue',
            'ticketsSold',
            'activeEvents',
            'pendingOrders',
            'recentTransactions'
        ));
    }

    /**
     * Dashboard Super Admin
     */
    private function superAdminDashboard()
    {
        $organizations = Organization::withCount('events')->get();

        $events = Event::all();

        $transactions = Transaction::all();

        $totalRevenue = Transaction::whereIn('status', ['success', 'settlement'])
            ->sum('total_price');

        $ticketsSold = Transaction::whereIn('status', ['success', 'settlement'])
            ->count();

        $activeEvents = Event::where('date', '>=', now())
            ->count();

        $pendingOrders = Transaction::where('status', 'pending')
            ->count();

        $recentTransactions = Transaction::with('event')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard', compact(
            'organizations',
            'events',
            'transactions',
            'totalRevenue',
            'ticketsSold',
            'activeEvents',
            'pendingOrders',
            'recentTransactions'
        ));
    }
}