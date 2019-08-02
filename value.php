<?php
	if(!$_POST){
		echo "no way";
	}else{
		$file_name = "value.txt";
		$file = fopen($file_name,"r");
		$data = fread($file,filesize($file_name));
		echo $data;
	}
?>