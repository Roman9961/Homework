<?php
function showfiles($dir,$word)
{
    if(substr($dir, -1)=='/'){
        $arr = scandir($dir);

        foreach ($arr as $v) {
            if (!is_dir($dir.$v)) {
                if (preg_match("/$word/",$v)) {
                    echo $v . '<br/>';
                }
            }

        }
    }
    else{
        $arr = scandir($dir);

        foreach ($arr as $v) {
            if (!is_dir($dir.'/'.$v)) {
                if (preg_match("/$word/",$v)) {
                    echo $v . '<br/>';
                }
            }

        }
    }
}
showfiles('.','index');