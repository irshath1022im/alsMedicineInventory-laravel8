<div>
    {{-- @dump($receivings) --}}

   
    <div class="alert alert-info" role="alert" wire:loading>
        <strong>Check it out!</strong>
    </div>
    

   @if (count($receiving_items) > 0)
       


    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Date</th>
                <th>BADGEN# #</th>
                <th>QTY</th>
                <th>EXPIRY DATE</th>
                <th>DAYS</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach ($receiving_items as $receiving_item)
                <tr>
                    <td scope="row">{{  $receiving_item->id }}</td>
                    <td>{{  $receiving_item->receiving->date }}</td>
                    <td>{{ $receiving_item->batch_number->batch_number }}</td>
                    <td>{{ $receiving_item->qty }}</td>
                    <td>{{ $receiving_item->batch_number->expiry_date }}</td>
                    <td>{{  \Carbon\Carbon::parse($receiving_item->batch_number->expiry_date)->diffForHumans()}}</td>
                    <td><button class="btn btn-sm bg-info">More</button></td>
                </tr>
            @endforeach
           
        </tbody>
    </table>

    {{ $receiving_items->links() }}
    
    @else
       
    <div class="alert alert-warning" role="alert">
        <strong>No Receivings found !</strong>
    </div>
    
    @endif
  
   

</div>
