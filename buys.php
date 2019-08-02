<?php
	if(!$_POST){
		echo "no way";
	}else{
		error_reporting(0);
		$file_name = "buys.txt";
		$file = fopen($file_name,"r");
		$data = trim(fread($file,filesize($file_name)));
		$splited_data = explode("\n",$data);
		$arr = array();
		foreach($splited_data as $key=>$value){
			array_push($arr,$value);
		}
		for($i=0;$i<count($arr);$i++){
			for($j=0;$j<count($arr);$j++){
				if($arr[$i]<$arr[$j]){
					$keep = $arr[$i];
					$arr[$i] = $arr[$j];
					$arr[$j] = $keep;
				}
			}
		}
		foreach($arr as $key=>$value){
			echo "<div id='buy_element'><div id='buy_element_in'>$value</div></div>";
		}
	}
?>