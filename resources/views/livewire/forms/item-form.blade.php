        <div class="card">

          
          
                    @component('components.alert-success')
                        
                    @endcomponent
                
                

                <h4 class="card-header">NEW ITEM</h4>

                <div class="card-body">

                    <div class="spinner-border text-primary" role="status" wire:loading wire:target="save, itemUpdate">
                        <span class="visually-hidden">Loading...</span>
                      </div>



                    <form wire:loading.remove>

                        @csrf
                        
                        <div class="mb-3">
                            <label for="" class="form-label">Item Name</label>
                            <input type="text" name="item_name"
                                class="form-control @error('item_name') is-invalid @enderror" 
                                placeholder="Item Name" aria-describedby="item_name"
                                wire:model.defer="item_name"
                            >

                        @error('item_name')
                            <span id="item_name" class="invalid-feedback">{{  $message }}</span>
                        @enderror

                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">ERP CODE</label>
                            <input type="text" name="erp_code" id="" 
                                class="form-control @error('erp_code') is-invalid @enderror" 
                                placeholder="ERP CODE" aria-describedby="helpId"
                                wire:model.defer="erp_code"
                                >
                            
                                @error('erp_code')
                                    <span id="helpId" class="invalid-feedback">{{  $message }}</span>
                                @enderror
                        </div>

                        <div class="mb-3">
                              <label for="" class="form-label">Category</label>
                              <select class="form-control" name="category_id" id="" wire:model.defer="category_id">
                                <option value="">Select</option>

                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        
                                    >{{ $category->name }}</option>
                                    
                                @endforeach

                              </select>

                              @error('category_id')              
                                <small id="helpId" class="text-danger">{{  $message }}</small>
                              @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <label for="" class="form-label">Thumbnail</label>
                                <input type="file" name="thumbnail" id="" class="form-control"  aria-describedby="helpId"
                                    wire:model.defer="thumbnail"
                                >
                            <small id="helpId" class="text-muted">Help text</small>
                        </div> --}}

                        <div class="mb-3">
                          <label for="" class="form-label">Remark</label>
                          <input class="form-control" name="remark" id="" 
                            wire:model.defer="remark"
                          />
                        </div>

                        @isset($editItemId)
                                <button type="button" class="btn btn-dark" wire:click="itemUpdate">UPDATE</button>
                            
                                @else 

                                <button type="button" class="btn btn-dark" wire:click="save">SAVE</button>
                        @endisset





                    </form>



                </div>





</p>  
