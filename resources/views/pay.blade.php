


@extends('layout')

@section('header')

@endsection


@section('content')
    <h1> Do you wont to pay ${{$price}} ?</h1>
    <a href="{{ action("InvoiceController@payCurrentInvoice") }} " class="btn btn-xs btn-info pull-right">Tap to pay</a>
@endsection








