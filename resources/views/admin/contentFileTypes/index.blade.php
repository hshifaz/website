@extends('admin._layouts.master')

@section('content')
<h1>Content File Types</h1>
{!! link_to_route('admin.contentFileTypes.create', 'Create New Content File Type') !!}
    @if(count($contentFileTypes))
        <ul>
            @foreach($contentFileTypes as $contentFileType)
            <li>
                {!! link_to_route('admin.contentFileTypes.edit', $contentFileType->extension, array($contentFileType->id)) !!}
                {!! \Collective\Html\FormFacade::text('updated_at',date('d-m-Y', strtotime($contentFileType->updated_at))) !!}
                {!! \Collective\Html\FormFacade::open(array('route'=>array('admin.contentFileTypes.destroy',$contentFileType->id),'method'=>'delete','class'=>'destroy')) !!}
                {!! \Collective\Html\FormFacade::submit('Delete') !!}
                {!! \Collective\Html\FormFacade::close() !!}
            </li>
            @endforeach
        </ul>
@endif
@stop