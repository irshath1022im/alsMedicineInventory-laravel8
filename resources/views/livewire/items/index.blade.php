<div class="container">


    {{-- @dump($items) --}}
    {{-- @dump($searchValue) --}}



    <div class="card">
        <h4 class="card-header">ITEMS
            {{-- <div class="spinner-border text-primary" role="status" 
            wire:loading
            >
                <span class="visually-hidden">Loading...</span>
              </div> --}}

              <a href="{{ route('items.create') }}" target="blank">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16" data-bs-toggle="modal" data-bs-target="#badgeModal" >
                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                </svg>
              </a>

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
                            <a href="{{ route('items.show', $item->id) }}">
                                <button class="btn btn-sm btn-outline-secondary">View</button>
                            </a>
                            <a href="{{  route('items.edit', ['item'=>$item->id]) }}">
                                <button class="btn btn-sm btn-outline-primary">Edit</button>
                            </a>
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
