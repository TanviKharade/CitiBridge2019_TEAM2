<?php
require 'connection.php';
session_start();

if(isset($_POST['submit']))
{
$name=$_FILES['file']['name'];
$temp=$_FILES['file']['tmp_name'] ;
$tableName="transactionfiles";

move_uploaded_file($temp,"upload/".$name);
$url="http://localhost/FeedGeneration/upload/$name";
 
$sql="INSERT INTO $tableName (DocumentLink) VALUES ('$url')";

$result=mysqli_query($conn,$sql);
	if($result)
	{
		
		echo "Solution is Uploaded Successfully..!!";
		header("refresh:0,url=upload.php");
	}
else
{
	
	echo "Error:" ;
}



	
}


?>


<html>
<head>
<meta charset="utf-8">
<title>Student Participate</title>
<link rel="icon" href="icon.jpg">
<style type="text/css">

h1
{
	font-family: serif;
	font-size: 50px;
}
body
{
	background-image: url("greybkgrnd.jpg");
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
	<div class="image">
	<img src="logo.jpg" style="max-width:10%">
	<div class="text"><p style="color:#000080;font-size:40px;margin-left:-10%">ZILA VIKAS MANCH</p>
		<p style="color:blue;font-size:30px;align:center">Student Registration</p>
	</div>
</div>
<div id="login">
<form action=".php" method="post" enctype="multipart/form-data" class="simpleform">
<fieldset>
<p><input type="file" name="file" placeholder="No file chosen" required></p>
<p><input type="submit" name="submit" onclick="myFunction()"></p>

</fieldset>
</form>
</div> <!-- end login -->

<script>
	function myFunction() 
	{
	setTimeout(function(){alert("You submitted the solution..!!!");},10000);
	}

	</script>
<?php

?>


</body>
</html>



<?php
mysqli_close($conn);




?>