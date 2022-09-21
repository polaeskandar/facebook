@extends('templates.template')
@section('content')
    {{ \Request::route()->getName() }}
@endsection
