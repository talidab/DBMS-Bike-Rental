<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'proiect');

// variable declaration
$nume 	  = "";
$prenume  = "";
$email    = "";
$telefon  = "";
$parola   = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['Submit'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $nume, $prenume, $email, $telefon, $parola;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$nume    =  e($_POST['txtNume']);
	$prenume    =  e($_POST['txtPreume']);
	$email       =  e($_POST['txtEmail']);
	$telefon  =  e($_POST['txtTelefon']);
	$parola =  e($_POST['txtParola']);

	// form validation: ensure that the form is correctly filled
	if (empty($nume)) { 
		array_push($errors, "Iontroduceti nume!"); 
	}
	if (empty($prenume)) { 
		array_push($errors, "Introduceti prenume!"); 
	}
	if (empty($email)) { 
		array_push($errors, "Introduceti email!"); 
	}
	if (empty($telefon)) { 
		array_push($errors, "Introduceti telefon!"); 
	}
	if (empty($parola)) { 
		array_push($errors, "Introduceti parola!"); 
	}


	// register user if there are no errors in the form
	if (count($errors) == 0) {
		//$password = md5($password_1);//encrypt the password before saving in the database

		//if (isset($_POST['user_type'])) {
			//$user_type = e($_POST['user_type']);
			$query = "INSERT INTO `clienti` (`IdClient`, `Nume`, `Prenume`, `Parola`, `Telefon`, `Email`)
					 VALUES ('0', '$nume', '$prenume', '$parola', '$telefon', '$email')";
			$rs = mysqli_query($db, $query);
			if($rs)
	{
		echo "Cont creat cu succes!";
	}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}