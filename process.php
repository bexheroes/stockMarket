<?php
	
	// Functions
	
	function add_sellOrder($data){
		$file_name = "sells.txt";
		$file = fopen($file_name,"a");
		fwrite($file,$data);
		fwrite($file,"\n");
		fclose($file);
	}
	
	function add_buyOrder($data){
		$file_name = "buys.txt";
		$file = fopen($file_name,"a");
		fwrite($file,$data);
		fwrite($file,"\n");
		fclose($file);
	}
	
	function change_value($data){
		$file_name = "value.txt";
		$file = fopen($file_name,"w");
		fwrite($file,$data);
		fclose($file);
	}
	
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
	
	// Buy Orders File
	$buys_name = "buys.txt";
	if(filesize($buys_name)==0){
		$buys_data = array();
	}else{
		$file = fopen($buys_name,"r");
		$data = trim(fread($file,filesize($buys_name)));
		$buys_data = explode("\n",$data);	
	}
	
	// Sell Orders File
	$sells_name = "sells.txt";
	if(filesize($sells_name)==0){
		$sells_data = array();
	}else{
		$file = fopen($sells_name,"r");
		$data = trim(fread($file,filesize($sells_name)));
		$sells_data = explode("\n",$data);
	}
	
	// Instant Value File
	$value_name = "value.txt";
	$file = fopen($value_name,"r");
	$pseudo_value_data = trim(fread($file,filesize($value_name)));
	$value_data = (double) $pseudo_value_data;
	
	// Values => => => =>
	// buys_data[]
	// sells_data[]
	// value_data
	
	$coincidence_1 = rand(8,14);
	$coincidence_2 = rand(8,14);
	if(count($buys_data)<$coincidence_1 || count($sells_data)<$coincidence_2){
		$coincidence_3 = rand(1,100);
		if($coincidence_3<51 && count($buys_data)<$coincidence_1){
			// Add Buy Order
			
			$random_rate = rand(6,48)/100;
			$create_value = $value_data - $value_data*$random_rate/100;
				add_buyOrder($create_value);
				
				$max_buys = (double)$buys_data[0];
			foreach($buys_data as $key=>$value){
				$real_integer_value = (double) $value;
				if($max_buys > $real_integer_value){
					$max_buys = $real_integer_value;
				}
			}
			
			$min_buys = (double)$buys_data[0];
			foreach($buys_data as $key=>$value){
				$real_integer_value = (double) $value;
				if($min_buys < $real_integer_value){
					$min_buys = $real_integer_value;
				}
			}
			
			
				$max_sells = (double)$sells_data[0];
			foreach($sells_data as $key=>$value){
				$real_integer_value = (double) $value;
				if($max_sells > $real_integer_value){
					$max_sells = $real_integer_value;
				}
			}
			
			$min_sells = (double)$sells_data[0];
			foreach($sells_data as $key=>$value){
				$real_integer_value = (double) $value;
				if($min_sells < $real_integer_value){
					$min_sells = $real_integer_value;
				}
			}
			
			if($min_buys>=$max_sells){
				// Format
				update_buys($buys_data,$min_buys);
				update_sells($sells_data,$max_sells);
				change_value($min_buys);
			}
				
		}else if($coincidence_3<100 && count($sells_data)<$coincidence_2){
			// Add Sell Order
			
			$random_rate = rand(6,48)/100;
			$create_value = $value_data + $value_data*$random_rate/100;
			add_sellOrder($create_value);
			$max_buys = (double)$buys_data[0];
			foreach($buys_data as $key=>$value){
				$real_integer_value = (double) $value;
				if($max_buys > $real_integer_value){
					$max_buys = $real_integer_value;
				}
			}
			
			$min_buys = (double)$buys_data[0];
			foreach($buys_data as $key=>$value){
				$real_integer_value = (double) $value;
				if($min_buys < $real_integer_value){
					$min_buys = $real_integer_value;
				}
			}
			
			
				$max_sells = (double)$sells_data[0];
			foreach($sells_data as $key=>$value){
				$real_integer_value = (double) $value;
				if($max_sells > $real_integer_value){
					$max_sells = $real_integer_value;
				}
			}
			
			$min_sells = (double)$sells_data[0];
			foreach($sells_data as $key=>$value){
				$real_integer_value = (double) $value;
				if($min_sells < $real_integer_value){
					$min_sells = $real_integer_value;
				}
			}
			
			if($min_buys>=$max_sells){
				// Format
				update_buys($buys_data,$min_buys);
				update_sells($sells_data,$max_sells);
				change_value($min_buys);
			}
		}
	}else{
		$coincidence_4 = rand(1,100);
		if($coincidence_4<20){
			// Buy Order To Seller
			// Get Lower
			
			$min = (double)$sells_data[0];
			foreach($sells_data as $key=>$value){
				$real_integer_value = (double) $value;
				if($min < $real_integer_value){
					$min = $real_integer_value;
				}
			}
			
			change_value($min);
			update_sells($sells_data,$min);
			
			
		}else if($coincidence_4<40){
			// 	Sell Order To Buyer
			// Get Higher
			
			$max = (double)$buys_data[0];
			foreach($buys_data as $key=>$value){
				$real_integer_value = (double) $value;
				if($max > $real_integer_value){
					$max = $real_integer_value;
				}
			}
			
			change_value($max);
			update_buys($buys_data,$max);
			
		}
	}
	
?>