<?php
	//sleep(100);
	//$names=array('Anusha','Anamika','Karan','Jay','Shiv','Zinal','Bhuta','Ram','Riya','Austin');
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
	
	/*for($i=0;$i<mysqli_num_fields($result);$i++)
	{	$row= mysqli_fetch_row($result);
		$names[$i] = $row[$i];
	}  */
	$namefetch=$_REQUEST['name'];
	$matchednames=array("");
	$counter=0;
	if($namefetch!="" || $namefetch!=null)
	{
	foreach($names as $item)
	{
		$pos=strpos($item,$namefetch);
		if($pos !== false)
		{
			$matchednames[]=$item;
		}
	}
	
		foreach($matchednames as $array)
		{ 
			if($array!="")
				echo "<div class='object'>" . $array . "</div>";
		}
	
	
	}
?>