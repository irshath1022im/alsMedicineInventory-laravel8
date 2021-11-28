<?php

namespace App\Http\Livewire\Items;

use Livewire\Component;

class ItemSearchBar extends Component
{

    public $searchValue;


    public function updatedSearchValue()
    {
        $this->emit('updateSearchValue', $this->searchValue);
    }



    public function render()
    {
        return view('livewire.items.item-search-bar');
    }
}
