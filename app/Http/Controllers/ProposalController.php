<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Proposal;
use App\Models\CoverLetter;
use Illuminate\Http\Request;

class ProposalController extends Controller
{
    public function store(Request $request,Job $job)
    {
        $proposal = Proposal::create([
            'job_id'    => $job->id,
            'validated' => false,
        ]);

        $coverLetter = CoverLetter::create([
            'proposal_id' => $proposal->id,
            'content'     => $request->input('content'),
        ]);

        return redirect()->route('jobs.index');
    }
}
