<!DOCTYPE html>

<html>
<br><br>
<head>

    <title>HOME Biciclete</title>
    <link rel="stylesheet" type="text/css" href="style4.css">

</head>


<body bgcolor="#e6f2ff">
<center>
    <div class = "header">
        <h2> Home Page Biciclete <h2>
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
            <th> Id Bicicletă  </th>
            <th> Producător </th>
            <th> Locație </th>
            <th> Model </th>
        </tr>
        <?php
        $password = "";
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT *  
                    FROM biciclete JOIN producatori ON  biciclete.IdProducator = producatori.IdProducator
                                        JOIN locatii ON biciclete.IdLocatie = locatii.IdLocatie";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["IdBicicleta"];
  $field2name = $row["Denumire"];
  $field3name = $row["Oras"];
  $field4name = $row["Strada"];
  $field5name = $row["Numar"];
  $field6name = $row["Model"];
        ?>
         <tr> 
            <td><?php echo "$field1name" ?></td> 
            <td><?php echo "$field2name" ?></td> 
            <td><?php echo "$field3name, Str.$field4name, nr.$field5name"?></td> 
            <td><?php echo "$field6name" ?></td> 
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
        <h2> Numărul de biciclete închiriate de la fiecare producator, în functie de model, în anul 2022 <h2>
    </div>

    <div class = "content">
        
    <table class = "table">
        <tr>
            <th> Producător  </th>
            <th> Model </th>
            <th> Număr biciclete </th>
        </tr>
        <?php
        $password = "";
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT  P.Denumire as Producator, B.Model as ModelBicicleta, 	COUNT(C.IdBicicleta) as NrBiciclete
                FROM `contracte` C JOIN `biciclete` B ON C.IdBicicleta = B.IdBicicleta 
                                    JOIN `producatori` P ON P.IdProducator = B.IdProducator
                WHERE YEAR(C.Data) = 2022
                GROUP BY P.Denumire, B.Model";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Producator"];
  $field2name = $row["ModelBicicleta"];
  $field3name = $row["NrBiciclete"];
        ?>
         <tr> 
            <td><?php echo "$field1name" ?></td> 
            <td><?php echo "$field2name" ?></td> 
            <td><?php echo "$field3name"?></td> 
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
</center>
</body>

</html>