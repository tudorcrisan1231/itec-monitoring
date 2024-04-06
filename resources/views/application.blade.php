@extends('layouts.dashboard')

@section('dashboard_content')
    @livewire('application', ['name' => $name])
@endsection
