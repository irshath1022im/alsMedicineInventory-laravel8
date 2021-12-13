<?php

namespace App\Http\Livewire\Forms;

use App\Models\Receiving;
use Livewire\Component;

class FormReceiving extends Component
{

    public $date;
    public $supplier_id;
    public $po;
    public $delivery_note;
    public $invoice_no;
    public $remark;
    public $mode;


    public $receiving_id;

    protected $listeners = ['receivingModalClose', 'receivingModalOpen'];

    protected $rules =[
        'date' => 'required',
        'supplier_id' => 'required',
        'po' => 'required',
        'delivery_note' => 'required',
        'invoice_no' => 'required',
        'remark' => ''
    ];

    public function receivingModalOpen($receiving_id)
    {
        
        $this->receiving_id = $receiving_id;

        if($receiving_id > 0) {

            $this->mode = 'edit';
            $result = Receiving::find($receiving_id);

            $this->date = $result->date;
            $this->supplier_id = $result->supplier_id;
            $this->po = $result->po;
            $this->invoice_no = $result->invoice_no;
            $this->delivery_note = $result->delivery_note;
            $this->remark = $result->remark;

        } else {
            $this->reset();
            $this->mode = 'create';
        }

    }

    public function receivingModalClose()
    {
        $this->resetValidation();
        $this->emit('receivingSuccess', $this->receiving_id);

    }

    public function formHandleAdd()
    {
        $this->validate();


        $validatedData = $this->validate();

        $result = Receiving::create($validatedData);

        $this->reset('date', 'supplier_id', 'po', 'delivery_note', 'invoice_no','remark');

        session()->flash('success', 'Receiving has been added => ' .$result->id);

       
        // return redirect()->route('receiving',['id' => $result->id]);

    }

    public function formHandleUpdate()
    {

       $validatedData = $this->validate();
        
        Receiving::where('id', $this->receiving_id)->update($validatedData);

        session()->flash('success', 'Updated Successfully!');

       

    }

    public function mount()
    {
       
    }


    public function render()
    {
        return view('livewire.forms.form-receiving');
    }


}
