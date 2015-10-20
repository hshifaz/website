<h2>Attached Contents</h2>
{!! Form::button('Attach Content',array('onClick'=>'show_form("add_content")')) !!}
<?php $contentCounter=0; ?>
<table>
@foreach($contents as $content)
     <?php
        $contentCounter++;
     ?>
    <tr>
        <td>{!! link_to_route('admin.contentFiles.edit', $content->desc, array($content->id)) !!}</td>
        <td><img src="{!! asset('images').'/'.$content->link !!}"></td>
        <td>{!! link_to_route('admin.services.attachments.remove', 'Remove', array($service->id,$content->id)) !!}</td>
    </tr>
@endforeach
    @if($contentCounter<1)
        <li><i>No Contents available. </i></li>
    @endif
</table>

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg push" data-toggle="modal" data-target="#addContentModal">
    Attach Content
</button>