<?php

namespace App\Http\Livewire\ReceivingItems;

use App\Models\ReceivingItem;
use Livewire\Component;

class ReceivingItemsTable extends Component
{
    
    public $receiving_id;
    public $readyToLoad = false;

    protected $listeners = ['refreshReceivingItem'];


    public function refreshReceivingItem()
    {

    }

    public function loadReceivingItems()
    {
       $this->readyToLoad=true;
    }

    public function mount($receiving_id)
    {
        $this->receiving_id = $receiving_id;
    }


    
    public function render()
    {
        return view('livewire.receiving-items.receiving-items-table',[
                'receiving_items' => $this->readyToLoad ? 
                            ReceivingItem::where('receiving_id', $this->receiving_id)
                                        ->with('item', 'receiving', 'batch_number')    
                                        ->get()
                            :
                            []
        ]);
    }
}
