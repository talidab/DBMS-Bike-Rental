<!DOCTYPE html>

<html>
<br><br>
<head>

    <title>HOME Agenți</title>
    <link rel="stylesheet" type="text/css" href="style4.css">
</head>


<body>
<center>
    <div class = "header">
        <h2> Home Page Agenți <h2>
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
            <th> Id Agent </th>
            <th> Nume </th>
            <th> Prenume </th>
            <th> Telefon </th>
            <th> Email </th>
            <th> Opțiuni </th>
        </tr>
        <?php
        $password = "";
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT * FROM agenti";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["IdAgent"];
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
                <a href = "edit_agent.php?id=<?php echo $field1name ?>">Edit</a>
                <a href = "delete_agent.php?id=<?php echo $field1name ?>">Delete</a>
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
         <a href = "agent_nou.php"> 
            <button type = "submit" class = "btn"> Adaugă un agent nou </button>
        </a>
    </div>

    <div>
        <a href = "admin.php">
		<input type="button" class = "btn" value="Înapoi">
        </a>
	</div>
	
</div>

<div class = "header">
    <h3> Agentii care au contracte inchiriate in anul si numarul acestora </h3>
    <form action = "agenti.php" metod = "GET">
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
            <th> Agent </th>
            <th> An </th>
            <th> Numar Contracte </th>
        </tr>
        <?php
        if($_GET){
        $an = $_GET['an'];
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT A.Nume as Nume, A.Prenume as Prenume, COUNT(C.IdContract) as NR_CONTRACTE_INCHIRIATE
                  FROM agenti A LEFT JOIN contracte C ON A.IdAgent = C.IdAgent 
                  WHERE YEAR(C.Data) = '$an'
                  GROUP BY A.Nume";

if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Nume"];
  $field2name = $row["Prenume"];
  $field3name = $row["NR_CONTRACTE_INCHIRIATE"];
        ?>
         <tr> 
            <td><?php echo "$field1name $field2name" ?></td>
            <td><?php echo "$an" ?></td>
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
    <h3> Agenții care nu au intermediat nici un contract în anul </h3>
    <form action = "agenti.php" metod = "GET">
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
            <th> Agent </th>
        </tr>
        <?php
        if($_GET){
        $an = $_GET['an'];
        echo $an;
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT A.Nume as Nume, A.Prenume as Prenume
                  FROM agenti A
                  WHERE A.IdAgent NOT IN (SELECT AA.IdAgent
                                          FROM agenti AA JOIN contracte C ON A.IdAgent = C.IdAgent
                                          WHERE YEAR(C.Data)='$an')";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Nume"];
  $field2name = $row["Prenume"];
        ?>
         <tr> 
            <td><?php echo "$field1name $field2name" ?></td> 
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

</center>
</body>

</html>