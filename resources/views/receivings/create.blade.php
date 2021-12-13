@extends('layouts.app')

@section('title', 'New Receiving')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h5>New Receiving</h5>
            </div>
            <div class="card-body">
                @livewire('forms.form-receiving')
            </div>
        </div>
    </div>

@endsection