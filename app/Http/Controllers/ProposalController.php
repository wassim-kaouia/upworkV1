<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Message;
use App\Models\Proposal;
use App\Models\CoverLetter;
use App\Models\Conversation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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


    public function confirm(Request $request)
    {
        // dd($request->proposal);
        $proposal = Proposal::find($request->proposal);

        // $proposal->validated = true;
        // $proposal->save();

        $proposal->fill([
            'validated' => 1
        ]);

        //check with isDirty if the updated of proposal has been done since it was created or not
        if($proposal->isDirty()){
            $proposal->save();

            $conversation = Conversation::create([
                'from'   => Auth::user()->id,
                'to'     => $proposal->user->id,
                'job_id' => $proposal->job_id,
            ]);

            //creation de mon premier message
            Message::create([
                'user_id'         => auth()->user()->id,
                'conversation_id' => $conversation->id,
                'content'         => "bonjour , j'ai bien validé votre proposition",  
            ]);
        }
        //redirect to messages or discussion page
        return redirect()->route('jobs.index');

    }
}
