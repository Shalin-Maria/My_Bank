<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/submit.css">
	</head>
	<body>
		<span style='font-size: 18px;'> The Page will re-direct in <span id="pageBeginCountdownText">5 </span> seconds</span>
		<?php

			if(isset($_POST['submit']))
			{
				$rname="";$racc="";
				$sname=$_POST['sendname'];
				$sacc=$_POST['sendacc'];
				$rname=$_POST['receiver_name'];
				$racc=$_POST['receiver_acc'];
				$amt=$_POST['amt'];
				if($rname==""||$racc=="")
				{
					echo"<p>Please Enter valid Name and Account Number</p><br>
							<a href='cust.php'>
							<input type='submit' class='btn btn-lg btn-outline-primary'value='View All Customers'>
							</a>";
				}
				else
				{
					if($sname==$rname)
					{
							echo"<p>Transferring Money to same Account</p>
							<a href='cust.php'>
							<input type='submit' class='btn btn-lg btn-outline-primary' value='View All Customers'>
							</a>";
					}
					else
					{
						$con=mysqli_connect("localhost","root","","mybank");
						if($con-> connect_error)
						{
							die("Connection Failed:".$con->connect_error);
						}
						$sql = "SELECT * from customers where accno='".$racc."'";
						$result = $con-> query($sql);
						if($result->num_rows>0)
						{
							while($row = $result->fetch_assoc())
							{
								$name_db=$row["name"];
								$acc_no_db=$row["accno"];
							}
						}
						$sql1 = "SELECT * from customers where accno='".$sacc."'";
						$result1 = $con-> query($sql1);
						if($result1->num_rows>0)
						{
							while($row = $result1->fetch_assoc())
							{
								$currbal_db=$row["balance"];
							}
						}
						if($acc_no_db==$racc)
						{
							if($name_db==$rname)
							{
								if($amt>$currbal_db)
								{
									echo "<p>Insufficient Balance</p>
										<a href='cust.php'>
										<input id='sub'type='submit' class='btn btn-lg btn-outline-primary'value='View All Customers'>
										</a>";
								}
								else
								{
									$result_SENDER = mysqli_query($con, "UPDATE customers SET balance=balance-'$amt' WHERE accno=$sacc");

									$result_RECEIVER = mysqli_query($con, "UPDATE customers SET balance=balance+'$amt' WHERE accno=$racc");

									$seql = "INSERT INTO transfers(send_acc,rec_acc,amt) VALUES (".$sacc.",".$racc.",".$amt.")";
									if ($con->query($seql) === TRUE)
									{
					  						echo "<p>Amount Transferred Succesfully!<br><br>
					  						".$sname."<span style='font-size:45px;'>&#8594;</span>".$rname."</p>
												<a href='cust.php'>
												<input id='sub'type='submit' class='btn btn-lg btn-outline-primary'value='View All Customers'>
												</a>";
									}
									else
									{
										  echo "Error: " . $sql . "<br>" . $con->error;
									}

								}
							}
							else
							{
								echo "<p>Account Exists but Name Incorrect</p>
				    			<a href='cust.php'>
				  			  	<input id='sub' class='btn btn-lg btn-outline-primary' type='submit' value='View All Customers'>
						        </a>";
							}

						}
						else
						{
							echo "<p>Receiver Account does not exist</p>
								<a href='cust.php'>
								<input class='btn btn-lg btn-outline-primary'id='sub'type='submit' value='View All Customers'>
								</a>";
						}
					}

				}
			}

		?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script>
				ProgressCountdown(5,'pageBeginCountdownText').
				then(value => alert('Redirecting...'));
				function ProgressCountdown(timeleft,  text) 
				{
					return new Promise((resolve, reject) => 
					{
						var countdownTimer = setInterval(() => 
						{
							timeleft--;
							document.getElementById(text).textContent = timeleft;
							if (timeleft <= 0) 
							{
								clearInterval(countdownTimer);
								resolve(true);
							}
						}, 1000);
					});
				}
			setTimeout(function(){ window.location = "cust.php"; },6000);
		</script>
	</body>	
</html>
