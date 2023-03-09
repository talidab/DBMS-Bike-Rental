<?php
	$id=$_GET['id'];
	include "db_connect.php";
	mysqli_query($conn,"delete from `agenti` where IdAgent='$id'");
	header('location:agenti.php');
?>