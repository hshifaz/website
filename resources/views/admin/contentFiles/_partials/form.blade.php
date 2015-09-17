<ul>
    <li>
        {!! \Collective\Html\FormFacade::label('link','Select File') !!}
        {!! \Collective\Html\FormFacade::file('link') !!}
        {!! $errors->first('link','<p class="error">:message</p>') !!}
        <?php
        if(isset($contentFile)){
        ?>
        <img src="/images/{{ $contentFile->link }}">

        <?php
        }
        ?>

    </li>

    <li>
        {!! \Collective\Html\FormFacade::label('desc','Description') !!}
        {!! \Collective\Html\FormFacade::textarea('desc') !!}
        {!! $errors->first('desc','<p class="error">:message</p>') !!}
    </li>


    <li>
        {!! \Collective\Html\FormFacade::submit('Save') !!}
    </li>
</ul>