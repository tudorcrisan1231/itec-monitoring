@extends('layouts.mail')

@section('content')
    <h1>{{$alert_message}}</h1>
    <p>"<b>{{$application->name}}</b>" has some problems</p>
@endsection
