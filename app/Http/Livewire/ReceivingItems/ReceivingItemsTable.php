<?php

namespace App\Http\Livewire\ReceivingItems;

use App\Models\ReceivingItem;
use Livewire\Component;

class ReceivingItemsTable extends Component
{
    
    public $receiving_id;
    public $receiving_items_count;

    protected $listeners = ['refreshReceivingItem'];


    public function refreshReceivingItem()
    {

    }

    
   

    public function mount($receiving_id, $receiving_items_count)
    {
        $this->receiving_id = $receiving_id;
        $this->receiving_items_count = $receiving_items_count;
    }


    
    public function render()
    {
        return view('livewire.receiving-items.receiving-items-table',[
                'receiving_items' =>
                            ReceivingItem::where('receiving_id', $this->receiving_id)
                                        ->with('item', 'batch_number')    
                                        ->get()
                            
        ]);
    }
}
