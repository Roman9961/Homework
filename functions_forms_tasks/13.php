<?php
$str='яблоко черешня вишня вишня яблоко вишня вишня черешня груша яблоко черешня вишня яблоко вишня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня вишня черешня груша яблоко черешня черешня вишня яблоко вишня вишня черешня черешня груша яблоко черешня вишня';
function counter($str)
{
    $arr = preg_split('/\s/u', $str, -1, PREG_SPLIT_NO_EMPTY);
    sort($arr);
    $uniq = array_flip(array_unique($arr));
    $count = $uniq;
    sort($count);
    foreach ($count as $k => &$v) {
        $v = $count[$k + 1] - $count[$k];
        unset ($v);
    }
    $count[count($count) - 1] += count($arr);
    $i = 0;
    $res ='';
    foreach ($uniq as $k => &$v) {
        $v = $count[$i];
        $i++;
        $res.= printf($k . ' - ' . $v . '<br/>');
        unset($v);
    }
    return $res;
}
counter($str);


