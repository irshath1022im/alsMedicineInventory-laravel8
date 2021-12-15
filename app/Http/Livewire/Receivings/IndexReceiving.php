<?php

namespace App\Http\Livewire\Receivings;

use App\Models\Receiving;
use Livewire\Component;
use Livewire\WithPagination;

class IndexReceiving extends Component
{

    public $active_receiving=0;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = ['receivingSuccess'];

    public function receivingSuccess($receiving_id)
    {
        $this->active_receiving = $receiving_id;
    }


    public function render()
    {

        $result = Receiving::withCount('receiving_items')->with('supplier')->paginate(10);

        return view('livewire.receivings.index-receiving',['receivings' => $result])
                    ->extends('layouts.app');
    }
}
