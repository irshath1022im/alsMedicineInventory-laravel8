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
    protected $listeners = ['itemReceivingsRequest'];


    public function mount($item_id)
    {
      $this->item_id = $item_id;
    }

    public function render()
    {
        $result = ReceivingItem::where('item_id', $this->item_id)
                                ->with('receiving', 'batch_number')
                                ->orderByDesc('receiving_id')
                                ->paginate(5);

        return view('livewire.shared.item-receivings', ['receiving_items' => $result]);
    }
}
