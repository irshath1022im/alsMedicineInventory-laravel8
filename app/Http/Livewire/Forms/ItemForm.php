<?php

namespace App\Http\Livewire\Forms;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Validation\Rule;
use Livewire\Component;
use PhpParser\Node\Stmt\TryCatch;

class ItemForm extends Component
{

    public $categories =[];
    public $item_name;
    public $category_id;
    public $erp_code;
    public $remark;
    public $thumbnail;
    public $editItemId;
    public $editItem;

    protected $rules = [
             'item_name' => "required|unique:items,name",
             'thumbnail'=>'',
             'category_id' => 'required',
             'erp_code' => 'required|unique:items,erp_code',
             'remark' =>''

    ];


    public function formReset()
    {
        $this->reset(['item_name', 'category_id','erp_code']);
    }


    public function save()
    {
        $this->resetErrorBag();
        
        $this->validate();

        $validatedData = [
            'name' => $this->item_name,
            // 'category_id' => $this->category_id,
            'erp_code' => $this->erp_code
        ];
       

        $result = Item::create($validatedData);

        if(!$result) {
            $this->addError('sql', 'SQL ERROR!!!');
        }

        $this->resetErrorBag();
        $this->formReset();       
        session()->flash('success', 'New Item has been created! , Item Id => '.$result->id.' ');
        return redirect()->route('items.show', ['item' => $result->id]);

    }


    public function itemUpdate()
    {

        // $this->validate();
        $this->validate([
            'item_name' => Rule::unique('items', 'name')->ignore($this->editItemId),
            'erp_code' => Rule::unique('items', 'erp_code')->ignore($this->editItemId),
        ]);

        $validatedData = [
            'name' => $this->item_name,
            'category_id' => $this->category_id,
            'erp_code' => $this->erp_code
        ];

          
        $result =Item::where('id', $this->editItemId)
                ->update($validatedData);

        if(!$result) {
            $this->addError('sql', 'SQL ERROR!!!');
        }
          
       

                // dd($result);
     
        session()->flash('success', 'Item has been updated');

        return redirect()->route('items.show', ['item'=>$this->editItemId]);
    }


    public function mount($item)
    {

        
        $this->categories= Category::get();

        if($item !== null) {
            $this->editItemId= $item->id;
            $this->item_name= $item->name;
            $this->erp_code= $item->erp_code;
            $this->category_id= $item->category_id;
            $this->remark= $item->remark;
          
        }
    }

    public function render()
    {
        return view('livewire.forms.item-form');
    }
}
