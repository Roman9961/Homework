<?php
$res=[];
if(!empty($_POST)) {
	$res = top3($_POST["txt"]);
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
					<textarea name="txt"><?php (!empty($_POST["txt"]))?$_POST["txt"]:$_POST["txt"]='Введите текст'; echo $_POST["txt"];?></textarea>
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
function top3($a){
	$arr= preg_split('/[\s.,]/',$a,-1, PREG_SPLIT_NO_EMPTY);

	uasort($arr, function($a,$b) {
		if (strlen($a)==strlen($b)) {
			return 0;
		}
		 return (strlen($a)<strlen($b)) ? 1 : -1;
	}
	);
$tmp=array_unique($arr);
$tmp=array_chunk($tmp,3);
return $tmp[0];

}