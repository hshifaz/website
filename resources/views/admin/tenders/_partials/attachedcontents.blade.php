<h2>Attached Contents</h2>
{!! link_to_route('tenders.attachments', 'Attach Content',array('id'=>$tender->id)) !!}
<?php $contentCounter=0; ?>
<table>
@foreach($contents as $content)
     <?php
        $contentCounter++;
        $remove_url = "/stelcowebsite/public/admin/services/".$tender->id."/contentFiles/".$content->id."/remove";
     ?>
<tr>
    <td>{!! link_to_route('contentFiles.edit', $content->desc, array($content->id)) !!}</td>
    <td><img src="/stelcowebsite/public/images/{{ $content->link }}"></td>
    <td>{!! link_to_route('tenders.attachments.remove', 'Remove', array($tender->id,$content->id)) !!}</td>
</tr>
@endforeach
    @if($contentCounter<1)
        <li><i>No Contents available. </i></li>
    @endif
</table>
