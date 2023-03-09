<!DOCTYPE html>

<html>
<br><br>
<head>

    <title>HOME</title>
    <link rel="stylesheet" type="text/css" href="style2.css">

</head>

<body>
<center>
    <div class = "header">
        <h2> Home Page <h2>
    </div>
    <div class = "content">
    
    <?php if(isset($_SESSION['succes'])) : ?>
    <div class = "error succes">
        <?php
            echo $_SESSION['succes'];
            unset($_SESSION['succes']);
            ?>
    </div>
    <?php endif ?>

    <div class = "profile_info">
	<h3><b><font color="#003366" face="Georgia"> Te-ai logat cu succes!</font></h3>
    <br>
    
    

     <br><br>
    <a href = "logout.php">
         <button type = "submit" class = "btn" > Logout </button>
        </a>

    </div>

</div>
</center>
</body>

</html>