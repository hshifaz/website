<ul>
    <li>
        {!! \Collective\Html\FormFacade::label('link','File Name') !!}
        {!! \Collective\Html\FormFacade::file('link') !!}

        <?php
        if(isset($contentFile)){
        ?>
            <img src="/stelco_website/public/images/{{ $contentFile->link }}">

        <?php
        }
        ?>
        {!! $errors->first('link','<p class="error">:message</p>') !!}
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

