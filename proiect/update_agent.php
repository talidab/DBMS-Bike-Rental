<?php
	include "db_connect.php";
	$id=$_GET['id'];
 
	function validate($data)
			{
				$data = trim($data);
				$data = stripslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

	$nume    	= validate($_POST['txtNume']);
	$prenume    = validate($_POST['txtPrenume']);
	$email      = validate($_POST['txtEmail']);
	$telefon 	= validate($_POST['txtTelefon']);
	$parola 	= validate($_POST['txtParola']);

	mysqli_query($conn,"update `agenti` set Nume='$nume', Prenume='$prenume', Email='$email', Telefon='$telefon', Parola='$parola' where IdAgent='$id'");
	header('location:agenti.php');
?>