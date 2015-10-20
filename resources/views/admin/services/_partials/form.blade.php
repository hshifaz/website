<ul>
    <li>
        {!! \Collective\Html\FormFacade::hidden('contentRoute',route('admin.services.attachments'),array('id'=>'contentRoute')) !!} <!-- remove this line -->
        {!! \Collective\Html\FormFacade::hidden('id',$service->id,array('id'=> 'id')) !!}
        {!! \Collective\Html\FormFacade::label('name','Name') !!}
        {!! \Collective\Html\FormFacade::text('name') !!}
        {!! $errors->first('name','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('desc','Description') !!}
        {!! \Collective\Html\FormFacade::textarea('desc') !!}
        {!! $errors->first('desc','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('category_id','Category') !!}
        {!! \Collective\Html\FormFacade::select('category_id', \App\service::lists('name','id'),null,['placeholder'=>'-- non --']) !!}
        {!! $errors->first('category_id','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('icon','Icon') !!}
        {!! \Collective\Html\FormFacade::text('icon') !!}
        {!! $errors->first('icon','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('link','Link') !!}
        {!! \Collective\Html\FormFacade::text('link') !!}
        {!! $errors->first('link','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('order','Order') !!}
        {!! \Collective\Html\FormFacade::text('order') !!}
        {!! $errors->first('order','<p class="error">:message</p>') !!}
    </li>
@if(isset($service))
    <?php $checked = false; ?>
    @if($service->status)
        <?php $checked = true; ?>
    @endif

    <li>
        {!! \Collective\Html\FormFacade::label('status','Status') !!}
        {!! \Collective\Html\FormFacade::checkbox('status',$service->status) !!}
        {!! $errors->first('status','<p class="error">:message</p>') !!}
    </li>
    @endif
    <li>
        {!! \Collective\Html\FormFacade::submit('Save') !!}
    </li>
</ul>

