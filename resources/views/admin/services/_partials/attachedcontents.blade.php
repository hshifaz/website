<h2>Attached Contents</h2>
{!! link_to_route('admin.services.attachments', 'Attach Content',array('id'=>$service->id)) !!}
<?php $contentCounter=0; ?>
<table>
@foreach($contents as $content)
     <?php
        $contentCounter++;
        $remove_url = "/stelco_website/public/admin/services/".$service->id."/contentFiles/".$content->id."/remove";
     ?>
<tr>
    <td>{!! link_to_route('admin.contentFiles.edit', $content->desc, array($content->id)) !!}</td>
    <td><img src="/stelco_website/public/images/{{ $content->link }}"></td>
    <td>{!! link_to_route('admin.services.attachments.remove', 'Remove', array($service->id,$content->id)) !!}</td>
</tr>
@endforeach
    @if($contentCounter<1)
        <li><i>No Contents available. </i></li>
    @endif
</table>
