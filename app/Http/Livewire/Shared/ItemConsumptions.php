<?php

namespace App\Http\Livewire\Shared;

use App\Models\Consumption;
use Livewire\Component;
use Livewire\WithPagination;

class ItemConsumptions extends Component
{
    public $item_id;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';
 

    public function render()
    {
        $result = Consumption::where('item_id', $this->item_id)
                            ->with('batch_number','location')
                            ->simplePaginate(5);

        return view('livewire.shared.item-consumptions', ['consumptions' => $result]);
    }
}
