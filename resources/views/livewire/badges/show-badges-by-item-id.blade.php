<div>
    {{-- @dump($badge_numbers) --}}
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>BADGE#</th>
                <th>INITIAL QTY</th>
                <th>RECEIVING</th>
                <th>CONSUMPTONS</th>
                <th>STOCK</th>
                <th>EXPIRY DATE</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($badge_numbers as $item)
            <tr>
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->batch_number }}</td>
                <td>{{ $item->initial_qty }}</td>
                <td>{{ $item->receiving_items->sum('qty') }}</td>
                <td>{{ $item->consumptions->sum('qty') }}</td>
                <td>{{ ( $item->initial_qty + $item->receiving_items->sum('qty') ) -  $item->consumptions->sum('qty') }}</td>
                <td>{{ $item->expiry_date }}</td>
                <td>{{ $item->expiry_date }}</td>
                <td class="d-flex justify-content-between">
                    <button class="btn btn-sm btn-outline-danger">Edit</button>
                    <button class="btn btn-sm btn-outline-danger">Delete</button>
                </td>
            </tr>
                
            @endforeach
        </tbody>
    </table>

   

    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#badgeModal" wire:click="$emit('updateSelectedItemId', {{ $item_id }})"   class="bg-primary">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
      </svg>
    
    {{ $badge_numbers->links() }}

    <!-- Modal for create new badge-->
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
