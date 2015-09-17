@extends('app');

@section('content')
    <h1>Edit: {!! $career->title !!}</h1>
    <hr/>

    {!! Form::model($career, ['method' => 'PATCH', 'url' =>'careers/' . $career->id]) !!}
    @include ('admin.careers.form', ['submitButtonText' => 'Update Tender'])
    {!! Form::close() !!}
    @include('admin.careers._partials.attachedcontents')
    <div class="form-group">
    {!! Form::label('attachment', 'Attachments') !!}
    {!! link_to_route('contentFiles.create', 'Create New Content File') !!}
    </div>
    @include('errors.list')

@stop