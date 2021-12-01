<div>
    {{-- @dump($badge_numbers) --}}
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>BADGE#</th>
                <th>INITIAL QTY</th>
                <th>EXPIRY DATE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($badge_numbers as $item)
            <tr>
                <td scope="row">{{ $item->id }}</td>
                <td>{{ $item->batch_number }}</td>
                <td>{{ $item->initial_qty }}</td>
                <td>{{  $item->expiry_date }}</td>
            </tr>
                
            @endforeach
        </tbody>
    </table>
    
    {{ $badge_numbers->links() }}

</div>
