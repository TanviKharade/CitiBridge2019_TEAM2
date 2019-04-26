<?php
require 'connection.php';
session_start();



$query="SELECT * FROM transactionfiles ORDER BY file_id DESC LIMIT 1";
	$result=mysqli_query($conn,$query);
	while($row=mysqli_fetch_array($result))
	{
		$url=$row['files'];
		$name = $row['file_name'];
		//echo $url;
		//echo $name;
		$fileid = $row['file_status'];
		
		//echo file_get_contents($url);
		
	}
	
	


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
if($fileid == 1)
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
</body>
</html>

