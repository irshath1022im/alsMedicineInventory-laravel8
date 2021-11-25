<div>
  <!-- Modal -->
  {{-- @dump($data) --}}


<div class="modal fade @if($show === true) show @endif"
            tabindex="-1"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
            style="display: @if($show === true)
                 block
                    @else
                            none
                    @endif;"
            wire:iqnore.self
    >
    <div class="modal-dialog  modal-lg">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="h5">{{  $selectedItemName }}

                <div class="spinner-border" role="status" wire:loading>
                    <span class="visually-hidden">Loading...</span>
                  </div>

                </h5>
          <button type="button"
            wire:click.prevent="doClose()"
          class="btn-close" aria-label="Close"></button>
        </div>
        <div class="modal-body">


            {{-- {{  $selectedBatchNumber }} --}}
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>BADGE #</th>
                        <th>Initial Qty</th>
                        <th>Total Receivings</th>
                        <th>Total Consumptions</th>
                        <th>In Stock</th>
                        <th>EXPIRY</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $item)
                    <tr>
                        <td scope="row">{{  $item->id }}</td>
                        <td>{{  $item->batch_number }}</td>
                        <td>{{  $item->initial_qty }}</td>
                        <td>{{  $item->receiving_items->sum('qty') }}</td>
                        <td>{{  $item->consumptions->sum('qty') }}</td>
                        <td>{{  $item->initial_qty + $item->receiving_items->sum('qty') - $item->consumptions->sum('qty') }}</td>
                        <td>{{  $item->expiry_date }}</td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"
                wire:click.prevent="doClose()"
          >Close</button>
        </div>
      </div>
    </div>
  </div>



</div>
