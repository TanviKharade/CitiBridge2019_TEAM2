<?php
	/*echo $flag1;
	$inputCsv = $name;
$outputCsv = $name;
 if (false !== ($ih = fopen($inputCsv, 'r'))) {
$oh = fopen($outputCsv, 'w');
while (false !== ($data = fgetcsv($ih))) {
    // this is where you build your new row
	$data[2] = $data[2].$data[3];
	$data[4] = $data[4].$data[5];
	//echo $data[2];
	//echo $data[4];
    $outputData = array($data[0], $data[1], $data[2], $data[4], $data[6]);
    fputcsv($oh, $outputData);
}

fclose($ih);
fclose($oh);
}

?>
<?php
 $mysql_qry="select * from feedfiles where file_name like '$outputCsv';";
$result =mysqli_query($conn,$mysql_qry);

if(mysqli_num_rows($result)>0)
{
	//echo "Filename  already  exist";
   header("refresh:2,url=tables.php");
}
else
{
$sql="INSERT INTO `feedfiles`(file_name,file_status) VALUES ('$outputCsv',0);";
$result=mysqli_query($conn,$sql);
	if($result)
	{
		//echo "uplodad";
		header("refresh:0,url=tables.php");
	}
    else
    {
	   header("refresh:0,url=validate.php");
	   echo "Error:" ;
    }
	echo $flag1;
   $flag1 = 1;
   echo $flag1;

}
$f = fopen($outputCsv, "r");
    $flag = true;
	$check = [];
	$counter =0;
	global $c1,$c2,$c3,$c4,$c5;
    while (($line = fgetcsv($f)) !== false) {
	if($flag)
	{
		$flag = false; continue;
	}
	$check =[];
	$counter =0;
	$c1=0;$c2=0;$c3=0;$c4=0;$c5=0;
	foreach ($line as $cell) {
	$check[$counter] = htmlspecialchars($cell);
	$counter++;
	
	echo '<br>';
 }
 $c1 = $check[0];
 $c2 = $check[1];
 $c3 = $check[2];
 $c4 = $check[3];
 $c5 = $check[4];
	}*/

//}
	?>
