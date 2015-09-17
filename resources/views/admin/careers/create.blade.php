@extends('app')

@section('content')

    <h1>Add a new career</h1>

    <hr/>

    {!! Form::open(['url' => 'careers']) !!}
    @include('admin.careers.form', ['submitButtonText' => 'Add Job'])
    {!! Form::close() !!}

    @include('errors.list')

@stop