@extends('admin._layouts.master')

@section('content')

    <h1>Edit Menu</h1>
    {!! link_to_route('admin.menus.index', 'Menus') !!}
    {!! \Collective\Html\FormFacade::model($menu,array('route'=>array('admin.menus.update',$menu->id),'method'=>'put','files'=>true)) !!}
@include('admin.menus._partials.form')
    @include('admin.menus._partials.submenus')
    {!! \Collective\Html\FormFacade::close() !!}
@stop