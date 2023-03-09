<!DOCTYPE html>

<html>
<br><br>
<head>

    <title>HOME Clienți</title>
    <link rel="stylesheet" type="text/css" href="style4.css">

</head>


<body bgcolor="#e6f2ff">
<center>
    <div class = "header">
        <h2> Home Page Clienți <h2>
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

    <table class = "table">
        <tr>
            <th> Id Client </th>
            <th> Nume </th>
            <th> Prenume </th>
            <th> Telefon </th>
            <th> Email </th>
            <th> Opțiuni </th>
        </tr>
        <?php
        $password = "";
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT * FROM clienti";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["IdClient"];
  $field2name = $row["Nume"];
  $field3name = $row["Prenume"];
  $field4name = $row["Telefon"];
  $field5name = $row["Email"]; 
        ?>
         <tr> 
            <td><?php echo $field1name ?></td> 
            <td><?php echo $field2name ?></td> 
            <td><?php echo $field3name ?></td> 
            <td><?php echo $field4name ?></td> 
            <td><?php echo $field5name ?></td> 
            <td>
                <a href = "edit_client.php?id=<?php echo $field1name ?>">Edit</a>
                <a href = "delete_client.php?id=<?php echo $field1name ?>">Delete</a>
            </td>
        </tr>
        <?php 
}
$result->free();
} 
        ?>
        </table>

    <br>
    
    <div class = "input-group">
         <a href = "client_nou.php"> 
            <button type = "submit" class = "btn"> Adaugă un client nou </button>
        </a>
    </div>
    
		<div>
        <a href = "admin.php">
		<input type="button" class = "btn" value="Înapoi">
        </a>
		</div>
	

</div>
<div class = "header">
        <h2> Clienții care nu au închiriat nici o bicicletă în anul <h2>
            <form action = "clienti.php" method = "GET" >
            An <select name = "an">
            <option value = "2019">2019</option>
            <option value = "2020">2020</option>
            <option value = "2021">2021</option>
            <option value = "2022">2022</option>
            <option value = "2023">2023</option>
            </select>
            <br><br>
            <input type = "submit" class = "btn" value = "Trimite"></input>
            </form>
    </div>

    <div class = "content">
    <table class = "table">
        <tr>
            <th> Client </th>
        </tr>
        <?php
        if($_GET){
            $an = $_GET['an'];
            echo $an;
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT  C.Nume as Nume, C.Prenume as Prenume
                    FROM `clienti` C 
                    WHERE C.IdClient NOT IN (SELECT C2.IdClient
                                            FROM `clienti` C2 JOIN `contracte` CC ON C2.IdClient = CC.IdClient
                                            WHERE YEAR(CC.Data) = '$an'
                                            GROUP BY C2.IdClient)
                    ORDER BY C.Nume";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Nume"];
  $field2name = $row["Prenume"];

        ?>
         <tr> 
            <td><?php echo "$field1name $field2name"?></td> 
        </tr>
        <?php 
}
$result->free();
} 
        }
        ?>
        </table>

    <br>

        <div>
        <a href = "admin.php">
		<input type="button" class = "btn" value="Înapoi">
        </a>
		</div>

    </div>

    <div class = "header">
        <h2> Clienții anului<h2>
        <form action = "clienti.php" method = "GET" >
            An <select name = "an">
            <option value = "2019">2019</option>
            <option value = "2020">2020</option>
            <option value = "2021">2021</option>
            <option value = "2022">2022</option>
            <option value = "2023">2023</option>
            </select>
            <br><br>
            <input type = "submit" class = "btn" value = "Trimite"></input>
            </form>
    </div>

    <div class = "content">
    <table class = "table">
        <tr>
            <th> Client </th>
            <th> Număr contracte încheiate </th>
        </tr>
        <?php
        if($_GET){
            $an = $_GET['an'];
            echo $an;
        $mysqli = new mysqli('localhost', 'root', '', 'proiect');
        $query = "SELECT  C.Nume as Nume, C.Prenume as Prenume, COUNT(CC.IdContract) as NrContracte
                FROM `clienti` C JOIN `contracte` CC ON CC.IdClient = C.IdClient
                WHERE YEAR(CC.Data) = '$an'
                GROUP BY C.Nume
                HAVING COUNT(CC.IdContract) >= ALL (SELECT COUNT(CC2.IdContract)
                                                    FROM `contracte` CC2
                                                    GROUP BY CC2.IdClient)";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Nume"];
  $field2name = $row["Prenume"];
  $field3name = $row["NrContracte"];

        ?>
         <tr> 
            <td><?php echo "$field1name $field2name"?></td> 
            <td><?php echo $field3name ?></td> 
        </tr>
        <?php 
}
$result->free();
} 
        }
        ?>
        </table>

    <br>

        <div>
        <a href = "admin.php">
		<input type="button" class = "btn" value="Înapoi">
        </a>
		</div>

    </div>

    

    <div class = "header">
        <h2> Clienții care au platit cel mai mult <h2>
    </div>

    <div class = "content">
    <table class = "table">
        <tr>
            <th> Client </th>
            <th> Pret </th>
        </tr>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'proiect');
        $query = "SELECT C.Nume, C.Prenume, CT.Pret
        FROM `clienti` C JOIN `contracte` CT ON C.IdClient = CT.IdClient
        WHERE EXISTS
        (SELECT MAX(CT2.Pret)
        FROM `clienti` C2 JOIN `contracte` CT2 on C2.IdClient = CT2.IdClient
        HAVING MAX(CT2.Pret) = CT.Pret)
        ";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Nume"];
  $field2name = $row["Prenume"];
  $field3name = $row["Pret"];

        ?>
         <tr> 
            <td><?php echo "$field1name $field2name"?></td> 
            <td><?php echo $field3name ?></td> 
        </tr>
        <?php 
}
$result->free();
} 
        ?>
        </table>
        </div>
</center>
</body>

</html>