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

    protected $listeners = ['updateSearchValue' => 'searchValueUpdate' ]; // listen to change search value changes

    public function searchValueUpdate($searchValue)
    {
        $this->searchValue = $searchValue;
    }

    public function updatedSearchValue()
    {
        $this->resetPage();
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
                            ->where('name', 'like', $this->searchValue. '%')
                            ->orWhere('erp_code', 'like', $this->searchValue. '%')
                            ;
                })
                ->paginate(10)
              ;
        return view('livewire.items.index', ['items' => $result]);
    }

}
