@extends('app');

@section('content')
    <h1>Edit: {!! $tender->title !!}</h1>
    <hr/>

    {!! Form::model($tender, ['method' => 'PATCH', 'url' =>'tenders/' . $tender->id]) !!}
    @include ('admin.tenders.form', ['submitButtonText' => 'Update Tender'])
    {!! Form::close() !!}
    @include('admin.tenders._partials.attachedcontents')
    <div class="form-group">
        {!! Form::label('attachment', 'Attachments') !!}
        {!! link_to_route('contentFiles.create', 'Create New Content File') !!}
    </div>
    @include('errors.list')

@stop