<div class="container">

    {{-- @dump($receivings) --}}

    @component('components.alert-success')
    
    @endcomponent


    <div class="card">
        <div class="card-header">Receivings 
            <span 
                data-bs-toggle="modal" data-bs-target="#modalFormReceiving"
                wire:click="$emit('receivingModalOpen', {{ 0 }})"
            >
                <img src="{{ asset('images/icons/plus-square-fill.svg') }}">
            </span>

            <div wire:loading>
                @component('components.spinner')
                    
                @endcomponent
            </div>
        </div>

        <div class="card-body">

            <table class=" table table-responsive table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>DATE</th>
                        <th>SUPPLIER</th>
                        <th>PO</th>
                        <th>INVOICE</th>
                        <th>DELIVERY</th>
                        <th>ITEMS</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($receivings as $receiving)
                        
                   
                    <tr class= " {{ $receiving->id == $active_receiving ? 'table-active' : '' }}">
                        <a href="{{ route('receivings', ['id' =>$receiving->id]) }}">
                            <td scope="row">{{ $receiving->id }}</td>
                        </a>
                        <td>{{ $receiving->date }}</td>
                        <td>{{ $receiving->supplier_id }}</td>
                        <td>{{ $receiving->po }}</td>
                        <td>{{ $receiving->invoice_no }}</td>
                        <td>{{ $receiving->delivery_note }}</td>
                        <td><button class="btn">
                                 <span class="badge bg-info">{{ $receiving->receiving_items_count }}</span>
                        </button></td>
                        <td>
                            <a name="" id="" class="btn btn-outline-primary" href="{{ route('receiving', ['id' => $receiving->id]) }}" role="button">view</a>
                    
                            <button class="btn btn-outline-danger" 
                                data-bs-toggle="modal" data-bs-target="#modalFormReceiving"
                                wire:click="$emit('receivingModalOpen', {{ $receiving->id }})"
                            >Edit</button>
                        </td>
                    </tr>

                    @endforeach
                 
                </tbody>
            </table>
            

        </div>

        {{ $receivings->links() }}


    </div>


    <!-- Button trigger modal -->
 
    <!-- Modal -->
    <div class="modal fade" id="modalFormReceiving" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">RECEIVING</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" wire:click="$emit('receivingModalClose')"></button>
                </div>
                <div class="modal-body">
                   @livewire('forms.form-receiving')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="$emit('receivingModalClose')">Close</button>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
