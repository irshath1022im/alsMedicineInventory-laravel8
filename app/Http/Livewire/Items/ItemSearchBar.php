<?php

namespace App\Http\Livewire\Items;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class ItemSearchBar extends Component
{


    public $searchValue;
    public $searchResult;
    public $selectedItemId;



   
    public function updatedSearchValue()
    {
        // $this->emit('updateSearchValue', $this->searchValue);
        
        if(!empty($this->searchValue)) {
            
                    $this->searchResult = Item::withCount('batch_numbers')
                            ->when($this->searchValue, function($query){
                                return $query
                                        ->where('name', 'like', $this->searchValue.  '%')
                                        ->orWhere('erp_code', 'like', $this->searchValue. '%');
                                    })
                            ->take(3)
                            ->get();

        }else {
            $this->searchResult=[];
        }


    }

  

    public function render()
    {
     
        return view('livewire.items.item-search-bar')->extends('layouts.app');
    }
}
