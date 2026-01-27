<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformationRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalRequests = InformationRequest::count();
        $pendingRequests = InformationRequest::pending()->count();
        $processedRequests = InformationRequest::diproses()->count();
        $approvedRequests = InformationRequest::disetujui()->count();
        $rejectedRequests = InformationRequest::ditolak()->count();

        $totalUsers = User::where('role', 'user')->count();

        $monthlyStats = InformationRequest::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('COUNT(*) as total')
        )
            ->where('created_at', '>=', now()->subMonths(6))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $recentRequests = InformationRequest::with('user')
            ->latest()
            ->take(5)
            ->get();

        return view('admin.dashboard.index', compact(
            'totalRequests',
            'pendingRequests',
            'processedRequests',
            'approvedRequests',
            'rejectedRequests',
            'totalUsers',
            'monthlyStats',
            'recentRequests'
        ));
    }
}
