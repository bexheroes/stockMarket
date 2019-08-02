<?php

	
	function update_buys($data,$removed_data){
		// Clean File Firstly
		$file_name = "buys.txt";
		$file = fopen($file_name,"w");
		fwrite($file,"");
		fclose($file);
		// Then Process
		$file = fopen($file_name,"a");
		foreach($data as $key=>$value){
			$real_integer_value = (double)$value;
			if($real_integer_value!=$removed_data){
				fwrite($file,$value);
				fwrite($file,"\n");
			}
		}
	}
	
	function update_sells($data,$removed_data){
		// Clean File Firstly
		$file_name = "sells.txt";
		$file = fopen($file_name,"w");
		fwrite($file,"");
		fclose($file);
		// Then Process
		$file = fopen($file_name,"a");
		foreach($data as $key=>$value){
			$real_integer_value = (double)$value;
			if($real_integer_value!=$removed_data){
				fwrite($file,$value);
				fwrite($file,"\n");
			}
		}
	}

	$f = "buys.txt";
	$file = fopen($f,"a+");
	//min
	//real sells
	
	
	$f2 = "sells.txt";
	$file2 = fopen($f2,"a+");
	//max
	//real buys
	
	$read1 = fread($file,filesize($f));
	$read2 = fread($file2,filesize($f2));
	
	$datas1 = explode("\n",$read1);
	$datas2 = explode("\n",$read2);
	
	$arr = array();
	$arr2 = array();
	
	foreach($datas1 as $val){
		$valx = (double)$val;
		array_push($arr,$valx);
	}
	
	foreach($datas2 as $val){
		$valx = (double)$val;
		array_push($arr2,$valx);
	}
	
	$min = $arr[0];
	$max = $arr2[0];
	
	foreach($arr as $val){
		$valx = (double)$val;
		if($min>$valx){
			$min = $valx;
		}
	}
	
	foreach($arr2 as $val){
		$valx = (double)$val;
		if($max<$valx){
			$max = $valx;
		}
	}
	
	if($min>$max){
		update_buys($arr2,$min);
		update_sells($arr,$max);
	}
	
	
	
?>