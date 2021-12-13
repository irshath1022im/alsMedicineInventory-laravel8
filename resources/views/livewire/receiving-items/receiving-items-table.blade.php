<div>

    {{-- @dump($readyToLoad) --}}
    <div class="spinner-border text-primary" role="status" wire:loading>
        <span class="visually-hidden">Loading...</span>
      </div>

    <div class="card " >
        <div class="card-header">ITEMS</div>
        <div class="card-body">

            <table class="table" wire:init="loadReceivingItems" wire:loading.remove>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

            
</div>
