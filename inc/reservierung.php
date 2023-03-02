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
    <title>Reservation</title>
</head>
<body>
  <?php
    include "nav.php"; // Navigationbar wird inkludiert
    ?>
      <div id="carouselExampleCaptions" class="carousel slide even" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="../res/img/room1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>The King's Suite</h5>
                  <h6>A new way of vacationing and feeling like royalty.</h6>
                  <p>Room type: <b>Suite</b></p>
                  <p>Charge for one adult, one night:         <b>€428 (incl. taxes)</b></p>
                  <p>Additional costs: <b>Breakfast in bed €49, Pet charge €12, Parking spot €30 per day</b></p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../res/img/room2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>A modern approach</h5>
                  <h6>Your personal escape from reality.</h6>
                  <p>Room type: <b>Double</b></p>
                  <p>Charge for one adult, one night:         <b>€273 (incl. taxes)</b></p>
                  <p>Additional costs: <b>Breakfast €20, Pet charge €12, Parking spot €30 per day</b></p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="../res/img/room3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Simplified</h5>
                  <h6>It's the simple things in life that count.</h6>
                  <p>Room type: <b>Single</b></p>
                  <p>Charge for one adult, one night:         <b>€147 (incl. taxes)</b></p>
                  <p>Additional costs: <b>Breakfast €20, Pet charge €12, Parking spot €30 per day</b></p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
        </div>

        
   <?php
    if(isset($_GET["id"])) // Wenn get variable in der URL gesetzt
    {
      if(!empty($_GET["id"])) // & wenn sie nicht leer ist
      {
          
          if(isset($_POST["submit"])) // Wenn submit gedrückt wurde
          {
            //Eine der Varianten eine Verbindung mit der Datenbank herzustellen
            $db_connection = mysqli_connect('127.0.0.1', 'root', '', 'hotel');

            // Überprüfen, ob Verbindung hergestellt wurde
            if (!$db_connection) {
                die("Verbindung fehlgeschlagen: " . mysqli_connect_error());
            }

            // Informationen aus dem Formular abrufen und in die lokalen Variablen abspeichern
            $checkin_date = $_POST['checkin'];
            $checkout_date = $_POST['checkout'];
            $room_type = $_POST['roomtype'];

            // Überprüfen, ob Zimmer verfügbar ist
            $query = "SELECT * FROM rooms WHERE ROOM_TYPE = '$room_type' AND ((CHECKIN_DATE BETWEEN '$checkin_date' AND '$checkout_date') OR (CHECKOUT_DATE BETWEEN '$checkin_date' AND '$checkout_date'))";
            $result = mysqli_query($db_connection, $query);

            if (mysqli_num_rows($result) == 0) {
                // Zimmer ist verfügbar, Reservierung einfügen
                // Verbindung mit der Datenbank herstellen
                require("../config/dbaccess.php"); // DB Connector
                $stmt = $mysql->prepare("INSERT INTO rooms (ROOM_TYPE, GUEST_FIRSTNAME, GUEST_LASTNAME, CHECKIN_DATE, CHECKOUT_DATE, BREAKFAST, PARKING, PET, USERNAME) VALUES (:room, :firstname, :lastname, :checkin, :checkout, :breakfast, :parking, :pet, :user)"); // Prepare insert Statement
                
                $stmt->bindParam(":room", $_POST["roomtype"]); // Binded POST an die lokale Variable 
                $stmt->bindParam(":firstname", $_POST["firstname"]); // Binded POST an die lokale Variable 
                $stmt->bindParam(":lastname", $_POST["lastname"]); // Binded POST an die lokale Variable 
                $stmt->bindParam(":checkin", $_POST["checkin"]); // Binded POST an die lokale Variable 
                $stmt->bindParam(":checkout", $_POST["checkout"]); // Binded POST an die lokale Variable 
                $stmt->bindParam(":breakfast", $_POST["breakfast"]); // Binded POST an die lokale Variable 
                $stmt->bindParam(":parking", $_POST["parking"]); // Binded POST an die lokale Variable 
                $stmt->bindParam(":pet", $_POST["pet"]); // Binded POST an die lokale Variable 
                $stmt->bindParam(":user", $_GET["id"]); // Binded GET an die lokale Variable 
                $stmt->execute(); // execute

                echo 'The booking procedure was successful.';
            } else {
                echo 'No rooms of this type available at the moment.';
            }

            // Verbindung schließen
            mysqli_close($db_connection);
          }
        }
      }
    ?>

      <form method="post">
          <h1 class="h3 mb-3 fw-normal">Reservation Form</h1>

          <div class="form-floating">
            <select class="form-select" name="roomtype">
              <option value="Singleroom">Single</option>
              <option value="Doubleroom">Double</option>
              <option value="Suite">Suite</option>
            </select>
            <label for="roomType">Please select the room type</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" name="firstname" placeholder="John">
            <label for="firstName">First Name</label>
          </div>
          <div class="form-floating">
            <input type="text" class="form-control" name="lastname" placeholder="Doe">
            <label for="lastName">Last Name</label>
          </div>
          <div class="form-floating">
            <input type="date" class="form-control" name="checkin">
            <label for="checkIn">CheckIn Date</label>
          </div>
          <div class="form-floating">
            <input type="date" class="form-control" name="checkout">
            <label for="checkOut">CheckOut Date</label>
          </div>
          <div class="form-floating">
            <select class="form-select" name="breakfast">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
            <label for="breakfast">Do you wish to add breakfast to your reservation?</label>
          </div>
          <div class="form-floating">
            <select class="form-select" name="parking">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
            <label for="parking">Do you wish to add a parking spot to your reservation?</label>
          </div>
          <div class="form-floating">
            <select class="form-select" name="pet">
              <option value="Yes">Yes</option>
              <option value="No">No</option>
            </select>
            <label for="pets">Do you intend to bring your beloved pet?</label>
          </div>

          <div class="col-auto button">
          <button class="w-100 btn" name="submit" type="submit">Book the room</button>
          </div>
      </form>
       
</body>
</html>