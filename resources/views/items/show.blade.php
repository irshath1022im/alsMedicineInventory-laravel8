@extends('layouts.app')

@section('title', $id)


@section('content')

    @livewire('items.show', ['item_id' => $id])

@endsection
