<?php
	$id=$_GET['id'];
	include "db_connect.php";
	mysqli_query($conn,"delete from `clienti` where IdClient='$id'");
	header('location:clienti.php');
?>