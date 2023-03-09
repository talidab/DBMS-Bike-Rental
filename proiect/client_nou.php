<?php 
	include('functions.php');
?>

<!DOCTYPE html>
<html>
<head>
<title>Client nou</title>
<link rel="stylesheet" type="text/css" href="style3.css">

  <body>
  <center>
	<div class="header">
	<h2> Adaugă un client nou </h2>
	</div>
	<form name = "formClient" method = "post" action = "add_client.php">
	<?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
	
	<p>
	<div class = "input-group">
	<label for = "Nume"> Nume:</label>
	<input type = "text" name = "txtNume" id = "txtNume" placeholder="Nume">
	</div>
	</p>

	<p>
	<div class = "input-group">
	<label for = "Prenume"> Prenume: </label>
	<input type = "text" name = "txtPrenume" id = "txtPrenume" placeholder="Prenume">
	</div>
	</p>

	<p>
	<div class = "input-group">
	<label for = "Email"> E-mail: </label>
	<input type = "text" name = "txtEmail" id = "txtEmail" placeholder="email@yahoo.com">
 	</div>
	</p>

	<p>
	<div class = "input-group">
	<label for = "Telefon"> Telefon: </label>
	<input type = "text" name = "txtTelefon" id = "txtTelefon" placeholder="0712345678">
	</div>
	</p>

	<p>
	<div class = "input-group">
	<label for = "Parola"> Parola: </label>
	<input type = "password" name = "txtParola" id = "txtParola" placeholder="********">
	</div>
	</p>
	
	<p>
	<div class = "input-group">
	<input type="submit" class = "btn" name="Trimite" id="Trimite" value="Trimite">
	</div>
	</p>

	<p>
	<div class = "input-group">
	<input type=reset class = "btn" value="Resetează">
	</div>
	<p>

	<div class = "input-group">
	<input type="button" class = "btn" value="Înapoi" onclick="history.back()">
	</div>

  </form>
  </center>
  </body>
</html>

