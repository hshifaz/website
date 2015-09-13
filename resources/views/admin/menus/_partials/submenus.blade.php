<h2>Sub Menus</h2>

<?php $ms = \App\menu::all(); $subCount=0; ?>
<ul>
@foreach($ms as $sub)
    @if($sub->parent_id == $menu->id)
            <?php $subCount++; ?>
            <li>
        {!! link_to_route('admin.menus.edit', $sub->caption, array($sub->id)) !!}
            </li>
        @endif

@endforeach
    @if($subCount<1)
        <li><i>No Sub Menus available. </i></li>
    @endif
</ul>

