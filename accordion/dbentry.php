<?php
	$con=mysqli_connect('localhost','vidhi','vidhi','phototagging');
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	 $namefetch=$_REQUEST['name2'];
	 $x=$_REQUEST['xcord'];
	 $y=$_REQUEST['ycord'];
	 if($namefetch!="" || $namefetch!=null)
	 {
	$result = "INSERT INTO tag_names(Name,X,Y) VALUES ('".$namefetch."','".$x."','".$y."')";
	if (!mysqli_query($con,$result))
	  {
	  die('Error: ' . mysqli_error($con));
	  }
		echo "1 record added";
		}
	mysqli_close($con);
?>