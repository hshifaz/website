@extends('admin._layouts.master')

@section('content')

    {!! \Collective\Html\FormFacade::open(array('route'=>'admin.services.attachments.store', 'id'=>'add_content', 'name'=>'add_content')) !!}
    <table>
        @foreach($contents as $content)
    <tr>
        <td>
            <a href="{{route('admin.services.attachments.store',array($service->id,$content->id))}}">
                <img src="{!! asset('images').'/'.$content->link !!}" /></a>

        </td>
        <td>{!! $content->desc !!}</td>

            </tr>
        @endforeach
    </table>
    {!! \Collective\Html\FormFacade::close() !!}

@stop