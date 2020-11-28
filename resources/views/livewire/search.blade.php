<div class="inline-block relative mr-4" x-data="{ open : true }">
    <input @click.away = "open = false; @this.resetIndex();" @click = "open = true" 
    wire:keydown.arrow-down.prevent = "incrementIndex" 
    wire:keydown.arrow-up.prevent = "decrementIndex" 
    wire:keydown.backspace = "resetIndex" 
    wire:keydown.enter.prevent = "showJob" 

    
    class="w-56 bg-gray-200 text-gray-700 border-2 focus:outline-none px-2 py-1  rounded-full" placeholder="live search .." type="text" wire:model = "query" />

    <svg class="w-5 h-5 text-gray-500 absolute top-0 right-0 mr-2 mt-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
        <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
    </svg>

    @if (strlen($query) > 0)
    <div x-show="open" class="absolute bg-gray-100 border text-md w-56 mt-1">

            @if(count($jobs) > 0)
                @foreach ($jobs as $index => $job) 
                   <p class="py-1 px-1 {{ $index === $selectedIndex ? 'text-green-500' : '' }}">{{ $job->title }}</p>   
                @endforeach
            @else           
            <span class="text-red-500">0 resultat pour : "{{ $query }}"</span>     
            @endif

    </div>
    @endif
   

</div>
