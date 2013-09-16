<?php
	//sleep(100);
	//$names=array('Anusha','Anamika','Karan','Jay','Shiv','Zinal','Bhuta','Ram','Riya','Austin');
	$con=mysql_connect('localhost',"vidhi","vidhi","phototagging");
	/*if (mysql_connect_errno($con))
	{
	echo "Failed to connect to MySQL: " . mysql_error();
	} */
	$result = mysql_query("SELECT Name FROM tag_names");
	$names=array();
	//while($row = mysql_fetch_array($result)){
     $names[] = $result;
	//}
	$namefetch=$_REQUEST["name"];
	//echo $namefetch;
	//$length=count($names);
	$matchednames=array("");
	$counter=0;
	if($namefetch!="" || $namefetch!=null)
	{
	foreach($names as $item)
	{
		$pos=strpos($item,$namefetch);
		if($pos !== false)
		{
			$matchednames[$counter++]=$item;
		}
	}
	foreach($matchednames as $array)
	{
		echo "<div class='object1'>" . $array . "</div>";
	}
	
	}
?>