<div>
    {{-- @dump($item_id) --}}
    <div class="alert alert-info" role="alert" wire:loading>
        <strong>Requesting...</strong>
    </div>
    

    @if (count($consumptions) > 0)
        
    
    <table class="table" wire:loading.remove>
        <thead>
            <tr>
                <th>#</th>
                <th>DATE</th>
                <th>BADGE N#</th>
                <th>LOCATION</th>
                <th>QTY</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($consumptions as $consumption)
                
            <tr>
                <td scope="row">{{ $consumption->id }}</td>
                <td scope="row">{{ $consumption->date }}</td>
                <td>{{ $consumption->batch_number->batch_number }}</td>
                <td>{{ $consumption->location->location }}</td>
                <td>{{ $consumption->qty }}</td>
                <td><button class="btn btn-sm bg-info">More</button></td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    {{ $consumptions->links() }}

    @else

    <div class="alert alert-warning" role="alert">
        <strong>No Consumptions found!</strong>
    </div>
    
        
    @endif
</div>
