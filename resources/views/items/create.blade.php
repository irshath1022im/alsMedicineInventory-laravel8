@extends('layouts.app')

@section('content')
    <section class="container">

        {{-- @dump(session()->has('success')) --}}
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
            
        @endif

            <div class="card">
                <h4 class="card-header">NEW ITEM</h4>

                <div class="card-body">

                    <form method="POST" action="{{  route('items.store') }}">
                        @csrf
                        
                        <div class="mb-3">
                        <label for="" class="form-label">Item Name</label>
                        <input type="text" name="name" id="" 
                            class="form-control @error('name') is-invalid @enderror" 
                            placeholder="Item Name" aria-describedby="helpId"
                            value="{{ old('name') }}"
                        >

                        @error('name')
                            <small id="helpId" class="text-danger">{{  $message }}</small>
                        @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">ERP CODE</label>
                            <input type="text" name="erp_code" id="" 
                                class="form-control @error('erp_code') is-invalid @enderror" 
                                placeholder="ERP CODE" aria-describedby="helpId"
                                value="{{ old('erp_code') }}"
                                >
                            
                                @error('erp_code')
                                    <span id="helpId" class="invalid-feedback">{{  $message }}</span>
                                @enderror
                        </div>

                        <div class="mb-3">
                              <label for="" class="form-label">Category</label>
                              <select class="form-control" name="category_id" id="" selected="{{ old('category_id') }}">
                                <option value="">Select</option>

                                @foreach ($categories as $item)
                                <option value="{{ $item->id }}"
                                        {{ old('category') }}    
                                >{{ $item->name }}</option>
                                    
                                @endforeach

                              </select>

                              @error('category_id')              
                                <small id="helpId" class="text-danger">{{  $message }}</small>
                              @enderror
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Thumbnail</label>
                            <input type="file" name="thumbnail" id="" class="form-control" placeholder="ERP CODE" aria-describedby="helpId">
                            <small id="helpId" class="text-muted">Help text</small>
                        </div>

                        <div class="mb-3">
                          <label for="" class="form-label">Remark</label>
                          <input class="form-control" name="remark" id="" 
                            value="{{ old('remark') }}"
                          />
                        </div>

                        <button type="submit" class="btn btn-dark">Submit</button>

                
                    </form>



                </div>





            </div>        
    </section>

@endsection