@extends('admin._layouts.master')

@section('content')
<h1>Content File Types</h1>
{!! link_to_route('admin.contentFiles.create', 'Create New Content File') !!}
    @if(count($contentFiles))
        <ul>
            @foreach($contentFiles as $contentFile)
            <li>
                {!! link_to_route('admin.contentFiles.edit', $contentFile->desc, array($contentFile->id)) !!}
                <a href="contentFiles/{{ $contentFile->id }}/edit"> <img src="/stelco_website/public/images/{{ $contentFile->link }}" /></a>
                {!! \Collective\Html\FormFacade::text('updated_at',date('d-m-Y', strtotime($contentFile->updated_at))) !!}
                {!! \Collective\Html\FormFacade::open(array('route'=>array('admin.contentFiles.destroy',$contentFile->id),'method'=>'delete','class'=>'destroy')) !!}
                {!! \Collective\Html\FormFacade::submit('Delete') !!}
                {!! \Collective\Html\FormFacade::close() !!}
            </li>
            @endforeach
        </ul>
@endif
@stop