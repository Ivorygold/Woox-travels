<?php require "../layouts/header.php"; ?>
<?php require "../../config/config.php"; ?>

<?php


if(isset($_GET['id'])){

  //selecting from the DB  and unlinking.
  $id = $_GET['id'];

  $image_delete = $conn->query("SELECT * FROM countries WHERE id = '$id ' ");
  $image_delete->execute();
    $getImage =  $image_delete->fetch(PDO::FETCH_OBJ);

    unlink("images_countries/" .  $getImage->image );

    //deleting the variable

    $deleteRecord = $conn->query("DELETE FROM countries WHERE id = '$id' ");
    $deleteRecord->execute();

    header("location: show-country.php");
    
}

  
?>