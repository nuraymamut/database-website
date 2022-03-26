<?php

session_start();

include 'db_conn.php';

$mysqli = new mysqli('localhost', 'root', 'root', 'firma_de_curierat') or die(mysqli_error($mysqli));

if (isset($_POST['save'])){
    $Nume = $_POST['Nume'];
    $Prenume = $_POST['Prenume'];
    $Firma = $_POST['Firma'];
    $Judet = $_POST['Judet'];
    $Localitate = $_POST['Localitate'];
    $Strada = $_POST['Strada'];
    $Numar = $_POST['Numar'];
    $Telefon = $_POST['Telefon'];
    $Email = $_POST['Email'];

    $mysqli->query("INSERT INTO clienti (Nume, Prenume, Firma, Judet, Localitate,
    Strada, Numar, Telefon, Email) VALUES ('$Nume', 
    '$Prenume', '$Firma', '$Judet', '$Localitate', '$Strada', '$Numar', '$Telefon', '$Email' )")
    or die($mysqli->error);
}

$sql = 'SELECT * FROM clienti;';
$result = mysqli_query($con, $sql);


?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Admin</title>
		<link href="styles.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1><a href = "adminhome.php" class = "logo">ADMIN</a></h1>
                <a href="curieri.php">curieri</a>
                <a href="sedii.php">sedii</a>
                <a href="clienti.php">clienti</a>
                <a href="pachete.php">pachete</a>
                <a href="masini.php">masini</a>
                <a href="pick-up.php">pick-up</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="content">
			<h2></h2><a class="btn btn-secondary btn-lg" data-toggle="button" aria-pressed="false" autocomplete="off" href="index_clienti.php">Client Nou</a>
            <div class="container">
                <div class="box">
                    <table class="table table-striped">
                        <thead>
                            <tr>  
                                <th scope="col">Nume</th>
                                <th scope="col">Prenume</th> 
                                <th scope="col">Firma</th> 
                                <th scope="col">Judet</th> 
                                <th scope="col">Localitate</th> 
                                <th scope="col">Strada</th>
                                <th scope="col">Numar</th> 
                                <th scope="col">Telefon</th> 
                                <th scope="col">Email</th> 
                                <th scope="col">Actiuni</th> 
                            </tr>  
                        </thead>
                    <?php  
                        if(mysqli_num_rows($result) > 0)  
                        {  
                            while($row = mysqli_fetch_array($result))  
                            {  ?>  
                            <tr>  
                                <td><?php echo $row["Nume"];?></td>
                                <td><?php echo $row["Prenume"]; ?></td>  
                                <td><?php echo $row["Firma"]; ?></td> 
                                <td><?php echo $row["Judet"];?></td>  
                                <td><?php echo $row["Localitate"]; ?></td> 
                                <td><?php echo $row["Strada"]; ?></td>  
                                <td><?php echo $row["Numar"]; ?></td> 
                                <td><?php echo $row["Telefon"]; ?></td> 
                                <td><?php echo $row["Email"]; ?></td> 
                                <td>
                                    <a href="update_clienti.php?Client_ID=<?=$row["Client_ID"]?>" class= "btn btn-primary">Update</a><p></p>
                                    <a href="delete_clienti.php?Delete=<?=$row["Client_ID"]?>" class= "btn btn-primary">Delete</a><p></p>
                                </td>
                            </tr>  
                        <?php  
                            }  
                        }  
                        ?> 
                    </table>
                </div>
            </div>
		</div>
	</body>
</html>
