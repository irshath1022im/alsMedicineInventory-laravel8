<div class="card position-relative">

    <div class="spinner-border text-primary" role="status" wire:loading>
        <span class="visually-hidden">Loading...</span>
    </div>

    {{-- @dump($item) --}}
    <img class="card-img-top" src="{{ asset('images/medicine.jpg') }}" alt="item_cover">
    <button  class="btn btn-success position-absolute top-0 end-0">
        {{ $item->category->name }}
    </button>

    

    <div class="card-body">
        <h4 class="card-title text-uppercase text-bold">{{  $item->name }} / <button class="btn">
            <span class="badge bg-info p-3">
                ERP CODE # {{ $item->erp_code }}
            </span>
        </button></h4>
       

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modelId">
          Edit Picture
        </button>
        
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Item Picture</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        @livewire('forms.form-item-image-upload', ['item_id' => $item->id])
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>



 
</div>
