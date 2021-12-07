@extends('layouts.app')

@section('title', $id)


@section('content')

    @component('components.alert-success')               
    @endcomponent

    @livewire('items.show', ['item_id' => $id])

@endsection
