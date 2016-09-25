<?php
function showfiles($dir)
{
    if(substr($dir, -1)=='/'){
    $arr = scandir($dir);

    foreach ($arr as $v) {
        if (!is_dir($dir.$v)) {
       echo $v . '<br/>';
        }

    }
}
else{
    $arr = scandir($dir);

    foreach ($arr as $v) {
        if (!is_dir($dir.'/'.$v)) {
            echo $v . '<br/>';
        }

    }
}
}
showfiles('C:');
