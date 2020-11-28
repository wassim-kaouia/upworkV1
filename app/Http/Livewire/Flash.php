<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Flash extends Component
{
    public $message;
    public $type;
    public $colors = 
    [
        'danger' => 'border-red-700 tex-red-700 bg-red-200',
        'success' => 'border-green-700 tex-green-700 bg-green-200',
        'primary' => 'border-blue-700 tex-blue-700 bg-blue-200',
    ];

    protected $listeners = ['flash' => 'setFlashMessage'];

    public function setFlashMessage($message,$type)
    {
        $this->message = $message;
        $this->type   = $type;

        $this->dispatchBrowserEvent('flash-message',
         [
            'message' => $this->message,
            'type'    => $this->type,
        ]
    );

    }

    public function render()
    {
        return view('livewire.flash');
    }
}
