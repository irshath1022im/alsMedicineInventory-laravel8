<div class="card">

    @component('components.alert-success')
        
    @endcomponent

    <h4 class="card-header">Badge # - {{ $selectedBadgeNumber }}
        <div class="spinner-border text-primary" role="status" wire:loading>
            <span class="visually-hidden">Loading...</span>
          </div>
    </h4>
    <div class="card-body">
        <form>
            @csrf


           
            <div class="mb-3">
                <label for="" class="form-label">Item Name</label>

                <div class="d-flex">
                    <input type="text" class="form-control" disabled name="item_name" placeholder="{{ $item_name }}"  >
                     <input type="text" class="form-control"  disabled name="item_id" placeholder="{{ $erp_code }}"  >
                
                </div>
                @error('item_id')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror

            </div>

            <div class="row">


                <div class="col-md-6 mb-3">
                  <label for="" class="form-label">Badge No</label>
                  <input type="text"
                    class="form-control" name="batch_number" id="" aria-describedby="helpId" placeholder=""
                        wire:model.defer="batch_number"
                        value="{{ old('batch_number') }}"
                     
                       
                    >
                    
                  
                    @error('batch_number')
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>
                    @enderror
    
                </div>

                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Initial Qty</label>
                    <input type="number"
                      class="form-control" name="initial_qty" id="" aria-describedby="helpId" placeholder=""
                      value="{{ old('initial_qty') }}"
                      wire:model.defer="initial_qty"
                      >
                  </div>
    
            </div>


            <div class="row">

                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Expiry Date</label>
                    <input type="date"
                    class="form-control" name="expiry_date" id="" aria-describedby="helpId" placeholder=""
                        value="{{ old('expiry_date') }}"
                        wire:model.defer="expiry_date"
                    >
                    
                    @error('expiry_date')
                    <div class="alert alert-danger">
                        {{ $message }}
                        </div>
                    @enderror

                </div>

                <div class="col-md-6 mb-3">
                    <label for="" class="form-label">Status</label>
                    <select class="form-control" name="status" id="" wire:model.defer="status">
                      <option value="">Select</option>
                      <option value="active">Active</option>
                      <option value="closed">Closed</option>
                      <option value="stored">Stored</option>
                    </select>

                    @error('status')
                    <div class="alert alert-danger">
                      {{ $message }}
                  </div>
                    @enderror
                  </div>
    
    
               

            </div>

           
              <div class="mb-3">
                <label for="" class="form-label">BarCode</label>
                <input type="text"
                  class="form-control" name="barcode" id="" aria-describedby="helpId" placeholder=""
                  value="{{ old('barcode') }}"
                  wire:model.defer="barcode"
                  >
               
              </div>

            

              
              @switch($mode)
                  @case('new')
                  <button type="button" class="btn btn-dark" wire:click="formHandleForNew">ADD</button>
                      @break
                  @case('edit')
                  <button type="button" class="btn btn-dark" 
                    wire:click="formHandleForEdit"
                    >Update</button>
                      @break
                  @default
                      
              @endswitch
          
            

        </form>

    </div>
</div>