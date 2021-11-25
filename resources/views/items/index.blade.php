
@extends('layouts.app')

{{-- @section('title', 'ITEMS') --}}

@section('content')

{{-- @dump($items) --}}
  @livewire('items.index')

@endsection
