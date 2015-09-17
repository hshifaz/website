@extends('admin._layouts.admin')

@section('content')

    <h1>Upload Content</h1>
    {!! \Collective\Html\FormFacade::open(array('route'=>'contentFiles.store','files'=>true)) !!}
    @include('admin.contentFiles._partials.form')
    {!! \Collective\Html\FormFacade::close() !!}
@stop