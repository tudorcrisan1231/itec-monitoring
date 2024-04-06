@extends('layouts.mail')

@section('content')
    <h1>{{$alert_message}}</h1>
    <p>{{$application->name}} has some problems</p>
@endsection
