<div class="card position-relative">

    <div class="spinner-border text-primary" role="status" wire:loading>
        <span class="visually-hidden">Loading...</span>
      </div>

    {{-- @dump($item) --}}
    <img class="card-img-top" src="{{ asset('images/medicine.jpg') }}" alt="item_cover">
    <button  class="btn btn-success position-absolute top-0 end-0">
        InStock
        <span class="badge rounded-pill bg-danger">455</span>
    </button>

    <button  class="btn btn-success position-absolute top-0" data-bs-toggle="modal" data-bs-target="#badgeModal"
        wire:click="$emit('updateSelectedItemId', {{ $item->id }})"
    >
       New Badge
        <span class="badge rounded-pill bg-danger">+</span>
    </button>

    

    <div class="card-body">
        <h4 class="card-title text-uppercase text-bold">{{  $item->name }} / <button class="btn">
            <span class="badge bg-info p-3">
                ERP CODE # {{ $item->erp_code }}
            </span>
        </button></h4>
       
        <button class="btn btn-sm btn-dark">{{ $item->category->name }}</button>
    </div>



 
    <!-- Modal -->
    <div class="modal fade" id="badgeModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @livewire('badges.create')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    




</div>
