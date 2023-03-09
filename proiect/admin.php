<!DOCTYPE html>

<html>
<br><br>
<head>

    <title>HOME ADMIN</title>
    <link rel="stylesheet" type="text/css" href="style4.css">

</head>


<body bgcolor="#e6f2ff">
<center>
    <div class = "header">
        <h2> Home Page Admin <h2>
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
        
    <div>
         <a href = "clienti.php"> 
            <button type = "submit" class = "btn">&nbsp &nbsp &nbsp  Vezi lista clienților  &nbsp &nbsp &nbsp </button>
        </a>
    </div>
    <br>

    <div>
         <a href = "agenti.php">
            <button type = "submit" class = "btn">&nbsp &nbsp &nbsp Vezi lista agenților &nbsp &nbsp &nbsp</button>
        </a>
    </div>
    <br>

    <div>
         <a href = "producatori.php"> 
            <button type = "submit" class = "btn">&nbsp Vezi lista producătorilor &nbsp</button>
        </a>
    </div>
    <br>

    <div>
         <a href = "locatii.php"> 
            <button type = "submit" class = "btn">&nbsp &nbsp &nbsp Vezi lista locațiilor &nbsp &nbsp &nbsp</button>
        </a>
    </div>
    <br>

    <div>
         <a href = "biciclete.php"> 
            <button type = "submit" class = "btn">&nbsp &nbsp Vezi lista bicicletelor &nbsp &nbsp</button>
        </a>
    </div>
    <br>

    <div>
         <a href = "contracte.php"> 
            <button type = "submit" class = "btn">&nbsp&nbsp Vezi lista contractelor &nbsp&nbsp</button>
        </a>
    </div>
    <br>

    <div>
    <a href = "logout.php">
         <button type = "submit" class = "btn" > Logout </button>
        </a>
    </div>
    
</div>
</center>
</body>

</html>