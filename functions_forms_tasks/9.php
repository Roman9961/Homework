<?php

if(!empty($_POST)) {
	$res = rev($_POST["txt"]);
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
					<form method="post" action="#">
					<label>Text:</label>
					<textarea name="txt"></textarea>
					<div>
					<input type="submit" name="sub" value="Submit"></input>
					</div>
			</form>
				<?php
				if(!empty($res)):
					echo "<pre>";
				print_r($res);
					echo "</pre>";
					endif;
				?>
			</div>
		</body>
</html>
	<?php
function rev($a){
	$arr= preg_split('//u',$a,-1, PREG_SPLIT_NO_EMPTY);
	$tmp=array_reverse($arr);
	return 	implode($tmp);


}