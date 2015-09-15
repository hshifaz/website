@extends('admin._layouts.master')

@section('content')

    <h1>Edit Service</h1>
    {!! link_to_route('admin.services.index', 'Show All Services') !!}
    {!! \Collective\Html\FormFacade::model($service,array('route'=>array('admin.services.update',$service->id),'method'=>'put')) !!}
@include('admin.services._partials.form')
    @include('admin.services._partials.attachedcontents')
    {!! \Collective\Html\FormFacade::close() !!}
@stop