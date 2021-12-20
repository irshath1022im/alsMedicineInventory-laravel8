<div class="mb-3">
    <input type="text"
      class="form-control border border-success" placeholder="Search"
          wire:model.debounce.500ms="searchValue"
      >

      {{-- @dump($selectedItemId) --}}

      <div wire:loading>
        @component('components.spinner')
            
        @endcomponent
      </div>


      @empty(!$searchResult)

                <div>
                    <ul class="list-group">

                            @foreach ($searchResult as $item)
                                    <li class="list-group-item">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" 
                                            wire:click="$emit('sendSelectedItem', {{ $item->id }})">
                                            <label class="form-check-label" for="flexRadioDefault1">
                                            {{ $item->name }}
                                            </label>
                                        </div> 
                                    </li>
                            @endforeach

                    </ul>
                </div>

        @endempty
</div>
