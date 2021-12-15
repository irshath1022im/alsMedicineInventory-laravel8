<?php

namespace App\Http\Livewire\Forms;

use App\Models\BatchNumber;
use App\Models\Item;
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
    public $batch_numbers=[];
    public $batch_numbers2;

    public $searchValue;
    public $searchResult;
    public $selectedItemId;
    public $selectedItemName;

    protected $listeners = [
        'openAddReceivingItemModal', 
        'sendSelectedItem' => 'receiveSelectedItemFromSearchBar'
    ];


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
            $this->resetExcept('receiving_id');
            $this->resetValidation();
            $this->emit('refreshReceivingItem');
            session()->flash('success', 'New Receiving Item has been added !');

        }




    }

    
   
    public function updatedSearchValue()
    {
        // $this->emit('updateSearchValue', $this->searchValue);
        
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
        }


    }


    public function itemIdUpdate($item)
    {
        $this->item_id = $item['id'];
        $this->batch_numbers = BatchNumber::where('item_id', $this->item_id)->get();
        $this->searchValue = $item['name'];
        $this->searchResult = [];
    }


    // public function updatedItemId()
    // {
        
    // }

    public function render()
    {
        return view('livewire.forms.form-receiving-item');
    }
}
