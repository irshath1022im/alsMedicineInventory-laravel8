<?php

namespace App\Http\Livewire\Badges;

use App\Models\BatchNumber;
use App\Models\Item;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Create extends Component
{

    public $item_id;
    public $item_name;
    public $batch_number;
    public $expiry_date;
    public $initial_qty=0;
    public $barcode;


    protected $listeners = ['updateSelectedItemId'];

    protected $rules = [
            'item_id' => 'required',
            'batch_number' => 'required|unique:batch_numbers,batch_number',
            'expiry_date' => 'required',
    ];



//the updateSelectedItem is a listerner , which is operating from item-component.blade.php

    public function updateSelectedItemId($item_id)
    {

        $this->item_id = $item_id;
        $item = Item::where('id', $this->item_id)
                     ->get();


        $this->item_name = $item[0]['name'];



    }

    public function formHandle()
    {
        $this->validate();

        BatchNumber::create([
            'item_id' => $this->item_id,
            'batch_number' => $this->batch_number,
            'expiry_date' => $this->expiry_date,
            'initial_qty' => $this->initial_qty,
            'barcode' => $this->barcode
        ]);

        session()->flash('success', 'New Badge Number Added !!!');

        return redirect()->route('items.show', ['item' => $this->item_id]);

    }

    public function render()
    {
        return view('livewire.badges.create');
    }
}
