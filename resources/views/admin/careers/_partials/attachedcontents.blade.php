<h2>Attached Contents</h2>
{!! link_to_route('careers.attachments', 'Attach Content',array('id'=>$career->id)) !!}
<?php $contentCounter=0; ?>
<table>
@foreach($contents as $content)
     <?php
        $contentCounter++;
        $remove_url = "/stelcowebsite/public/admin/services/".$career->id."/contentFiles/".$content->id."/remove";
     ?>
<tr>
    <td>{!! link_to_route('contentFiles.edit', $content->desc, array($content->id)) !!}</td>
    <td><img src="/stelcowebsite/public/images/{{ $content->link }}"></td>
    <td>{!! link_to_route('careers.attachments.remove', 'Remove', array($career->id,$content->id)) !!}</td>
</tr>
@endforeach
    @if($contentCounter<1)
        <li><i>No Contents available. </i></li>
    @endif
</table>
