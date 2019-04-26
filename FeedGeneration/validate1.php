
<?php
require 'connection.php';
$status = $_GET['Status']; 
//echo $status; 
?>
<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link href="NEWHMPGSTYLE.css" rel="stylesheet">
 



<div align="center">

<h1>FEED FILE</h1>
<body background="pic.jpg">


</div>

<div class="w3-container">
 

  <div class="w3-bar w3-black">
    <button class="w3-bar-item w3-button tablink w3-red" onclick="location.href = 'tables2.php?Status=<?php echo $status;?>';">Validate Success</button>
    <button class="w3-bar-item w3-button tablink w3-red" onclick="location.href = 'table2.php?Status=<?php echo $status;?>';">Validate Fail</button>
	 <button class="w3-bar-item w3-button tablink w3-red" style ="float:right" onclick="location.href = 'validate.php';">Home</button>
  </div>
 
  

			
     
   

 


<script>
function openCity(evt, cityName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("city");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}
</script>

</body>
</html>


