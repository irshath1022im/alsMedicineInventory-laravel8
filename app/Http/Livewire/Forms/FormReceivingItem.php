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
    public $qty;
    public $unit_price;
    public $cost;
    public $expiry_date;
    public $remark;
    public $batch_numbers=[];

    public $searchValue;
    public $searchResult;
    public $selectedItemId;
    public $selectedItemName;

    //for edit

    public $editMode = false;
    public $receiving_item_id;

    protected $listeners = [
        'openAddReceivingItemModal',
        'openEditReceivingItemModal'
    ];


    protected $rules = [
        'item_id' => 'required',
        'batch_number_id' => 'required',
        'qty'=> 'required|gte:1',
        'unit_price' => 'required|gte:1',
        'cost' => 'required|gte:1',
        'remark' => 'required',
        'remark' => '',
    ];


    public function updatedUnitPrice()
    {
        $this->cost = $this->qty * $this->unit_price;
    }

    public function updatedQty()
    {
        $this->cost = $this->qty * $this->unit_price;
    }


    public function openAddReceivingItemModal($id)
    {
        $this->receiving_id = $id;
        $this->resetExcept('receiving_id');
        $this->resetValidation();
    }

    public function openEditReceivingItemModal($receiving_item_id)
    {
        $this->reset();
        $this->resetValidation();
        $this->editMode = true;
        $this->receiving_item_id = $receiving_item_id;

        $receiving_item = ReceivingItem::with('item')->find($receiving_item_id);

        $this->receiving_id = $receiving_item->receiving_id;
        $this->item_id = $receiving_item->item_id;

        $this->searchValue = $receiving_item->item->name;
        $this->batch_number_id =$receiving_item->batch_number_id;
        $this->qty = $receiving_item->qty;
        $this->unit_price = $receiving_item->unit_price;
        $this->cost = $receiving_item->cost;
        $this->expiry_date = $receiving_item->batch_number->expiry_date;
        $this->remark = $receiving_item->remark;

        $this->batch_numbers = BatchNumber::where('item_id', $this->item_id)->get();

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

        ];

        $result = ReceivingItem::create($data);


        if($result) {
            $this->resetExcept('receiving_id');
            $this->resetValidation();
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
            $this->batch_numbers = [];
            $this->expiry_date='';
        }


    }


    //SELECT ITEM FROM SEARCH RESULT

    public function itemIdUpdate($item)
    {
        $this->item_id = $item['id'];
        $this->batch_numbers = BatchNumber::where('item_id', $this->item_id)->get();  //THIS WILL RETURN COLLECTION
        $this->searchValue = $item['name'];
        $this->searchResult = [];
    }

    public function updatedBatchNumberId()
    {
        if($this->batch_number_id > 0 ) {
            $result = BatchNumber::find($this->batch_number_id);
            $this->expiry_date = $result->expiry_date;
        }else {
            $this->expiry_date = '';
        }
    }

    public function ReceivingItemUpdate()
    {
        $validated = $this->validate();



        $result = ReceivingItem::where('id', $this->receiving_item_id)
                                ->update($validated);

            $this->resetExcept('receiving_id');
            $this->resetValidation();
            session()->flash('success', 'New Receiving Item has been Updated !');

    }

    public function render()
    {
        return view('livewire.forms.form-receiving-item');
    }
}
