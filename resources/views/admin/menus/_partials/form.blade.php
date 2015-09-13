<ul>
    <li>
        {!! \Collective\Html\FormFacade::label('caption','Caption') !!}
        {!! \Collective\Html\FormFacade::text('caption') !!}
        {!! $errors->first('caption','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('parent_id','Parent') !!}
        {!! \Collective\Html\FormFacade::select('parent_id', \App\menu::lists('caption','id'),null,['placeholder'=>'-- non --']) !!}
        {!! $errors->first('parent_id','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('order','Order') !!}
        {!! \Collective\Html\FormFacade::text('order') !!}
        {!! $errors->first('order','<p class="error">:message</p>') !!}
    </li>

    <?php $checked = false; ?>
    @if($menu->status)
        <?php $checked = true; ?>
    @endif

    <li>
        {!! \Collective\Html\FormFacade::label('status','Status') !!}
        {!! \Collective\Html\FormFacade::checkbox('status',$menu->status) !!}
        {!! $errors->first('status','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('file','File') !!}
        {!! \Collective\Html\FormFacade::file('file') !!}
        <?php
        if(isset($menu)){
        ?>
        <img src="/stelco_website/public/images/{{ $menu->file }}">
        <?php
        }
        ?>
        {!! $errors->first('file','<p class="error">:message</p>') !!}
    </li>

    <li>
        {!! \Collective\Html\FormFacade::submit('Save') !!}
    </li>
</ul>

