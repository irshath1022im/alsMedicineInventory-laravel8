<?php

namespace App\Http\Livewire\Shared;

use App\Models\Item;
use Livewire\Component;

class ItemComponent extends Component
{

    public $item_id;

    public function mount($item_id)
    {
      return  $this->item_id = $item_id;
    }

    public function render()
    {

        $result = Item::findOrFail($this->item_id);

        return view('livewire.shared.item-component', ['item' => $result]);
    }
}
