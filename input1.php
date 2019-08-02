<?php
	if(!$_POST){
		echo "no way";
	}else{
		$f = "input1.txt";
		$file = fopen($f,"a");
		fwrite($file,$_POST["data"]);
		fclose($file);
	}
?>