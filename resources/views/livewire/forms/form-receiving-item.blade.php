<div>

    @component('components.alert-success', ['message' => session('success')])
        
    @endcomponent

    <div wire:loading>
        @component('components.spinner')
            
        @endcomponent
    </div>

    <form wire:loading.remove>

        <div class="row">
            <div class="col mb-3">
            <label for="" class="form-label">Items</label>
            <input type="text" name="item" id="" class="form-control" 
                placeholder="Item Name"
                wire:model.defer= 'item_id'
            >

            @error('item_id')
                
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
            </div>

            <div class="col mb-3">
            <label for="" class="form-label">Badge Number</label>
            <select class="form-control" name="batch_number_id" id=""
                wire:model.defer="batch_number_id"
            >
                <option value="">Select</option>
                @foreach ($batch_numbers as $batch_number)
                <option value="{{ $batch_number['id'] }}">{{ $batch_number['batch_number'] }}</option>
                @endforeach
                
            </select>
            @error('batch_number_id')
                
                <strong class="text-danger">{{ $message }}</strong>
            @enderror
            </div>

        </div>

        <div class="row">
                <div class="col mb-3">
                  <label for="" class="form-label">Qty</label>
                  <input type="number"
                    class="form-control" name="qty" id="" placeholder=""
                    wire:model.defer="qty"
                    >
                    @error('qty')
                
                        <strong class="text-danger">{{ $message }}</strong>
                    @enderror
                </div>

                <div class="col mb-3">
                    <label for="" class="form-label">U Price</label>
                    <input type="number"
                    class="form-control" name="unit_price" id="" placeholder="Unit Price"
                    wire:model.defer="unit_price"
                    >
                    @error('unit_price')
                
                        <strong class="text-danger">{{ $message }}</strong>
                     @enderror
                </div>

                <div class="col mb-3">
                    <label for="" class="form-label">Cost</label>
                    <input type="number"
                        class="form-control" name="cost" id=""  placeholder="Cost"
                        wire:model.defer="cost"
                        
                    >
                    @error('cost')
                
                    <strong  class="text-danger">{{ $message }}</strong>
                 @enderror
                </div>

                <div class="col mb-3">
                    <label for="" class="form-label">Expiry Date</label>
                    <input type="date"
                    class="form-control" name="expiry_date" id="" 
                        wire:model.defer="expiry_date"
                    >
                    @error('expiry_date')
                
                    <strong class="text-danger">{{ $message }}</strong>
                    @enderror

                </div>


        <div class="row">
            <div class="mb-3">
              <label for="" class="form-label">Remark</label>
              <textarea class="form-control" name="remark" id="" rows="3"
                wire:model.defer="remark"
              ></textarea>
            </div>
        </div>

        <button type="button" class="btn btn-primary" 
            wire:click="NewReceivingItemFormHandle"
        >Submit</button>



    </form>
</div>
