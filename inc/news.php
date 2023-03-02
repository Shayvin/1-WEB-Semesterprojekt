<!DOCTYPE html>
<?php
session_start(); // Session start
?>
<html lang="en">
<head>
<link rel="stylesheet" href="../res/main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>News</title>
</head>
<body>
<?php
  include "nav.php"; // Navigationbar wird inkludiert
  ?>
<?php
    require("../config/dbaccess.php");
    $stmt = $mysql->prepare("SELECT * FROM news ORDER BY CREATED_AT DESC LIMIT 3");
    $stmt->execute();
    $count = $stmt->rowCount();
    if($count == 0){
        echo "Es wurden keine News gefunden.";
    } else {
        while($row = $stmt->fetch()){
            ?>
<div class="box">
        <h3 class="font"><?php echo $row["TITEL"] ?></h3>
        <div class="image-container">
        <img src='../uploads/news/<?php echo $row["IMAGES"]?>' alt='picture' height="300" width='300'>
            <div class="image-text">
            <?php echo substr($row["NEWS"], 0, 255) ?><br><br>
            <?php echo date("d.m.Y H:i", $row["CREATED_AT"]) ?>
            </div>
        </div>
    </div>
    <?php
        }
    }
?>
</body>
</html>