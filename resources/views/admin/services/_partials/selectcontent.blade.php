<table>
    <?php $desctination = "/stelco_website/public/images/"; ?>

        {!! \Collective\Html\FormFacade::open(array('route'=>'admin.services.attachments.store')) !!}
@foreach($contents as $content)
<?php $url = "/stelco_website/public/admin/services/".$service->id."/contentFiles/".$content->id; ?>
<tr>
    <td>{!! $content->desc !!}</td>
    <td><a href="<?=$url?>"><img src="/stelco_website/public/images/{{ $content->link }}"></a></td>
</tr>

@endforeach
</table>

<ul>
    <li>
        {!! \Collective\Html\FormFacade::submit('Save') !!}
    </li>
</ul>
{!! \Collective\Html\FormFacade::close() !!}