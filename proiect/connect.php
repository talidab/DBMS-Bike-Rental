<?php

	$db = mysqli_connect('localhost', 'root', '', 'proiect');

	if(isset($_POST['txtNume']) && isset($_POST['txtPrenume']) && isset($_POST['txtEmail']) && isset($_POST['txtTelefon']) && isset($_POST['txtParola']))
	{
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

			if (empty($nume)) { 
				header("Location: register.php?error=Introduceti nume!");
				exit();
			}
			else
			if (empty($prenume)) { 
				header("Location: register.php?error=Introduceti prenume!");
				exit();
			}
			else
			if (empty($email)) { 
				header("Location: register.php?error=Introduceti email!");
				exit();
			}
			else
			if (empty($telefon)) { 
				header("Location: register.php?error=Introduceti telefon!");
				exit();
			}
			else
			if (empty($parola)) { 
				header("Location: register.php?error=Introduceti parola!");
				exit();
			}
			else
			{
				$query = "INSERT INTO `clienti` (`IdClient`, `Nume`, `Prenume`, `Parola`, `Telefon`, `Email`)
					 VALUES ('0', '$nume', '$prenume', '$parola', '$telefon', '$email')";
				$rs = mysqli_query($db, $query);
				if($rs)
				{
					//echo "Cont creat cu succes!";
					header("Location: home.php");
				}
			}
		}	
	
?>