<?php

namespace App\Http\Livewire\Receivings;

use App\Models\Receiving;
use Livewire\Component;

class ShowReceiving extends Component
{
    public $receiving_id;

   
    protected $listeners = ['refreshReceivingItem'];
    
   
    public function refreshReceivingItem()
    {
      
    }


  

    public function mount($id)
    {
        $this->receiving_id = $id;
    }

  
    
    public function render()
    {

        $result = Receiving::withCount('receiving_items')
                            ->with('supplier')->find($this->receiving_id);

        return view('livewire.receivings.show-receiving',[
                    'receiving' => $result
                    ])
                 ->extends('layouts.app');
    }
}
