@extends('admin._layouts.master')

@section('content')

    <h1>Edit Content File Type</h1>
    {!! link_to_route('admin.contentFileTypes.index', 'Show All Content File Types') !!}
    {!! \Collective\Html\FormFacade::model($contentFileType,array('route'=>array('admin.contentFileTypes.update',$contentFileType->id),'method'=>'put')) !!}
@include('admin.contentFileTypes._partials.form')

    {!! \Collective\Html\FormFacade::close() !!}
@stop