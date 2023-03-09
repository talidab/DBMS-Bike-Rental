<?php 

session_start(); 

include('functions.php');
include "db_connect.php";

$id=$_GET['id'];
$query=mysqli_query($conn,"select * from `clienti` where IdClient='$id'");
$row=mysqli_fetch_array($query);

if (isset($_POST['email']) && isset($_POST['parola']))
{

    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['email']);

    $pass = validate($_POST['parola']);

    if (empty($uname)) {

        header("Location: index.php?error=Introduceti email!");

        exit();

    }else if(empty($pass)){

        header("Location: index.php?error=Introduceti parola!");

        exit();

    }else if($uname == "admin@yahoo.com" && $pass == "parolaadmin"){
        header("Location: admin.php");

        exit();
    }
    else{

        $sql = "SELECT * FROM clienti WHERE Email ='$uname' AND Parola='$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($row['Email'] === $uname && $row['Parola'] === $pass) {
                echo "Logged in!";
                $_SESSION['Email'] = $row['Email'];
                $_SESSION['name'] = $row['name'];
                $_SESSION['id'] = $row['id'];

                header("Location: home.php?");

                exit();

            }
            else{

                header("Location: index.php?error=Email sau parola incorecte!");

                exit();

            }

        }else{

            header("Location: index.php?error=Email sau parola incorecte!");

            exit();

        }

    }

}else{

    header("Location: index.php");

    exit();

}