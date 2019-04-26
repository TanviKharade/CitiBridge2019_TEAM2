<?php
require 'connection.php';
session_start();
$c1=0;
$c2=0;
$c3=0;
$c4=0;
$c5=0;
$c6=0;
$c7=0;
$test=0;
?>

<script> var c =0; </script>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>
<div align="center">
<h1>FEED FILE</h1>
</div>

<div class="w3-container">
 
<?php global $test;
?>
  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button tablink w3-red" >Upload File</button>
	<a href="validate.html" >Validate File</a>
  </div>
  
 <?php
 if(isset($_POST['submit']))
{
$name=$_FILES['file']['name'];
$temp=$_FILES['file']['tmp_name'] ;
$tableName="transactionfiles";

move_uploaded_file($temp,"upload/".$name);
$url="http://localhost/FeedGeneration/upload/$name";
 
$sql="INSERT INTO `transactionfiles`(files,file_name,file_status) VALUES ('$url','$name',0);";
$result=mysqli_query($conn,$sql);
	if($result)
	{
		
		echo "Solution is Uploaded Successfully..!!";
		header("refresh:0,url=validate.php");
	}
    else
    {
	   header("refresh:0,url=validate.php");
	   echo "Error:" ;
    }



	
}

 ?>
 
 <html>
<head>
<meta charset="utf-8">
<title></title>
<link rel="icon" href="icon.jpg">
<style type="text/css">

h1
{
	font-family: serif;
	font-size: 50px;
}
body
{
	
background-repeat:no-repeat;
background-size:100%;
color: black;
font-family: Arial;
line-height: 1.7em;
 margin: 0% 0% 0% 0% ;
}
footer
{
	margin-top: 40px;
	text-align: center;
	font-size: 17px;
	font-family: sans-serif;
}

form fieldset input[type="text"], input[type="password"] , input[type="file"],input[type='email']
{
	background-color: white;
border-style: solid;
color: #C0C0C0;
font-family:Arial;
font-size: 15px;
height: 50px;
padding: 0px 10px;
width: 400px;
margin-left:20px;
-webkit-appearance:none;
}

form fieldset input[type="submit"] , input[type="reset"] {
background-color:#0f408e ;
border: none;
border-style: groove;
border-color: #DCDCDC;
color: white;
cursor: pointer;
font-family: 'Open Sans', Arial, Helvetica, sans-serif;
height: 50px;
text-transform: uppercase;
margin-left:20px;
margin-top:10px;
width: 400px;
-webkit-appearance:none;
}

#login {
margin: 5% auto;
width: 500px;
}

.image
{
	position: relative;
}
.image .text
{
	position: absolute;
	top: 10%;
	left: 40%;
}
#hd
{
	font-size: 20px;
	font-family: serif;
}
.dropbtn {
    background-color: #D3D3D3;
    color: black;
    font-size: 15px;
    border-style: groove;
    cursor: pointer;
    height: 30px;
    width:162px;
}
 .required label: after
{
	color:#e32;
	content:'*';
	display:inline;
}
</style>
</head>
<body>
	
<div id="login">
<form action="validate.php" method="post" enctype="multipart/form-data" class="simpleform">
<fieldset>
<p><input type="file" name="file" placeholder="No file chosen" required></p>
<p><input type="submit" name="submit" onclick="myFunction()"></p>

</fieldset>
</form>
</div> <!-- end login -->





    
 <?php
$query="SELECT * FROM transactionfiles ORDER BY file_id DESC LIMIT 1";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result))
	{
		$url=$row['files'];
		$name = $row['file_name'];
		$rowid =$row['file_id'];
		//echo $url;
		//echo $name;
		
		//echo file_get_contents($url);
	}
	$f = fopen($name, "r");
    $flag = true;
	$check = [];
	$counter =0;
	global $c1,$c2,$c3,$c4,$c5,$c6,$c7;
    while (($line = fgetcsv($f)) !== false) {
	if($flag)
	{
		$flag = false; continue;
	}
	$check =[];
	$counter =0;
	$c1=0;$c2=0;$c3=0;$c4=0;$c5=0;$c6=0;$c7=0;
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
 $c6 = $check[5];
 $c7 = $check[6];
	//echo $c1;

?>
<script>
console.log("Iteration");
 testing();
 
</script>
	<?php } ?>
<script>

	function myFunction() 
	{
	setTimeout(function(){alert("You submitted the solution..!!!");},10);
	}

	function validatetransid()
	{
      var Transid = '<?php echo $c1 ?>';
	//alert(Transid);
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
	//alert(Payername);
    if( /[^a-zA-Z0-9]/.test( Payername ) ) {
       //alert('Input is not alphanumeric name payer');
	   return 1;
    }
	if(Payername.length <= 35)
	   {
		    //alert('Input is alphanumeric name & length=35');
		   return 0;
	   }  
	  
    return 1;      
 }
 function validatepayeeName()
 {
	var Payeename = '<?php echo $c5 ?>';
	//alert(Payeename);
    if( /[^a-zA-Z0-9]/.test( Payeename ) ) {
       //alert('Input is not alphanumeric payee name');
	   return 1;
    }
	if(Payeename.length <= 35)
	   {
		    //alert('Input is alphanumeric name & length=35');
		   return 0;
	   }  
	  
    return 1;      
 }
 function valdateAccpayer()
 {
	 var PayerAcc = '<?php echo $c4 ?>';
	//alert(PayerAcc);
    if( /[^a-zA-Z0-9]/.test( PayerAcc ) ) {
       //alert('Input is not alphanumeric account');
	   return 1;
    }
	if(PayerAcc.length == 12)
	   {
		    //alert('Input is alphanumeric account & length=12');
		   return 0;
	   }  
	  
    return 1;    
 }
 function valdateAccpayee()
 {
	 var PayeeAcc = '<?php echo $c4 ?>';
	//alert(PayeeAcc);
    if( /[^a-zA-Z0-9]/.test( PayeeAcc ) ) {
       //alert('Input is not alphanumeric account payee');
	   return 1;
    }
	if(PayeeAcc.length == 12)
	   {
		    //alert('Input is alphanumeric account payee & length=12');
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
	var Amt = '<?php echo $c7 ?>';
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
            //alert(xmlhttp.responseText);
        }
    };
    xmlhttp.open("GET", "update.php?id=" +id, true);
    xmlhttp.send();
}

/*function testing1()
{
	testing();
}*/

 function testing()
 {
	 //alert('Function called');
	// <?php echo $test ?> = validatedoc();
	var c = validatedoc();
	var fname='<?php echo $name ?>';
	var Transid = '<?php echo $c1 ?>';
	//alert("Transaction status"+ c);
	//console.log("Transaction status"+ c);
    updateId(c,fname,Transid);
	
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
		   if(valdateAccpayer()==0 && valdateAccpayee()==0)
		   {
			   if(isFutureDate()==0 && validateAmt()==0)
			   {
				   alert('succes!!');
				   return 0;
			   }
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