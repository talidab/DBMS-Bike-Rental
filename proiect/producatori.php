<!DOCTYPE html>

<html>
<br><br>
<head>

    <title>HOME Producători</title>
    <link rel="stylesheet" type="text/css" href="style3.css">

</head>


<body bgcolor="#e6f2ff">
<center>
    <div class = "header">
        <h2> Home Page Producători <h2>
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
            <th> Id  </th>
            <th> Denumire </th>
            <th> Țară </th>
            <th> Oraș </th>
            <th> Județ </th>
            <th> Stradă </th>
            <th> Număr </th>
            <th> Telefon </th>
            <th> Email </th>
        </tr>
        <?php
        $password = "";
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT * FROM producatori";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["IdProducator"];
  $field2name = $row["Denumire"];
  $field3name = $row["Tara"];
  $field4name = $row["Oras"];
  $field5name = $row["Judet"];
  $field6name = $row["Strada"];
  $field7name = $row["Numar"];
  $field8name = $row["Telefon"];
  $field9name = $row["Email"]; 
        ?>
         <tr> 
            <td><?php echo $field1name ?></td> 
            <td><?php echo $field2name ?></td> 
            <td><?php echo $field3name ?></td> 
            <td><?php echo $field4name ?></td> 
            <td><?php echo $field5name ?></td> 
            <td><?php echo $field6name ?></td>
            <td><?php echo $field7name ?></td>
            <td><?php echo $field8name ?></td>
            <td><?php echo $field9name ?></td>
        </tr>
        <?php 
}
$result->free();
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
        <h2> Producatorii ordonati dupa numarul de biciclete produse <h2>
</div>

    <div class = "content">
    <table class = "table">
        <tr>
            <th> Denumire producator </th>
        </tr>
        <?php
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT P.Denumire
        FROM `producatori` P
        ORDER BY (SELECT COUNT(*)
                  FROM `biciclete` B 
                  WHERE P.IdProducator = B.IdProducator) DESC";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Denumire"];

        ?>
         <tr> 
            <td><?php echo "$field1name" ?></td> 

        </tr>
        <?php 
}
$result->free();
} 
        ?>
        </table>

    <br>
    
		<div>
        <a href = "admin.php">
		    <input type="button" class = "btn" value="Înapoi">
        </a>
		</div>
</center>
</body>

</html>