<?php

namespace App\Http\Livewire\Items;

use Livewire\Component;

class Show extends Component
{
    public $item_id;

    public function render()
    {
        return view('livewire.items.show');
    }
}
