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

	mysqli_query($conn,"update `clienti` set Nume='$nume', Prenume='$prenume', Email='$email', Telefon='$telefon', Parola='$parola' where IdClient='$id'");
	header('location:clienti.php');
?>