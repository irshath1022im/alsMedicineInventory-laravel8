<?php

namespace App\Http\Livewire\Forms;

use App\Models\ReceivingItem;
use Livewire\Component;

class FormReceivingItem extends Component
{

    public $receiving_id;
    public $item_id;
    public $batch_number_id;
    public $qty=0;
    public $unit_price=0;
    public $cost;
    public $expiry_date;
    public $remark;
    public $batch_numbers=[
        ['id' => 1, 'batch_number' => 45789],
        ['id' => 2, 'batch_number' => 23658]
    ];

    protected $listeners = ['openAddReceivingItemModal'];


    protected $rules = [
        'item_id' => 'required',
        'batch_number_id' => 'required',
        'qty'=> 'required',
        'unit_price' => 'required',
        'cost' => 'required',
        'remark' => 'required',
        'expiry_date' => 'required',
        'remark' => ''
    ];

    public function openAddReceivingItemModal($id)
    {
        $this->receiving_id = $id;
        $this->resetValidation();
    }

    public function NewReceivingItemFormHandle()
    {

        $this->validate();

        $data  = [
            'receiving_id' => $this->receiving_id,
            'item_id' => $this->item_id,
            'batch_number_id' => $this->batch_number_id,
            'qty' => $this->qty,
            'unit_price' => $this->unit_price,
            'cost' => $this->cost,
            'expiry_date' => $this->expiry_date

        ];

        $result = ReceivingItem::create($data);


        if($result) {
            $this->reset();
            $this->resetValidation();
            session()->flash('success', 'New Receiving Item has been added !');

        }




    }

   

    public function render()
    {
        return view('livewire.forms.form-receiving-item');
    }
}
