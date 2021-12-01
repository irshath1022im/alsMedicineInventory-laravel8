@extends('layouts.app')

@section('title', $id)


@section('content')

@if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                <strong>{{ session('success') }}</strong>
            </div>
            
        @endif

    @livewire('items.show', ['item_id' => $id])

@endsection
