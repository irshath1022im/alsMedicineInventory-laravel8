<?php

namespace App\Http\Livewire\Shared;

use App\Models\ReceivingItem;
use Livewire\Component;
use Livewire\WithPagination;

class ItemReceivings extends Component
{
    public $item_id;
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $result = ReceivingItem::where('item_id', $this->item_id)
                                ->with('receiving', 'batch_number')
                                ->paginate(5);

        return view('livewire.shared.item-receivings', ['receiving_items' => $result]);
    }
}
