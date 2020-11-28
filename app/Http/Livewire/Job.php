<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Job extends Component
{
    public $job;

    public function addLike()
    {
        if(Auth::check())
        {
            Auth::user()->likes()->toggle($this->job->id);
        }
        //envoyer une error / flash messages
        else 
        {
            $this->emit('flash','Merci de vous connecter pour pouvoir ajouter au favori','danger');
        }


    }

    public function render()
    {
        return view('livewire.job');
    }
}
