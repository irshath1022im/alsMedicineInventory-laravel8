<?php

namespace App\Http\Livewire;

use App\Models\BatchNumber;
use Livewire\Component;

class Badges extends Component
{

    public $selectedBatchNumber;
    public $show;
    public $data = [];
    public $selectedItemName;


    protected $listeners = ['showModal' => 'showModal'];

    public function showModal($data) {

        $result = BatchNumber::where('item_id', $data['id'])
                                ->with('item', 'receiving_items', 'consumptions')
                                ->get();

        $this->selectedBatchNumber = $data['id'];
        $this->selectedItemName = $data['name'];
        $this->data = $result;

        $this->doShow();
    }

    public function mount() {
        $this->show = false;
    }

    public function doShow() {
        $this->show = true;
    }

    public function doClose() {
        $this->show = false;
    }






    public function render()
    {
        return view('livewire.badges');
    }
}
