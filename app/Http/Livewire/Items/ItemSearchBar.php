<?php

namespace App\Http\Livewire\Items;

use App\Models\Item;
use Livewire\Component;

class ItemSearchBar extends Component
{


    public $searchValue;
    public $searchResult;



   
    public function updatedSearchValue()
    {
       
        
        if(!empty($this->searchValue)) {
            
                    $this->searchResult = Item::
                                when($this->searchValue, function($query){
                                        return $query
                                                ->where('name', 'like', $this->searchValue.  '%')
                                                ->orWhere('erp_code', 'like', $this->searchValue. '%');
                                            })
                            ->take(3)
                            ->get();

        }else {
             $this->searchResult=[];
             $this->emit('resetSearchValue', $this->searchValue); //when there is empty value, do something with this
        }


    }

  

    public function render()
    {
     
        return view('livewire.items.item-search-bar')->extends('layouts.app');
    }
}
