@extends('admin._layouts.master')

@section('content')

    <h1>Edit Service</h1>
    {!! link_to_route('admin.services.index', 'Show All Services') !!}
    {!! \Collective\Html\FormFacade::model($service,array('route'=>array('admin.services.update',$service->id),'method'=>'put')) !!}

    @include('admin.services._partials.form')
    @include('admin.services._partials.attachedcontents')
    {!! \Collective\Html\FormFacade::close() !!}

    {!! \Collective\Html\FormFacade::open(array('route'=>'admin.services.attachments.store', 'id'=>'add_content', 'name'=>'add_content','style'=>'display:none')) !!}
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

    <div class='modal fade' id='contents' tabindex='-1' role='dialog' aria-labelledby='contentLabel'>
    </div>





@stop