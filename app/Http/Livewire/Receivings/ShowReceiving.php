<?php

namespace App\Http\Livewire\Receivings;

use App\Models\Receiving;
use Livewire\Component;

class ShowReceiving extends Component
{
    public $receiving_id;

   

    
   
    public function NewReceivingItemModalClose()
    {
        $this->emit('refreshReceivingItem');
    }


  

    public function mount($id)
    {
        $this->receiving_id = $id;
    }

  
    
    public function render()
    {

        $result = Receiving::withCount('receiving_items')->with('supplier', 'receiving_items')->find($this->receiving_id);

        return view('livewire.receivings.show-receiving',[
                    'receiving' => $result
                    ])
                 ->extends('layouts.app');
    }
}
