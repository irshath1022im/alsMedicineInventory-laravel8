<div>
    @component('components.alert-success')
    @endcomponent

    <div wire:loading>
        @component('components.spinner')
            
        @endcomponent
    </div>

    
    <form wire:loading.remove>
        <div class="row">

            <div class="col-sm col-md-6" >
                <input type="date" class="form-control" wire:model.defer="date" />

                @error('date')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>



            <div class="col-sm col-md-6 mb-3">
                  <select class="form-control" name="Supplier" wire:model.defer="supplier_id">
                    <option value="">Supllier</option>
                    <option value="1">Supplier-1</option>
                    <option value="2">Supplier-2</option>
                  </select>

                  @error('supplier_id')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                 @enderror

            </div>

        </div>

        <div class="row mb-3" >
            <div class="col-sm col-md">
                <input type="text" placeholder="PO" class="form-control" wire:model.defer="po"/>

                @error('po')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="col-sm col-md">
                <input type="text" placeholder="Invoice #" class="form-control" wire:model.defer="invoice_no">

                @error('invoice_no')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
            @enderror
            </div>

            <div class="col-sm col-md">
                <input type="text" placeholder="Delivery Note" class="form-control" wire:model.defer="delivery_note" />

                @error('delivery_note')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

       
        <div class="row mb-3">
            <div class="col">
                <input type="text" placeholder="Remark" class="form-control" wire:model.defer="remark" />
            </div>
        </div>

        @if ($mode == 'create')
            
        <button class="btn btn-primary " type="button" wire:click="formHandleAdd">ADD</button>
        @else
            
        <button class="btn btn-primary " type="button" wire:click="formHandleUpdate">UPDATE</button>
        @endif



    </form>
</div>
