<!DOCTYPE html>
<html lang="en">
<?php
session_start(); // Session start
?>
<head>
    <link rel="stylesheet" href="../res/main.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Impressum</title>
</head>

<body>
<?php
  include "nav.php"; // Navigationbar wird inkludiert
  ?>
    <div class="box">
        <h3 class="font">Legal Notice</h3>
        <div class="text-container">
            Hill Inn Vienna
            <br>Imaginary Hotels GmbH
            <br>Group gastronomy and hotel industry
            <br>UID-Nr: ATU1234567
            <br>Company registration number: 123456a
            <br>Company register court: Vienna
            <br>Am Khalenberg 2-3
            <br>A-1190 Wien
            <br>Tel: +43 676 455 23 23
            <br>Fax: +43 112 3133 2
            <br>E-mail: hillinnv@hotellerie.at
            <br>Member of WKÖ, WKÖW
            <br>Master examination passed in Austria
            <br>Consumers have the opportunity to submit complaints to the EU's online dispute resolution platform: <a href="http://ec.europa.eu/odr">http://ec.europa.eu/odr</a>.
            <br>You can also send any complaints to the email address given above.
        </div>
    </div>

    <div class="box">
        <h3 class="font">Area Director of Sales & Marketing</h3>
        <div class="image-container">
            <img class="images d-none d-md-block" src="../res/img/Dominik.jpg" alt="Area Director of Sales & Marketing">
            <div class="image-text">
                Dominik Leitner
                <br>Chairman of the Sales & Marketing Department
                <br>Engelbertstraße 21
                <br>A-1190 Vienna
                <br>Tel: +43 660 938 32 833
                <br>E-mail: <a href="#">if22b170@technikum-wien.at</a>
            </div>
        </div>
    </div>

    <div class="box">
        <h3 class="font">Area Director of Finance</h3>
        <div class="image-container">
            <img class="images d-none d-md-block" src="../res/img/sinisa.jpg" alt="Area Director of Finance">
            <div class="image-text">
                Sinisa Panic
                <br>Chairman of the Finance Department
                <br>Leopoldauerstraße 42
                <br>A-1210 Vienna
                <br>Tel: +43 676 345 629 33
                <br>E-mail: <a href="#">if22b177@technikum-wien.at</a>
            </div>
        </div>
    </div>
</body>

</html>