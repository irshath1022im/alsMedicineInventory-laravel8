<div class="container">


    @isset($receiving)

 
        <div class="card">
            <div class="card-header">
                <h5 class="h5">Receiving : {{ $receiving_id }}</h5>
            </div>

            <div class="card-body">
                <div class="row mb-2">
                    <div class="col-sm col-md">{{ $receiving->date }}</div>
                    <div class="col-sm col-md">{{ $receiving->supplier->name }}</div>
                    <div class="col-sm col-md">PO# {{ $receiving->po }}</div>
                    <div class="col-sm col-md">Invoice # {{ $receiving->invoice_no }}</div>
                    <div class="col-sm col-md">Delivery Note: {{ $receiving->delivery_note }}</div>
                    <div class="col-sm col-md" >Items
                        <button class="btn" wire:loading.remove>
                            <span class="badge bg-primary">{{ $receiving->receiving_items_count }}</span>
                        </button>

                        <div wire:loading>
                            @component('components.spinner')
                                
                            @endcomponent
                        </div>
                    </div>
                </div>
                

            @livewire('receiving-items.receiving-items-table', [
                    'receiving_id' => $receiving_id,
                    'receiving_items_count' => $receiving->receiving_items_count
                    ])



            </div> 


        </div>
    

    @else

        <div class="alert alert-danger">
            <strong>Sorry!, No Receiving Found</strong>
        </div>

    

    @endisset


</div>
