<div>

    <div class="spinner-border text-primary" role="status" wire:loading>
        <span class="visually-hidden">Loading...</span>
      </div>

    @if ($receiving_items->count() > 0)

            <div class="card " >
                <div class="card-header">ITEMS</div>
                <div class="card-body">

                    <table class="table" wire:loading.remove>
                        <thead>
                        
                            <tr>
                                <th>#</th>
                                <th>ERP CODE</th>
                                <th>NAME</th>
                                <th>BADGE #</th>
                                <th>QTY</th>
                                <th>U.PRICE</th>
                                <th>TOTAL</th>
                                <th>EXPIRY DATE</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($receiving_items as $key=>$item)
                                
                                <tr>
                                
                                    <td scope="row">{{ $key+1 }}</td>
                                    <td>{{ $item->item->erp_code }}</td>
                                    <td>{{ $item->item->name }}</td>
                                    <td>{{ $item->batch_number->batch_number }}</td>
                                    <td>{{ $item->qty }}</td>
                                    <td>{{ $item->unit_price }}</td>
                                    <td>{{ $item->cost }}</td>
                                    <td>{{ $item->batch_number->expiry_date }}</td>
                                    <td><button class="btn btn-sm btn-outline-primary"
                                        wire:click="$emit('openEditReceivingItemModal', {{ $item->id }} )" 
                                        data-bs-toggle="modal" data-bs-target="#receivingItemsModal"
                                        >Edit</button>
                                        
                                        <button class="btn btn-sm btn-outline-danger"
                                            data-bs-toggle="modal" data-bs-target="#deleteReceivingItemsModal"
                                        >Delete</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


     @else
            <div class="alert alert-danger">
                <strong>Sorry!, No Receiving Items are Found</strong>
            </div>
    
    @endif

    <img src="{{ asset('images/icons/plus-square-fill.svg') }}" 
        wire:click="$emit('openAddReceivingItemModal', {{ $receiving_id }})"  
        data-bs-toggle="modal" data-bs-target="#receivingItemsModal"
    >


    <!-- Modal -->
    <div class="modal fade" id="receivingItemsModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true"  >
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">RECEIVING ITEMS</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="$emit('refreshReceivingItem')" ></button>
                </div>
                <div class="modal-body">
                    @livewire('forms.form-receiving-item')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="$emit('refreshReceivingItem')" >Close</button>
                </div>
            </div>
        </div>
    </div>

    
    

            
</div>
