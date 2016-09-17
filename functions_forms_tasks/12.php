<?php
$str='А Васька слушает да ест. А воз и ныне там. А вы друзья как ни садитесь, все в музыканты не годитесь. А король-то — голый. А ларчик просто открывался. А там хоть трава не расти.';
echo $str . '<br/>';
function rev($str)
{
    $arr = preg_split('/(?<=\.\s)/', $str, -1, PREG_SPLIT_NO_EMPTY);
        foreach ($arr as $k => $v) {
        $temp = $arr[count($arr) - $k - 1];
        $arr[count($arr) - $k - 1] = $v;
        $arr[$k] = $temp;
        $count++;
        if ($count == count($arr) / 2) {
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
