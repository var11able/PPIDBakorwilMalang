<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\InformationRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminReportController extends Controller
{
    public function index()
    {
        $userStats = User::where('role', 'user')
            ->withCount('requests')
            ->orderByDesc('requests_count')
            ->take(10)
            ->get();

        $monthlyRequests = InformationRequest::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('YEAR(created_at) as year'),
            DB::raw('COUNT(*) as total'),
            DB::raw('SUM(CASE WHEN status = "disetujui" THEN 1 ELSE 0 END) as approved'),
            DB::raw('SUM(CASE WHEN status = "ditolak" THEN 1 ELSE 0 END) as rejected')
        )
            ->where('created_at', '>=', now()->subMonths(12))
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $recentActivity = InformationRequest::with('user')
            ->latest()
            ->take(20)
            ->get();

        return view('admin.reports.index', compact('userStats', 'monthlyRequests', 'recentActivity'));
    }
}
