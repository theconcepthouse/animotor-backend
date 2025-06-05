<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ReportIncident;
use Google\Service\CloudSourceRepositories\Repo;
use Illuminate\Http\Request;

class ReportIncidentController extends Controller
{
    public function index()
    {
         if (isAdmin()) {
             $reports = ReportIncident::latest()->paginate(100);
         }else{
              $reports = ReportIncident::where('user_id', auth()->id())->latest()->paginate(100);
         }

        return view('admin.reports-incidents.index', compact('reports'));
    }

    public function addClaim()
    {
        return view('admin.reports-incidents.add-claim');
    }

    public function editClaim($claimId)
    {
        $report = ReportIncident::findOrFail($claimId);
        return view('admin.reports-incidents.edit-claim', compact('report'));
    }

    public function updateClaimStatus(Request $request, $claimId)
    {
        $report = ReportIncident::findOrFail($claimId);
        $report->update(['status' => $request->status, 'damage_type' => $request->damage_type]);
        return redirect()->back()->with('message', 'Claim updated successfully');
    }
}
