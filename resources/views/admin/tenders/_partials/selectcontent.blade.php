<?php $desctination = "/stelco_website/public/images/"; ?>

{!! Form::open(array('route'=>'tenders.attachments.store')) !!}
<table>
    @foreach($contents as $content)
        <?php $url = "".$tender->id."/contentFiles/".$content->id; ?>
        <tr>
            <td>{!! $content->desc !!}</td>
            <td><a href="<?=$url?>"><img src="/images/{{ $content->link }}"></a></td>
        </tr>
    @endforeach
</table>
{!! Form::close() !!}