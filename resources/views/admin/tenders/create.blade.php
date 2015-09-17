@extends('app')

@section('content')

    <h1>Create a new Tender</h1>

    <hr/>

    {!! Form::open(['url' => 'tenders']) !!}
    @include('admin.tenders.form', ['submitButtonText' => 'Add Tender'])
    {!! Form::close() !!}

    @include('errors.list')

@stop