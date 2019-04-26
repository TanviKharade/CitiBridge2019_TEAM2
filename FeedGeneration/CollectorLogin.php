<?php 
require 'connection.php';
session_start();
$bit=0;
$flag=0;
$user_Name=$_POST['CollectorID'];
$user_Pass=$_POST['Password'];
if($user_Pass == 'admin')
{
    $mysql_qry="INSERT INTO `entries`(user_name,user_pass) VALUES ('$user_Name','$user_Pass');";
    $result =mysqli_query($conn,$mysql_qry);
    if($result)
    {
        //echo $_SESSION["UserId"];
        
        header("refresh:0,url=validate.php");

         
}
else
{
   // echo "password incorrect";
    header("refresh:0,url=Login.html");
}
}
else
{
    header("refresh:0,url=Login.html");
}
mysqli_close($conn);
?>