@extends('layouts.app')

@section('content')


    <section class="container">
        <div class="card">
            <h4 class="card-header">New Badge </h4>
            <div class="card-body">
                <form method="POST" action="{{ route('badges.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Item Name</label>
                        <select class="form-control" name="item_id" id="">
                          <option value="">Select</option>
                          <option></option>
                          <option></option>
                        </select>

                        {{-- @error('item_id')
                            @component('components.alert', ['message' => $message])
                                
                            @endcomponent
                        @enderror --}}

                    </div>

                    <div class="mb-3">
                      <label for="" class="form-label">Badge No</label>
                      <input type="text"
                        class="form-control" name="batch_number" id="" aria-describedby="helpId" placeholder=""
                            value="{{ old('batch_number') }}"
                        >
                      
                        @error('batch_number')
                         @component('components.alert', ['message' => $message])
                            
                        @endcomponent
                    @enderror


                    </div>

                    <div class="mb-3">
                        <label for="" class="form-label">Expiry Date</label>
                        <input type="date"
                          class="form-control" name="expiry_date" id="" aria-describedby="helpId" placeholder=""
                        value="{{ old('expiry_date') }}"
                          >
                        
                          @error('expiry_date')
                              @component('components.alert', ['message' => $message])
                                  
                              @endcomponent
                          @enderror

                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">Initial Qty</label>
                        <input type="number"
                          class="form-control" name="initial_qty" id="" aria-describedby="helpId" placeholder=""
                          value="{{ old('initial_qty') }}"
                          >
                        

                      </div>

                      <div class="mb-3">
                        <label for="" class="form-label">BarCode</label>
                        <input type="text"
                          class="form-control" name="barcode" id="" aria-describedby="helpId" placeholder=""
                          value="{{ old('barcode') }}"
                          >
                       
                      </div>

                      <button type="submit" class="btn btn-dark">Submit</button>

                </form>

            </div>
        </div>
    </section>
    
@endsection