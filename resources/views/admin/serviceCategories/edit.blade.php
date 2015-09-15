@extends('admin._layouts.master')

@section('content')

    <h1>Edit Service Categories</h1>
    {!! link_to_route('admin.serviceCategories.index', 'Show All Service Categories') !!}
    {!! \Collective\Html\FormFacade::model($serviceCategory,array('route'=>array('admin.serviceCategories.update',$serviceCategory->id),'method'=>'put')) !!}
@include('admin.serviceCategories._partials.form')

    @include('admin.serviceCategories._partials.services')
    {!! \Collective\Html\FormFacade::close() !!}
@stop