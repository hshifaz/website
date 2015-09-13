@extends('admin._layouts.admin')

@section('content')

    <h1>Create Service</h1>
    {!! \Collective\Html\FormFacade::open(array('route'=>'admin.services.store')) !!}
    @include('admin.services._partials.form')
    {!! \Collective\Html\FormFacade::close() !!}
@stop