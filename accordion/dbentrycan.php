<?php
	$con=mysqli_connect('localhost','vidhi','vidhi','phototagging');
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	 $namefetch=$_REQUEST['name3'];
	$result="DELETE FROM tag_names WHERE Name=('".$namefetch."')";
	if (!mysqli_query($con,$result))
	  {
	  die('Error: ' . mysqli_error($con));
	  }
		echo "1 record deleted";
	mysqli_close($con);
?>