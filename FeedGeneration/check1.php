<?php
require 'connection.php';
session_start();
$c1=0;
$c2=0;
$c3=0;
$c4=0;
$c5=0;
$flag1=0;

$query="SELECT * FROM transactionfiles WHERE file_status = 0 ORDER BY file_id DESC LIMIT 1";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result))
	{
		$url=$row['files'];
		$name = $row['file_name'];
		//echo $url;
		echo $name;
		//echo $row['file_id'];
		$fileid = $row['file_status'];
		echo $fileid;
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
</head>
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
if($result == FALSE)
{
$f = fopen($name, "r");
$flag = true;
while (($line = fgetcsv($f)) !== false) {
	if($flag)
	{
		$flag = false; continue;
	}
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

<?php }fclose($f);}?>
	

</table>
</div>
<div class="wrapper">
<a href="validate1.html" onclick="testing()">Feed Generated</a>
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
