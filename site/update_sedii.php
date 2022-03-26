<?php

if(isset($_GET['Sediu_ID'])){
    include "db_conn.php";
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
	}

    $Sediu_ID = validate($_GET['Sediu_ID']);

    $sql = "SELECT * FROM sedii where Sediu_ID = $Sediu_ID;";
    
    $result = mysqli_query($con, $sql);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_assoc($result);
    }
	
}
if(isset($_POST['update'])){

	$NumeS = validate($_POST['NumeS']);
    $Judet = validate($_POST['Judet']);
    $Localitate = validate($_POST['Localitate']);
    $Strada = validate($_POST['Strada']);
    $Numar = validate($_POST['Numar']);	

    $sql = "UPDATE sedii
            SET NumeS='$NumeS', Judet='$Judet', Localitate='$Localitate',
            Strada='$Strada',Numar='$Numar'
            WHERE Sediu_ID = '$Sediu_ID'";
    
    $result = mysqli_query($con, $sql);

    if($result)
        {
            header("location:sedii.php");
        }else
        {
            echo ' Please Check Your Query ';
        }  
}	

?>
<!doctype html>
<html lang="en">
  <head>
    <title>Update</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
  </head>
  <body>
    <div class="container">
      <form method = "POST">
          <h4 class="display-4 text-center">Update</h4>
        <div class="form-group">
          <label>Nume</label>
          <input type="text" name = "NumeS" class="form-control" value = "<?=$row["NumeS"]?>">
        </div>
        <div class="form-group">
          <label>Judet</label>
          <input type="text" name = "Judet" class="form-control" value = "<?=$row["Judet"]?>">
        </div>
        <div class="form-group">
          <label>Localitate</label>
          <input type="text" name = "Localitate" class="form-control" value = "<?=$row["Localitate"]?>">
        </div>
        <div class="form-group">
          <label>Strada</label>
          <input type="text" name = "Strada" class="form-control" value = "<?=$row["Strada"]?>">
        </div>
        <div class="form-group">
          <label>Numar</label>
          <input type="text" name = "Numar" class="form-control" value = "<?=$row["Numar"]?>">
        </div>
        <input type="text" name="Sediu_ID" value="<?=$row["Sediu_ID"]?>" hidden >
          <div class="form-group">
          <button type="submit" class= "btn btn-primary " name = "update" >Save</button>
        </div>
      </form>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
