<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;

class FormItemImageUpload extends Component
{

    public $item_id;

    public function render()
    {
        return view('livewire.forms.form-item-image-upload');
    }
}
