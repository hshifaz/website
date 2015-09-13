@extends('admin._layouts.admin')

@section('content')

    <h1>Create Content File Type</h1>
    {!! \Collective\Html\FormFacade::open(array('route'=>'admin.contentFileTypes.store')) !!}
    @include('admin.contentFileTypes._partials.form')
    {!! \Collective\Html\FormFacade::close() !!}
@stop