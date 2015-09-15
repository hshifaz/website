<ul>
    <li>
        {!! \Collective\Html\FormFacade::label('name','Name') !!}
        {!! \Collective\Html\FormFacade::text('name') !!}
        {!! $errors->first('name','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('order','Order') !!}
        {!! \Collective\Html\FormFacade::text('order') !!}
        {!! $errors->first('order','<p class="error">:message</p>') !!}
    </li>
@if(isset($serviceCategory))
    <?php $checked = false; ?>
    @if($serviceCategory->status)
        <?php $checked = true; ?>
    @endif

    <li>
        {!! \Collective\Html\FormFacade::label('status','Status') !!}
        {!! \Collective\Html\FormFacade::checkbox('status',$serviceCategory->status) !!}
        {!! $errors->first('status','<p class="error">:message</p>') !!}
    </li>
    @endif
    <li>
        {!! \Collective\Html\FormFacade::submit('Save') !!}
    </li>
</ul>

