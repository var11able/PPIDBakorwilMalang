<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\InformationRequest;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $totalRequests = InformationRequest::where('user_id', $user->id)->count();
        $pendingRequests = InformationRequest::where('user_id', $user->id)->pending()->count();
        $processedRequests = InformationRequest::where('user_id', $user->id)->diproses()->count();
        $approvedRequests = InformationRequest::where('user_id', $user->id)->disetujui()->count();
        $rejectedRequests = InformationRequest::where('user_id', $user->id)->ditolak()->count();

        $recentRequests = InformationRequest::where('user_id', $user->id)
            ->with(['objection', 'parentRequest'])
            ->latest()
            ->take(5)
            ->get();

        return view('user.dashboard.index', compact(
            'user',
            'totalRequests',
            'pendingRequests',
            'processedRequests',
            'approvedRequests',
            'rejectedRequests',
            'recentRequests'
        ));
    }

    public function history()
    {
        $user = Auth::user();

        $requests = InformationRequest::where('user_id', $user->id)
            ->with(['objection', 'parentRequest'])
            ->latest()
            ->paginate(10);

        return view('user.history.index', compact('requests'));
    }

    public function show($id)
    {
        $user = Auth::user();

        $informationRequest = InformationRequest::where('id', $id)
            ->where('user_id', $user->id)
            ->with(['objection', 'parentRequest'])
            ->firstOrFail();

        return view('user.history.show', compact('informationRequest'));
    }
}
