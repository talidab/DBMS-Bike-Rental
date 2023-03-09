<!DOCTYPE html>

<html>
<br><br>
<head>

    <title>HOME Contracte</title>
    <link rel="stylesheet" type="text/css" href="style4.css">

</head>


<body bgcolor="#e6f2ff">
<center>
    <div class = "header">
        <h2> Home Page Contracte <h2>
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
            <th> Id Contract </th>
            <th> Client </th>
            <th> Agent </th>
            <th> Bicicleta </th>
            <th> Data închirierii </th>
            <th> Durata </th>
            <th> Preț </th>
        </tr>
        <?php
        $password = "";
        $mysqli = new mysqli('localhost', 'root', $password, 'proiect');
        $query = "SELECT CT.IdContract, CL.Nume as NumeC, CL.Prenume as PrenC, A.Nume as NumeA,A.Prenume as PrenA, B.Model, CT.Data, CT.Durata, CT.Pret  
                    FROM contracte CT JOIN clienti CL ON  CT.IdClient = CL.IdClient
                                        JOIN agenti A ON CT.IdAgent = A.IdAgent
                                        JOIN biciclete B ON CT.IdBicicleta = B.IdBicicleta
                    ORDER BY CT.IdContract";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["IdContract"];
  $field2name = $row["NumeC"];
  $field3name = $row["PrenC"];
  $field4name = $row["NumeA"];
  $field5name = $row["PrenA"];
  $field6name = $row["Model"];
  $field7name = $row["Data"];
  $field8name = $row["Durata"];
  $field9name = $row["Pret"];
        ?>
         <tr> 
            <td><?php echo "$field1name" ?></td> 
            <td><?php echo "$field2name $field3name" ?></td> 
            <td><?php echo "$field4name $field5name"?></td> 
            <td><?php echo "$field6name" ?></td> 
            <td><?php echo "$field7name" ?></td>
            <td><?php echo "$field8name ore" ?></td> 
            <td><?php echo "$field9name lei" ?></td>  
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
        <h2> Lunile în care s-au încheiat contracte, împreună cu anul și numărul de biciclete închiriate <h2>
</div>

    <div class = "content">
    <table class = "table">
        <tr>
            <th> Luna </th>
            <th> An </th>
            <th> Număr Biciclete </th>
        </tr>
        <?php
        $mysqli = new mysqli('localhost', 'root', '', 'proiect');
        $query = "SELECT MONTHNAME(C.Data) as Luna, YEAR(C.Data) as An, COUNT(B.IdBicicleta) as NrBiciclete
                FROM `contracte` C LEFT JOIN `biciclete` B ON C.IdBicicleta = B.IdBicicleta 
                GROUP BY YEAR(C.Data), MONTHNAME(C.Data)";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Luna"];
  $field2name = $row["An"];
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

    <div class = "header">
    <?php
        $mysqli = new mysqli('localhost', 'root', '', 'proiect');
        $query = "SELECT MONTHNAME(C.Data) as Luna, COUNT(C.IdContract) as NrContracte
                FROM `contracte` C 
                WHERE YEAR(C.Data) = 2022
                GROUP BY MONTH(C.Data)
                HAVING COUNT(C.IdContract) >= ALL( SELECT COUNT(MONTH(CC.Data))
                                                    FROM `contracte` CC
                                                    GROUP BY MONTH(CC.Data)
                                                )";


        if ($result = $mysqli->query($query)) {
        while ($row = $result->fetch_assoc()) {
            $field1name = $row["Luna"];
            $field2name = $row["NrContracte"];
        ?>
            <h2> Luna anului 2022 în care s-au înregistrat cele mai multe închirieri este <?php echo "$field1name" ?> cu <?php echo "$field2name" ?> contracte închiriate. <h2>
        <?php 
}
$result->free();
} 
        ?>
            <br>
    
    <div>
    <a href = "admin.php">
        <input type="button" class = "btn" value="Înapoi">
    </a>
    </div>
</div>

<div class = "header">
        <h2> Clienti care au incheiat mai multe contracte decat <h2>
        <form action = "contracte.php" method = "GET" >
            Introdu nume: <input type="text" name="nume"></input>
            <br><br>
            <input type = "submit" class = "btn" value = "Trimite"></input>
        </form>
</div>

    <div class = "content">
    <table class = "table">
        <tr>
            <th> Nume </th>
            <th> Prenume </th>
            <th> Număr Contracte </th>
        </tr>
        <?php
        if($_GET){
        $nume = $_GET['nume'];
        $mysqli = new mysqli('localhost', 'root', '', 'proiect');
        $query = "SELECT  C.Nume as Nume, C.Prenume as Prenume, COUNT(CC.IdContract) as NrContracte
                FROM `clienti` C JOIN `contracte` CC ON CC.IdClient = C.IdClient
                GROUP BY C.Nume
                HAVING COUNT(CC.IdContract) > (SELECT COUNT(CC2.IdContract)
                                    FROM `contracte` CC2 JOIN `clienti` C2 ON C2.IdClient = CC2.IdClient
                                    WHERE C2.Nume = '$nume'
                                   			 )
";


if ($result = $mysqli->query($query)) {
while ($row = $result->fetch_assoc()) {
  $field1name = $row["Nume"];
  $field2name = $row["Prenume"];
  $field3name = $row["NrContracte"];
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