<?php
//формирую строку со списком запрещенных слов
$f=fopen('https://dl.dropboxusercontent.com/u/156838/Spisok/mat-spisok_lt.txt', 'r');
$str="'/";
while(!feof($f)){

	$tmp=trim(fgets($f));
	if($tmp!=='р')
	$str.=$tmp.'|';
}
$str.="$tmp/'";
fclose($f);
function comment($coment){
	if(!empty($coment)) {
		if(is_file('coment.txt')) {
			$f = fopen('coment.txt', 'r');
			while (!feof($f)) {
				fgets($f);
				$num++;
			}
			fclose($f);

			$f = fopen('coment.txt', 'a');
			fwrite($f, "$num. " . $coment . "\r\n" . '<br>');
			fclose($f);
		}
		else{
			$f = fopen('coment.txt', 'a');
			fwrite($f, "1. " . $coment . "\r\n" . '<br>');
			fclose($f);
		}
	}
}
if($_POST['unset']){
	unlink('coment.txt');
}
elseif(!empty($_POST)) {
	$mat=0;
	$cut=strip_tags($_POST['txt'],'<>');
	$cut=preg_replace('/\r\n|\r|\n/u',' ', $cut);
	if(preg_match($str, $cut,$matches)){
		$mat='Некорректный комментарий!';
	}
	else {
		comment($cut);

	}
}

?>
<html>
	<head>
	<title>!DOCTYPE</title>
		<style>
			input{margin-left: 32px;
			}
			label{
				vertical-align:top;

			}
		</style>
	</head>
	<meta charset="utf-8">
		<body>
		<?php if(is_file('coment.txt')&&$mat===0) {echo file_get_contents('coment.txt').'<hr>';}
				elseif(is_file('coment.txt')&&$mat!==0) {echo file_get_contents('coment.txt').$mat.'<hr>';}
		elseif($mat!==0){echo $mat;}
		?>
			<form method="post" action="#">
					<label>Коментарий:</label>
					<textarea name="txt"></textarea>
					<div>
					<input type="submit" name="sub" value="Submit"/><input type="submit" name="unset" value="Clear"/>
					</div>
			</form>

		</body>
</html>
