<?php

namespace App\Http\Livewire;

use App\Models\Job;
use Livewire\Component;

class Search extends Component
{
    public $query = '';
    public $jobs = [];
    public $selectedIndex = 0;

    public function incrementIndex(){
        // dd('down btn pressed');
        if($this->selectedIndex === count($this->jobs) - 1){
            $this->selectedIndex = 0;
            return;
        }
        $this->selectedIndex++;
    }

    public function decrementIndex(){
        // dd('down btn pressed');
        if($this->selectedIndex === 0){
            $this->selectedIndex = count($this->jobs) - 1;
            return;
        }
        $this->selectedIndex--;
    }

    public function resetIndex(){

       $this->reset('selectedIndex');
    }
    

    public function updatedQuery(){

        $words = '%' . $this->query . '%'; 

        if(strlen($words) > 2){
            $this->jobs = Job::where('title','like', $words)
            ->orWhere('description' , 'like' , $words)
            ->get();
        }

    }

    public function showJob(){
        // dd($this->jobs[$this->selectedIndex]['id']);
        if(!empty($this->jobs))
        {
            return redirect()->route('jobs.show',[ $this->jobs[$this->selectedIndex]['id'] ]);
        }
    }

    public function render()
    {
        return view('livewire.search');
    }
}
