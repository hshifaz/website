<?php $desctination = "/stelco_website/public/images/"; ?>

{!! Form::open(array('route'=>'careers.attachments.store')) !!}
<table>
    @foreach($contents as $content)
        <?php $url = "".$career->id."/contentFiles/".$content->id; ?>
        <tr>
            <td>{!! $content->desc !!}</td>
            <td><a href="<?=$url?>"><img src="/images/{{ $content->link }}"></a></td>
        </tr>
    @endforeach
</table>
{!! Form::close() !!}