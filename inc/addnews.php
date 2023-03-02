<!DOCTYPE html>
<?php
session_start();
?>
<html lang="en">
<head>
    <link rel="stylesheet" href="/res/main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Create News</title>
</head>
<body>
<?php
include "../inc/nav.php";
?>
    <form action="addnews.php" method="post" enctype="multipart/form-data" class="container mx-auto">
        <div class="h1">
            <h1>News Erstellen</h1>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Titel</label>
            <input type="text" name="titel" class="form-control" id="exampleFormControlInput1" placeholder="Titel">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Newstext</label>
            <textarea name="news" class="form-control" id="exampleFormControlTextarea1" placeholder="Newstext" rows="5"></textarea>
        </div>
        <label for="exampleFormControlTextarea2">Bildupload</label><br>
        <input type="file" name="picture" accept="image/jpeg, image/png, image/gif"><br>
        <div class="col-auto button">
            <button name="submit" type="submit" class="btn">Submit</button>
        </div>
    </form>
    <?php
        if(isset($_POST["submit"]))
        {
        if(isset($_FILES["picture"])) // File-Upload
        {
        $filename = $_FILES["picture"]["name"];
        $file_type = $_FILES['picture']['type'];
        $allowed = array("image/jpeg", "image/gif", "image/png");
        $target_path = "./";
        $resized_path = "uploads/";
        $width = 300;
        $height = 300;
        if(!in_array($file_type, $allowed))
        {
            echo 'Only jpg, gif, and png files are allowed.';
            exit();
        }
        move_uploaded_file($_FILES["picture"]["tmp_name"], $_SERVER["DOCUMENT_ROOT"]. "/uploads/news/" . $filename);
        require("../config/dbaccess.php");
        $stmt = $mysql->prepare("INSERT INTO news (TITEL, NEWS, CREATED_AT, IMAGES) VALUES (:titel, :news, :now, '$filename')"); // Prepare Statement
        $stmt->bindParam(":titel", $_POST["titel"]); // Binded POST an die lokale Variable 
        $stmt->bindParam(":news", $_POST["news"]); // Binded POST an die lokale Variable 
        $now = time(); // Aktuelle Zeit in Variable speichern
        $stmt->bindParam(":now", $now); // Binded time an die lokale Variable 
        $stmt->execute(); // execute
        echo "The News is created!";
        }
    }
?>
</body>
</html>