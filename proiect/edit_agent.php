<?php
	include "db_connect.php";
	$id=$_GET['id'];
	$query=mysqli_query($conn,"select * from `agenti` where IdAgent='$id'");
	$row=mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html>
<head>
<title>Edit</title>
<link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
	<h2 class = "header">Edit</h2>
	<form method="POST" action="update_agent.php?id=<?php echo $id; ?>">
        <div class = "input-group">
		<label>Nume:</label><input type="text" value="<?php echo $row['Nume']; ?>" name="txtNume"><br>
        </div>

        <div class = "input-group">
        <label>Prenume:</label><input type="text" value="<?php echo $row['Prenume']; ?>" name="txtPrenume"><br>
        </div>

        <div class = "input-group">
        <label>Email:</label><input type="text" value="<?php echo $row['Email']; ?>" name="txtEmail"><br>
        </div>

        <div class = "input-group">
        <label>Telefon:</label><input type="text" value="<?php echo $row['Telefon']; ?>" name="txtTelefon"><br>
        </div>

        <div class = "input-group">
        <label>Parola:</label><input type="text" value="<?php echo $row['Parola']; ?>" name="txtParola"><br>
		</div>
        <center>
        <div class = "input-group">
	        <input type="submit" class = "btn" name="Salveaza" id="Salveaza" value="Salvează">
	    </div>
        <form>
		<div class = "input-group">
		    <input type="button" class = "btn" value="Înapoi" onclick="history.back()">
		    </div>
	    </form>

        </center>
	</form>
</body>
</html>