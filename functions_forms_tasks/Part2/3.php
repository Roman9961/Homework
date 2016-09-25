<?php
if(!empty($_POST)) {
removewords('1.txt',$_POST["nwords"]);
}
?>
<html>
<head>
    <title>!DOCTYPE</title>
    <style>
        input{margin-left: 0px;

        }
        input.number{
            width: 40px;
        }
        label{
            vertical-align:top;

        }
    </style>
</head>
<meta charset="utf-8">
<body>
<form method="post" action="#">
    <label>Удалить слова длиннее:</label>
    <input class="number" type="number" name="nwords"/> символов.
    <div>
        <input type="submit" name="sub" value="Submit"></input>
    </div>
</form>
</body>
</html>
<?php
function removewords($path, $lenght){
	$f=fopen($path, 'rb');
	while(!feof($f))
    {
		$buffer = fgets($f);
		$a=preg_split('/[\s]/', $buffer);
		$f1=fopen('tmp.txt', 'ab');
            foreach($a as $v)
            {
                if(preg_match('/,/',$v)&&(strlen($v)<=($lenght+1)))
                    { fwrite($f1,$v.' '); }
                elseif((strlen($v)<=$lenght)&&(strlen($v)>0))
                    {fwrite($f1,$v.' ');}
            }
	}
		fclose($f);
		copy('tmp.txt',$path);
		fclose($f1);
		unlink('tmp.txt');
		
		
		
		
}
?>


