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
				if(!empty($res)) {
					echo "Найдено $res[0] уникальных слов из $res[1]" . '<br/><b>Вот они:</b> ' . $res[2];
				}
				else echo 'Нет уникальных слов';

				?>
			</div>
		</body>
</html>
	<?php
function unikword($a)
{
	$arr = preg_split('/[\s,;."()0-9]+/', $a, -1, PREG_SPLIT_NO_EMPTY);

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
			unset($v);
		}
		foreach ($uniq as $k=>$v){
			if($v==1){
				$uword[]=$k;
			}
		}
		if(!empty($uword)){
		$res=array(count($uword),count($arr), implode(', ',$uword));
		}
		return $res;
}