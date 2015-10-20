<?php
function link_to_route_image($route, $image, $sid, $cid)
{
    $m = '<a href="'.Html::linkRoute($route).'">'
        . '<img src=">'.$image.'">'
        . '</a>';

    dd(Html::linkRoute($route) );
    return $m;
}
?>