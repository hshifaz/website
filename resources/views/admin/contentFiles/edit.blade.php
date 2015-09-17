@extends('admin._layouts.master')

@section('content')

    <h1>Edit Content File</h1>
    {!! link_to_route('admin.contentFiles.index', 'Show All Content Files') !!}
    {!! \Collective\Html\FormFacade::model($contentFile,array('route'=>array('admin.contentFiles.update',$contentFile->id),'method'=>'put','files'=>true)) !!}
@include('admin.contentFiles._partials.form')

    {!! \Collective\Html\FormFacade::close() !!}
@stop