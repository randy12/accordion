<?php
	$con=mysqli_connect('localhost','vidhi','vidhi','phototagging');
	if (mysqli_connect_errno())
	  {
	  echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
	$result = mysqli_query($con,"SELECT * from tag_names");
	$names=array();
	$xcord=array();
	$ycord=array();
	$idarray=array();
	$sendarray=array();
	while($row = mysqli_fetch_assoc($result))
	{
     $names[] = $row['Name'];
	 $xcord[] = $row['X'];
	 $ycord[] = $row['Y'];
	 $idarray[]=$row['ID'];
	 $sendarray[]=$row;
	} 
	echo json_encode($sendarray);
	mysqli_close($con);
?>