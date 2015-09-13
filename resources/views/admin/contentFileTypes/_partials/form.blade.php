<ul>
    <li>
        {!! \Collective\Html\FormFacade::label('extension','File Extension') !!}
        {!! \Collective\Html\FormFacade::text('extension') !!}
        {!! $errors->first('extension','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('desc','Description') !!}
        {!! \Collective\Html\FormFacade::textarea('desc') !!}
        {!! $errors->first('desc','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('type','Type') !!}
        {!! \Collective\Html\FormFacade::select('type', array('c'=>'Content','m'=>'Media'),null,['placeholder'=>'-- non --']) !!}
        {!! $errors->first('type','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::submit('Save') !!}
    </li>
</ul>

