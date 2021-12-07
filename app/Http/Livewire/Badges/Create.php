<?php

namespace App\Http\Livewire\Badges;

use App\Models\BatchNumber;
use App\Models\Item;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Create extends Component
{

    public $mode = 'new';
    public $item_id;
    public $item_name;
    public $erp_code;
    public $batch_number;
    public $expiry_date;
    public $initial_qty=0;
    public $status;
    public $barcode;

    public $selectedBadgeNumber;


    protected $listeners = ['selectedItemId','editBadgeNumber'];

    protected $rules = [
            'item_id' => 'required',
            'batch_number' => 'required|unique:batch_numbers,batch_number',
            'expiry_date' => 'required',
            'status' => 'required'
    ];



//the updateSelectedItem is a listerner , which is operating from item-component.blade.php

    public function selectedItemId($item_id)
    {
        $this->reset('batch_number', 'initial_qty', 'expiry_date','erp_code','status','item_id');
        $this->resetValidation();
        $this->mode = 'new';
        $this->item_id = $item_id;
        $this->selectedBadgeNumber = 'New';

        $item = Item::find($item_id);


        $this->item_name = $item->name;
        $this->erp_code = $item->erp_code;




    }

    public function editBadgeNumber($badgeNumberId)
    {
        $this->mode = 'edit';
        $this->selectedBadgeNumber = $badgeNumberId;
        $this->resetValidation();

        $result = BatchNumber::with('item')->find($badgeNumberId);
        // dd($result);

        $this->item_id = $result->item_id;
        $this->item_name = $result->item->name;
        $this->erp_code = $result->item->erp_code;
        $this->batch_number = $result->batch_number;
        $this->expiry_date = $result->expiry_date;
        $this->initial_qty=$result->initial_qty;
        $this->status= $result->status;

    }

    
    public function formHandleForEdit()
    {
        
        // $this->validate();

        $this->validate([
            'batch_number' =>['required', Rule::unique('batch_numbers')->ignore($this->selectedBadgeNumber)],
            'item_id' => 'required',
            'expiry_date' => 'required',
            'status' => 'required'
        ]);


        BatchNumber::where('id', $this->selectedBadgeNumber)->update([
            'item_id' => $this->item_id,
            'batch_number' => $this->batch_number,
            'expiry_date' => $this->expiry_date,
            'initial_qty' => $this->initial_qty,
            'status' => $this->status,
            'barcode' => $this->barcode
        ]);

        session()->flash('success', 'Badge Number has been updated !');
    }


    public function formHandleForNew()
    {
        $this->validate();
       
        BatchNumber::create([
            'item_id' => $this->item_id,
            'batch_number' => $this->batch_number,
            'expiry_date' => $this->expiry_date,
            'initial_qty' => $this->initial_qty,
            'status' => $this->status,
            'barcode' => $this->barcode
        ]);

        session()->flash('success', 'New Badge Number Added !!!');

        // return redirect()->route('items.show', ['item' => $this->item_id]);

    }

    public function render()
    {
        return view('livewire.badges.create');
    }
}
