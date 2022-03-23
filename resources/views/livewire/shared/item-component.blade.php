<div class="card position-relative">

    <div class="spinner-border text-primary" role="status" wire:loading>
        <span class="visually-hidden">Loading...</span>
      </div>

    {{-- @dump($item) --}}
    <img class="card-img-top" src="{{ asset('images/medicine.jpg') }}" alt="item_cover">
    {{-- <button  class="btn btn-success position-absolute top-0 end-0">
        InStock
        <span class="badge rounded-pill bg-danger">455</span>
    </button> --}}

    

    <div class="card-body">
        <h4 class="card-title text-uppercase text-bold">{{  $item->name }} / <button class="btn">
            <span class="badge bg-info p-3">
                ERP CODE # {{ $item->erp_code }}
            </span>
        </button></h4>
       
        <button class="btn btn-sm btn-dark">{{ $item->category->name }}</button>
    </div>



 
</div>
