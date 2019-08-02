<form action="" method="POST">
<input type='text' name="get"><br>
<input type='text' name='rate'><br>
<input type="submit" name="pump" value="pump"><br>
<input type="submit" name="dump" value="dump">
</form>
<?php
	error_reporting(0);
	if($_POST["pump"] || $_POST["dump"]){
			$put = "hebelehübele";
			if(htmlspecialchars(trim($_POST["get"]))==$put){
				if($_POST["pump"]){
					
					$rate = htmlspecialchars(trim($_POST["rate"]));
					
					$f = "value.txt";
					$file = fopen($f,"r");
					$x = (int)fread($file,filesize($f));
					fclose($file);
					
					$file = fopen($f,"w");
					fwrite($file,$x*($rate+100)/100);
					fclose($file);
					
					$f = "buys.txt";
					$file = fopen($f,"r");
					$fileread = fread($file,filesize($f));
					$arr1 = explode("\n",$fileread);
					fclose($file);
					
					$f = "sells.txt";
					$file = fopen($f,"r");
					$fileread = fread($file,filesize($f));
					$arr3 = explode("\n",$fileread);
					fclose($file);
					
					$arr2 = array();
					$arr4 = array();
					
					foreach($arr1 as $key=>$value){
						$val = (double)$value;
						array_push($arr2,$val*(100+$rate)/100);
					}
					
					
					foreach($arr3 as $key=>$value){
						$val = (double)$value;
						array_push($arr4,$val*(100+$rate)/100);
					}
					
					$f = "buys.txt";
					$file = fopen($f,"w");
					fclose($file);
					
					
					$f = "sells.txt";
					$file = fopen($f,"w");
					fclose($file);
					
					$f = "buys.txt";
					$file = fopen($f,"a");
					foreach($arr2 as $value){
						$val = round((double)$value,8)+"\n";
						fwrite($file,$value);
					}
					
					$f = "sells.txt";
					$file = fopen($f,"a");
					foreach($arr4 as $value){
						$val = round((double)$value,8)+"\n";
						fwrite($file,$value);
					}
					
					echo "<script>window.location='https://www.google.com/search?ei=S-RDXZ-uKoHNwQK2sZKwCA&q=i%C5%9Flem+ba%C5%9Far%C4%B1l%C4%B1&oq=i%C5%9Flem+ba%C5%9Far%C4%B1l%C4%B1&gs_l=psy-ab.3..0i70i255j0i22i30l4.1072.3116..3326...0.0..0.254.2043.0j12j2......0....1..gws-wiz.......0i71j0i131j0i67j0.nfVaeej07n4&ved=0ahUKEwjf_4-S0-PjAhWBZlAKHbaYBIYQ4dUDCAo&uact=5'</script>";
					
				}else if($_POST["dump"]){
					
				}
			}
	}
?>