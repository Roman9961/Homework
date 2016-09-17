<?php

if(!empty($_POST)) {
	$res = unikword($_POST["txt"]);
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
				if(!empty($res))
					echo "Найдено $res[0] уникальных слов из $res[1]";
				?>
			</div>
		</body>
</html>
	<?php
function unikword($a)
{
	$arr = preg_split('/[\s,;".]+/', $a, -1, PREG_SPLIT_NO_EMPTY);
	$tmp = $arr;
	$all=$arr;
	$unic = array_unique($arr);
	$unset = [];
	foreach ($unic as $k => $v) {
		$count = 0;
		foreach ($tmp as $k1 => $v1) {
			if ($v == $v1) {
				$count++;
				$temp[] = $k1;
			}

		}
		if ($count >= 2) {
			$unset = array_merge($unset, $temp);
		}
		unset($temp);
	}
	$unset = array_unique($unset);
	for ($i = 0; $i < count($unset); $i++) {
		foreach ($tmp as $k => $v) {
			if ($unset[$i] == $k) {
				unset ($tmp[$k]);
			}
		}

	}

	if (empty($tmp)) {
		$tmp = 'Нет уникальных слов!';
	}
	$res=array (count($tmp), count($all));
	return $res;


}