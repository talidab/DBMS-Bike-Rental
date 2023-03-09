<!DOCTYPE html>
<html>
<head>
<br><br>
<title>Centru Inchirieri Biciclete</title>

<link rel="stylesheet" type="text/css" href="style4.css">

</head>
<center>
		<h1><b><font color="#003366" face="Georgia"> Bine ați venit la centrul de închirieri biciclete! </font></h1>
</center>
<div class="header">
        <h2>LOGIN</h2>
</div>

<body>
    <center>
     <form method="post" action="login.php">
        
     <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <div class = "input-group">
        <label>E-mail:</label>
        <input type="text" name="email" placeholder="E-mail"><br><br>
        </div>
        

        <div class = "input-group">
        <label>Parola:</label>
        <input type="password" name="parola" placeholder="Parola"><br><br> 
        </div>

        <div class = "input-group">
        <button type="submit" class = "btn" >Login</button>
        </div>
     <p>
     <div class = "input-group">
        <a href = "register.php"> Creează cont nou </a>
      </div>
        </p>
        </form>
    </center>
</body>
</html>