@extends('admin._layouts.admin')

@section('content')

    <h1>Create Menu</h1>
    {!! \Collective\Html\FormFacade::open(array('route'=>'admin.menus.store')) !!}
    @include('admin.menus._partials.form')
    {!! \Collective\Html\FormFacade::close() !!}
@stop