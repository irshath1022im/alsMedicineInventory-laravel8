<?php

namespace App\Http\Livewire\Badges;

use App\Models\BatchNumber;
use Livewire\Component;
use Livewire\WithPagination;

class ShowBadgesByItemId extends Component
{

    public $item_id;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {

        $result = BatchNumber::where('item_id', $this->item_id)
                            ->simplePaginate(5);

        return view('livewire.badges.show-badges-by-item-id', ['badge_numbers' => $result]);
    }
}
