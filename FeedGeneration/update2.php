<?php
require 'connection.php';
if(isset($_GET['id']) && !empty($_GET['id']))
{
    $id = $_GET['id'];
	echo $id;

    $update = "UPDATE  feedfiles SET file_status = '".$id."' ORDER BY file_id DESC LIMIT 1";

    if (mysqli_query($conn, $update))
    {
        echo "Record updated successfully";
    } 
    else 
    {
        echo "Error updating record: " . mysqli_error($conn);
    }
    die;
}
?>