<div class="container">


    @isset($receiving)

 
        <div class="card">
            <div class="card-header"><h5 class="h5">Receiving : {{ $receiving_id }}</h5></div>

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm col-md">{{ $receiving->date }}</div>
                    <div class="col-sm col-md">{{ $receiving->supplier->name }}</div>
                    <div class="col-sm col-md">PO# {{ $receiving->po }}</div>
                    <div class="col-sm col-md">Invoice # {{ $receiving->invoice_no }}</div>
                    <div class="col-sm col-md">Delivery Note: {{ $receiving->delivery_note }}</div>
                    <div class="col-sm col-md" >Items
                        <button class="btn">
                            <span class="badge bg-primary">{{ $receiving->receiving_items_count }}</span>
                        </button>
                    </div>
                </div>

                @if ($receiving->receiving_items_count > 0)
                    
                            @livewire('receiving-items.receiving-items-table', ['receiving_id' => $receiving_id])

                    @else

                    <div class="alert alert-danger">
                        <strong>Sorry!, No Receiving Items are Found</strong>
                    </div>

                   
                    
                @endif


                {{-- data-bs-toggle="modal" data-bs-target="#modalFormReceiving"
                    wire:click="$emit('receivingModalOpen', {{ 0 }})" --}}
                
                    <img src="{{ asset('images/icons/plus-square-fill.svg') }}" 
                        wire:click="$emit('openAddReceivingItemModal', {{ $receiving_id }})"  
                        data-bs-toggle="modal" data-bs-target="#receivingItemsModal"
                    >
                
    



            </div> 


        </div>
    

    @else

        <div class="alert alert-danger">
            <strong>Sorry!, No Receiving Found</strong>
        </div>

    

    @endisset





<!-- Modal -->
<div class="modal fade" id="receivingItemsModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">RECEIVING ITEMS</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" ></button>
            </div>
            <div class="modal-body">
                @livewire('forms.form-receiving-item')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" >Close</button>
            </div>
        </div>
    </div>
</div>







</div>
