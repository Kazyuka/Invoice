@extends('layout')

@section('header')

@endsection


@section('content')
    <h1>  <a href="{{ action("InvoiceController@getInvoice") }} " class="btn btn-xs btn-info pull-right">Create Invoice</a> </h1>
@endsection
