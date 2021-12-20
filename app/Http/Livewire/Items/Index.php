<?php

namespace App\Http\Livewire\Items;

use App\Models\Item;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{

    public $itemsddd=[];
    public $searchValue;
    public $selectedBatchNumber;

    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
            'sendSelectedItem' => 'searchValueUpdate', // listen to emit function from item-search-bar
            'resetSearchValue'
        ]; 

    public function searchValueUpdate($searchValue)
    {
        $this->resetPage();
        $this->searchValue = $searchValue;
    }

    public function resetSearchValue($searchValue)
    {
        $this->resetPage();
        $this->searchValue = $searchValue;
    }

   

    public function updatedSelectedBatchNumber ()
    {
        $this->emit('selectedBatchNumber', $this->selectedBatchNumber);
    }

    public function badgeModal($selectedBatchNumber)
    {
        // $this->dispatchBrowserEvent('openBadgesModal');
        // $this->emit('selectedBatchNumber', $selectedBatchNumber);
        $this->selectedBatchNumber = $selectedBatchNumber;

    }

    // public function showBootstrapModal()
    // {
    //     $this->dispatchBrowserEvent('openModal');
       
    // }



    public function render()
    {
        $result = Item::withCount('batch_numbers')
                ->when($this->searchValue, function($query){
                    return $query
                            ->where('id', $this->searchValue)
                            ;
                })
                ->paginate(10)
              ;
        return view('livewire.items.index', ['items' => $result]);
    }

}
