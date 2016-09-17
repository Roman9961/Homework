<?php
$str='а васька слушает да ест. а воз и ныне там. а вы друзья как ни садитесь, все в музыканты не годитесь. а король-то — голый. а ларчик просто открывался.а там хоть трава не расти.';
function upper($str)
{
    $arr = preg_split('/(?<=\.\s|\.)/', $str, -1, PREG_SPLIT_NO_EMPTY);
    foreach ($arr as $v) {
        $sub_arr = explode(' ', $v);
        $up = $sub_arr[0];
        $sub_arr[0] = mb_strtoupper($up);
        $res .= implode($sub_arr, ' ');


    }
    return $res;
}
echo upper($str);