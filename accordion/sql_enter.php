<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body style="background-position:50% 10%">

<?php
$database="mers";
	$link = mysql_connect('localhost', 'pragya','rai');// ,'mers');
	@mysql_select_db($database) or die( "Unable to select database");
	if (!$link) {
		die('Could not connect: ' . mysql_error());
	}
	$T0 = $_GET['T0'];
	$T1 = $_GET['T1'];
    $T2 = $_GET['T2'];
	$T3 = $_GET['T3'];
	$T4 = $_GET['T4'];
	$rt=mysql_query("SELECT * FROM ".$T4." ");
$details= mysql_fetch_row($rt);
for ($i = 5; $i <mysql_num_fields($rt); $i++) {
    $meta = mysql_fetch_field($rt, $i);
    if($meta->name=='Total')
	{
	break;
	}
	$array[$i]=$meta->name;
	$name = "field_";
	$Tb[$i] = $_GET['field_'.$i];
	}
	$k=$i;
	$Tb[$k]=0;
	for($j=5;$j<$i;$j++)

	{
	$Tb[$k] =$Tb[$j]+$Tb[$k];
    }
	$total=$Tb[$k];
	$i++;
	$Tb[$i]=1;
	$i++;
	$Tb[$i]=$_GET['field_'.$i];
	if($i==12)
{
$gt=500;
$per=($total*100)/$gt;
    mysql_query("INSERT INTO `".$T4."` VALUES ('".$T0."','".$T1."','".$T2."','".$T3."','".$T4."','".$Tb[5]."','".$Tb[6]."','".$Tb[7]."','".$Tb[8]."','".$Tb[9]."','".$Tb[10]."','".$Tb[11]."','".$Tb[12]."','".$gt."','".$per."')");
}
if($i==13)
{
$gt=600;
$per=($total*100)/$gt;
    mysql_query("INSERT INTO `".$T4."` VALUES ('".$T0."','".$T1."','".$T2."','".$T3."','".$T4."','".$Tb[5]."','".$Tb[6]."','".$Tb[7]."','".$Tb[8]."','".$Tb[9]."','".$Tb[10]."','".$Tb[11]."','".$Tb[12]."','".$Tb[13]."','".$gt."','".$per."')");
}
if($i==14)
{
$gt=700;
$per=($total*100)/$gt;
echo "in 14";
mysql_query("INSERT INTO `".$T4."` VALUES ('".$T0."','".$T1."','".$T2."','".$T3."','".$T4."','".$Tb[5]."','".$Tb[6]."','".$Tb[7]."','".$Tb[8]."','".$Tb[9]."','".$Tb[10]."','".$Tb[11]."','".$Tb[12]."','".$Tb[13]."','".$Tb[14]."','".$gt."','".$per."')");
}
if($i==15)
	{
	echo "in 15";
mysql_query("INSERT INTO `".$T4."` VALUES ('".$T0."','".$T1."','".$T2."','".$T3."','".$T4."','".$Tb[5]."','".$Tb[6]."','".$Tb[7]."','".$Tb[8]."','".$Tb[9]."','".$Tb[10]."','".$Tb[11]."','".$Tb[12]."','".$Tb[13]."','".$Tb[14]."','".$Tb[15]."')");
}
echo "values submitted";
	mysql_close($link);
	//($ar[0],$ar[1],$ar[2],$ar[3],$ar[4],$ar[5],$ar[6],$ar[7],$ar[8],$ar[9],$ar[10],$ar[11],$ar[12],$ar[13],$ar[14])*/
	?>
</body>
</html>
