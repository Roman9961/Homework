<?php
$str='А Васька. А воз. А вы друзья. А король. А ларчик. А там.';
echo $str . '<br/>';
function rev($str)
{
    $arr = preg_split('/(?<=\.\s)/', $str, -1, PREG_SPLIT_NO_EMPTY);
    $count_ar=count($arr);
        foreach ($arr as $k => $v) {
        $temp = $arr[$count_ar - $k - 1];
        $arr[$count_ar - $k - 1] = $v;
        $arr[$k] = $temp;
        $count++;
        if ($count == ceil($count_ar/2)) {
            break;
        }


    }
    foreach ($arr as $k => $v) {
        if ($k == 0) {
            $v .= ' ';
        }
        $res .= $v;
    }
    return $res;
}
echo rev($str);
