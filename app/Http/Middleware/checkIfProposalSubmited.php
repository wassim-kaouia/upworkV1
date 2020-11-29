<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class checkIfProposalSubmited
{

    public function handle(Request $request, Closure $next)
    {

        if(Auth::user()->proposals->contains('job_id',$request->job->id)){
            return redirect()->route('jobs.index');
        }
        return $next($request);
    }
}
