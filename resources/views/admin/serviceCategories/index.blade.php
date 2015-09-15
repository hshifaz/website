@extends('admin._layouts.master')

@section('content')
<h1>Service Categories</h1>
{!! link_to_route('admin.serviceCategories.create', 'Create New Service Category') !!}
    @if(count($serviceCategories))
        <ul>
            @foreach($serviceCategories as $category)
            <li>
                {!! link_to_route('admin.serviceCategories.edit', $category->name, array($category->id)) !!}
                {!! \Collective\Html\FormFacade::text('updated_at',date('d-m-Y', strtotime($category->updated_at))) !!}
                {!! \Collective\Html\FormFacade::open(array('route'=>array('admin.services.destroy',$category->id),'method'=>'delete','class'=>'destroy')) !!}
                {!! \Collective\Html\FormFacade::submit('Delete') !!}
                {!! \Collective\Html\FormFacade::close() !!}
            </li>
            @endforeach
        </ul>
@endif
@stop