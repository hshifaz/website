@extends('admin._layouts.master')

@section('content')
<h1>Menus</h1>
{!! link_to_route('admin.menus.create', 'Create New Menu') !!}
    @if(count($menus))
        <ul>
            @foreach($menus as $menu)
            <li>
                {!! link_to_route('admin.menus.edit', $menu->caption, array($menu->id)) !!}
                {!! \Collective\Html\FormFacade::open(array('route'=>array('admin.menus.destroy',$menu->id),'method'=>'delete','class'=>'destroy')) !!}
                {!! \Collective\Html\FormFacade::submit('Delete') !!}
                {!! \Collective\Html\FormFacade::close() !!}
            </li>
            @endforeach
        </ul>
@endif
@stop