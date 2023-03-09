<!DOCTYPE html>

<html>
<br><br>
<head>

    <title>HOME Locații</title>
    <link rel="stylesheet" type="text/css" href="style4.css">

</head>


<body bgcolor="#e6f2ff">
<center>
    <div class = "header">
        <h2> Home Page Locații <h2>
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
            <th> Id Locație </th>
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
        $query = "SELECT * FROM locatii";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["IdLocatie"];
  $field2name = $row["Oras"];
  $field3name = $row["Judet"];
  $field4name = $row["Strada"];
  $field5name = $row["Numar"];
  $field6name = $row["Telefon"];
  $field7name = $row["Email"]; 
        ?>
         <tr> 
            <td><?php echo $field1name ?></td> 
            <td><?php echo $field2name ?></td> 
            <td><?php echo $field3name ?></td> 
            <td><?php echo $field4name ?></td> 
            <td><?php echo $field5name ?></td> 
            <td><?php echo $field6name ?></td>
            <td><?php echo $field7name ?></td>
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
        <h2> Locații care au mai puțin de 5 biciclete disponibile <h2>
    </div>

    <div class = "content">
    <table class = "table">
        <tr>
            <th> Locație </th>
            <th> Număr biciclete </th>
        </tr>
        <?php
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT L.Oras, L.Strada, L.Numar, COUNT(B.IdBicicleta) as NrBiciclete 
                  FROM biciclete B JOIN locatii L ON B.IdLocatie = L.IdLocatie
                  GROUP BY L.IdLocatie
                  HAVING COUNT(B.IdBicicleta) < 5";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Oras"];
  $field2name = $row["Strada"];
  $field3name = $row["Numar"];
  $field4name = $row["NrBiciclete"];

        ?>
         <tr> 
            <td><?php echo "$field1name, Str. $field2name, Nr. $field3name" ?></td> 
            <td><?php echo $field4name ?></td> 
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
        <h2> Câte contracte au fost încheiate la fiecare locație de-alungul anului 2022 <h2>
    </div>

    <div class = "content">
    <table class = "table">
        <tr>
            <th> Locație </th>
            <th> Număr contracte </th>
        </tr>
        <?php
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT L.Oras as Oras, L.Strada as Strada, L.Numar as Numar, COUNT(C.IdContract) as NrContracte
                 FROM `contracte` C JOIN `biciclete` B ON B.IdBicicleta = C.IdBicicleta
                                    JOIN `locatii` L ON L.IdLocatie = B.IdLocatie
                 WHERE YEAR(C.Data) = 2022
                GROUP BY L.IdLocatie";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Oras"];
  $field2name = $row["Strada"];
  $field3name = $row["Numar"];
  $field4name = $row["NrContracte"];

        ?>
         <tr> 
            <td><?php echo "$field1name, Str. $field2name, Nr. $field3name" ?></td> 
            <td><?php echo $field4name ?></td> 
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