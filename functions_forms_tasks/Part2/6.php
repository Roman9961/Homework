<?php
define('DS', DIRECTORY_SEPARATOR);
define('IMAGES_DIR',__DIR__.DS.'gallery');

$files=$_FILES['upfile'];
if(!empty($files['name'][0])){
    upload($files);
    $files_arr=scandir(IMAGES_DIR . DS);
    natsort($files_arr);
    $files_arr=array_values($files_arr);
    $im_count=count(scandir(IMAGES_DIR . DS ))-2;
}

function upload($files)
{
    for ($i = 0, $j = 0; $i < count($files['name']); $i++) {
        if (!is_dir(IMAGES_DIR)) {
            mkdir(IMAGES_DIR);
            if(strpos($files['type'][$i], 'image/') !== false) {
                $j++;
                $ext = preg_split('/image\//', $files['type'][$i]);
                $files['name'][$i] = ($j) . '.' . $ext[1];
                move_uploaded_file($files['tmp_name'][$i], IMAGES_DIR . DS . $files['name'][$i]);

            }
        }
            elseif(strpos($files['type'][$i], 'image/') !== false) {
                $j++;
                $ext = preg_split('/image\//', $files['type'][$i]);
                $files['name'][$i] = ($j) . '.' . $ext[1];
                move_uploaded_file($files['tmp_name'][$i], IMAGES_DIR . DS . $files['name'][$i]);

            }

        }

}
function tableCreate($items,$col){
   global $files_arr;

    echo  "<table>";
    for($i=0;$i<$items/$col;$i++){
        echo "<tr>\r\n";
        for($j=0;$j<$col;$j++){
            $count++;
            $ext = preg_split('/[\d]+./',$files_arr[$count+1] );
            $name=preg_split('/[.]/',$files_arr[$count+1] );
            if($ext[1]) {
             echo "<th><img src='gallery" . DS . $name[0] . '.' . $ext[1] . "'></th>";
            }
        }
        echo "</tr>\r\n";
    }
    echo "</table>";




}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gallery</title>
    <style>
        img{
            width: 100px;
            height: 100px;

        }
    </style>
</head>
<body>
<form enctype="multipart/form-data" method="post">
    <input type="file" name="upfile[]" multiple="multiple"/>
    <label>Кол-во колонок в галерее:</label>
    <input type="text" name="col"/>
    <input type="submit" value="Загрузить"/>
</form>
<?php if(!empty($files['name'][0])):?>
    <?php tableCreate($im_count,$_POST['col']);?>
<?php else:?>
<?php endif;?>
</body>
</html>