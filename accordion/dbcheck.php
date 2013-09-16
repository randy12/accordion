<?php
	$con=mysqli_connect('localhost','vidhi','vidhi','phototagging');
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	$result = mysqli_query($con,'SELECT Name FROM tag_names');
	$names=array();
	while($row = mysqli_fetch_array($result))
	{
     $names[] = $row['Name'];
	} 
	 $namefetch=$_REQUEST['name'];
	 foreach($names as $item)
	{
		if($item==$namefetch)
		return '0';
		else return '1';
	}
?>