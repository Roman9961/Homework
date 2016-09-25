<?php
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
	comment($_POST['txt']);
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
		<?php if(is_file('coment.txt')){echo file_get_contents('coment.txt').'<hr>';}?>
			<form method="post" action="#">
					<label>Коментарий:</label>
					<textarea name="txt"></textarea>
					<div>
					<input type="submit" name="sub" value="Submit"/><input type="submit" name="unset" value="Clear"/>
					</div>
			</form>

		</body>
</html>
