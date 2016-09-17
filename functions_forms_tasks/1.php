<?php
$res=[];
if(!empty($_POST)) {
	$res = getCommonWords($_POST["txt1"], $_POST["txt2"]);
}
?>
<html>
	<head>
	<title>!DOCTYPE</title>
	</head>
	<meta charset="utf-8">
		<body>
			<form method="post" action="#">
				<div>
					<label>Text1</label>
					<textarea name="txt1"></textarea>
				</div>
				<div>
					<label>Text2</label>
					<textarea  name="txt2"></textarea>
				</div>
				<input type="submit" name="sub" value="Submit"></input>
			</form>
			<div>
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
function getCommonWords($a, $b){
	$a=preg_split('/[\s,.0-9]/', $a);
	$b=	preg_split('/[\s,.0-9]/', $b);
	$callback=function ($a){
		return !empty($a);
	};
	$a=array_filter($a, $callback);
	$b=array_filter($b, $callback);
	$inter=array_intersect($a,$b);
	return array_unique($inter);

}