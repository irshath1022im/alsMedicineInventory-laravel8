@extends('layouts.app')

@section('content')

    <section class="container">

        @isset($item)
             @livewire('forms.item-form', ['item' => $item ])
    @else
        @livewire('forms.item-form', ['item' => null ])
        @endisset
      
            
    </section>

@endsection