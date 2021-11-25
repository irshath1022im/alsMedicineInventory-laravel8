<div class="container">


    {{-- @dump($items) --}}
    {{-- @dump($searchValue) --}}



    <div class="card">
        <h4 class="card-header">ITEMS
            <div class="spinner-border text-primary" role="status" wire:loading>
                <span class="visually-hidden">Loading...</span>
              </div>

        </h4>
        <div class="card-body">

            @livewire('items.item-search-bar')


            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ERP-CODE</th>
                        <th>ITEM NAME</th>
                        <th>BADGES</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $item)

                    <tr>
                        <td scope="row">{{  $item->id }}</td>
                        <td>{{ $item->erp_code}}</td>
                        <td>{{ $item->name}}</td>
                        <td><button class="btn"
                            @if ($item->batch_numbers_count > 0)

                                wire:click.prevent="$emit('showModal', {{  $item}})"

                            @endif
                            >
                            <span class="badge bg-info">{{ $item->batch_numbers_count }}</span>
                        </button></td>
                        <td>
                            <button class="btn btn-sm btn-outline-secondary">View</button>
                            <button class="btn btn-sm btn-outline-primary">Edit</button>
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>

            {{  $items->links() }}

            @livewire('badges')


        </div>
    </div>



</div>
