<?php
require 'connection.php';
session_start();
$c1=0;
$c2=0;
$c3=0;
$c4=0;
$c5=0;
$query="SELECT * FROM transactionfiles ORDER BY file_id DESC LIMIT 1";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result))
	{
		$url=$row['files'];
		$name = $row['file_name'];
		//echo $url;
		//echo $name;
		//echo $row['file_id'];
		$fileid = $row['file_status'];
		//echo $fileid;
		//echo file_get_contents($url);
		
	}
	//echo $row;

?>
<style>
table {
  width:100%;
}
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
}
th, td {
  padding: 15px;
  text-align: left;
}
table#t01 tr:nth-child(even) {
  background-color: #eee;
}
table#t01 tr:nth-child(odd) {
 background-color: #fff;
}
table#t01 th {
  background-color: black;
  color: white;
}
</style>
<style>
.button {
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
</style>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

</head>


	 <button class="w3-bar-item w3-button tablink w3-red" style ="float:right" onclick="location.href = 'validate.php';">Home</button>
 
  
  <br><br>
 
<div style="overflow-x:auto;">
<table id="t01">
  <tr>

    <th>Transaction_ref</th>
    <th>Value Date</th>
    <th>Payer Name</th>
	<th>Payer Account</th>
    <th>Payee Name</th>
	<th>payee Account</th>
    <th>Amount</th>
  </tr>

<?php
if($fileid == 0)
{
$f = fopen($name, "r");
$flag = True;
while (($line = fgetcsv($f)) !== false) {
	//echo 'Iteration';
	if($flag)
	{
		//echo 'Converted to false';
		$flag = False;
		continue;
	}
	//echo 'Helloo';
?>

  <tr>
  <?php
  $counter =0;
foreach ($line as $cell) {
	
?>
    <?php echo "<td>" . htmlspecialchars($cell) . "</td>"; ?>
	
	<?php
	}
	
       
		?>
 </tr>

<?php }fclose($f);

	$inputCsv = $name;
$outputCsv = 'try1.csv';
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

$mysql_qry="select * from feedfiles where file_name like '$outputCsv';";
$result =mysqli_query($conn,$mysql_qry);

if(mysqli_num_rows($result)>0)
{
	//echo "Filename  already  exist";
   //header("refresh:0,url=tables.php");
}
else
{
$sql="INSERT INTO `feedfiles`(file_name,file_status) VALUES ('$outputCsv',0);";
$result=mysqli_query($conn,$sql);
	if($result)
	{
		echo "uplodad";
		//header("refresh:0,url=tables.php");
	}
    else
    {
	   header("refresh:0,url=validate.php");
	   echo "Error:" ;
    }
	
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
	}



}?>
	

</table>
</div>
<div class="wrapper">
<a href="validate1.php?Status=<?php echo $fileid; ?>" onclick="testing()">Feed Generated</a>
</div>
<style>
.wrapper {
    text-align: center;
   
    padding: 50px 40px;
    font-size: 50px;


}

</style>
<script>
function validatetransid()
	{
      var Transid = '<?php echo $c1 ?>';
	alert(Transid);
    if( /[^a-zA-Z0-9]/.test( Transid ) ) {
       //alert('Input is not alphanumeric');
	   return 1;
    }
	if(Transid.length == 12)
	   {
		   // alert('Input is alphanumeric & length=12');
		   return 0;
	   }  
	  
    return 1;     
 }
 
 
 function validatepayerName()
 {
	var Payername = '<?php echo $c3 ?>';
	alert(Payername);
    if( /[^a-zA-Z0-9]/.test( Payername ) ) {
       //alert('Input is not alphanumeric name payer');
	   return 1;
    }
	if(Payername.length <= 50)
	   {
		    //alert('Input is alphanumeric name & length=35');
		   return 0;
	   }  
	  
    return 1;      
 }
 function validatepayeeName()
 {
	var Payeename = '<?php echo $c4 ?>';
	alert(Payeename);
    if( /[^a-zA-Z0-9]/.test( Payeename ) ) {
       //alert('Input is not alphanumeric payee name');
	   return 1;
    }
	if(Payeename.length <= 50)
	   {
		    //alert('Input is alphanumeric name & length=35');
		   return 0;
	   }  
	  
    return 1;      
 }
 
 
 function isFutureDate()
 {
	var date = '<?php echo $c2 ?>';
    var today = new Date();
	
	var currdate = today.getDate()+'/'+(today.getMonth()+1)+'/'+today.getFullYear();
	
    //alert(currdate);
    if(date.localeCompare(currdate) == 0)
	{
		//alert('Date working');
		return 0;
	}
	return 1;
	
}
function validateAmt()
{
	var Amt = '<?php echo $c5 ?>';
	if(Amt.length<=13)
	{
		return 0;
	}
	return 1;
}
function updateId(id)
{
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
        {
            alert(xmlhttp.responseText);
        }
    };
    xmlhttp.open("GET", "update2.php?id=" +id, true);
    xmlhttp.send();
}

 function testing()
 {
	 //alert('Function called');
	// <?php echo $test ?> = validatedoc();
	var c = validatedoc();
    updateId(c);
	if(c == 0)
	{
		
		return 0;
	}
	 //phpcall();
	 return 1;
 }
 var cnt =0;
 function validatedoc()
 {
	
  // var cnt = validatetransid();
   if(validatetransid()==0)
   {
	   if(validatepayerName()==0 && validatepayeeName() == 0)
	   {
		  
			   if(isFutureDate()==0 && validateAmt()==0)
			   {
				   //alert('succes!!');
				   return 0;
			   }
		   
	   }
   }
   else
   {
	   //alert('fail!!');
	   return 1;
   }
  // alert(cnt);
  return 1;
 }
</script>
 
</body>
</html>
<?php
	
mysqli_close($conn);

	


?>
