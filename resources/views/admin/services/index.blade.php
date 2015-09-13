@extends('admin._layouts.master')

@section('content')
<h1>Services</h1>
{!! link_to_route('admin.services.create', 'Create New service') !!}
    @if(count($services))
        <ul>
            @foreach($services as $service)
            <li>
                {!! link_to_route('admin.services.edit', $service->name, array($service->id)) !!}
                {!! \Collective\Html\FormFacade::text('updated_at',date('d-m-Y', strtotime($service->updated_at))) !!}
                {!! \Collective\Html\FormFacade::open(array('route'=>array('admin.services.destroy',$service->id),'method'=>'delete','class'=>'destroy')) !!}
                {!! \Collective\Html\FormFacade::submit('Delete') !!}
                {!! \Collective\Html\FormFacade::close() !!}
            </li>
            @endforeach
        </ul>
@endif
@stop