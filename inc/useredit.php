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
    <title>User Edit</title>
</head>
<body>
<?php
  include "nav.php"; // Navigationbar wird inkludiert
  ?>
  <?php
if(isset($_GET["id"])) // Wenn get variable in der URL gesetzt
{
  if(!empty($_GET["id"])) // & wenn sie nicht leer ist
  {
      require("../config/dbaccess.php"); // DB Connector eingebunden
      if(isset($_POST["submit"])) // Wenn submit gedrückt wurde
      {
          $stmt = $mysql->prepare("UPDATE accounts SET SALUTATION = :salutation, FIRST_NAME = :firstname, LAST_NAME = :lastname, EMAIL = :email, ACTIVE = :stand WHERE USERNAME = :id"); // Prepare SQL Statement
          $stmt->execute(array(":salutation" => $_POST["salutation"], ":firstname" => $_POST["firstname"], ":lastname" => $_POST["lastname"], ":email" => $_POST["email"], ":stand" => $_POST["stand"], ":id" => $_GET["id"])); // Setze lokale Variablen gleich der POST/GET und führe aus
          ?>
          <p>Your profil is saved.</p>
          <?php
      }
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :id"); // Check Username
      $stmt->execute(array(":id" => $_GET["id"])); // Setze GET gleich mit lokaler Variable und führe aus
      $row = $stmt->fetch(); // Nimmt die nächste Reihe vom ergebnis vorhin
    }
  }
      ?>
            <form action="useredit.php?id=<?php echo $_GET["id"] ?>" method="post">
                <h1 class="h3 mb-3 fw-normal">Profil Settings</h1>
                <div class="form-floating">
                
                  <select class="form-select" name="salutation">
                    <option value="1">Mr</option>
                    <option value="2">Ms</option>
                    <option value="3">Others</option>
                  </select>
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control" name="firstname" value="<?php echo $row["FIRST_NAME"] ?>" require>
                  <label for="firstName">First Name</label>
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control" name="lastname" value="<?php echo $row["LAST_NAME"] ?>" require>
                  <label for="lastName">Last Name</label>
                </div>
                <div class="form-floating">
                  <input type="email" class="form-control" name="email" value="<?php echo $row["EMAIL"] ?>" require>
                  <label for="email">E-Mail</label>
                </div>
                <div class="form-floating">
                  <input type="text" class="form-control" name="stand" value="<?php echo $row["ACTIVE"] ?>" require>
                  <label for="stand">Status: 1-active, 0-inactive</label>
                </div>
                <div class="col-auto button">
                <button class="w-100 btn" name="submit" type="submit">Update</button>
</div>
<form action="useredit.php?id=<?php echo $_GET["id"] ?>" method="post">
                <h1 class="h3 mb-3 fw-normal">Change Password</h1>
                <div class="form-floating">
                  <input type="password" class="form-control" name="password1">
                  <label for="password1">Password</label>
                </div>
                <div class="form-floating">
                  <input type="password" class="form-control" name="password2">
                  <label for="password2">Repeat Password</label>
                </div>
                <div class="col-auto button">
                <button class="w-100 btn" name="changepw" type="submit">Change Password</button>
</div>
<?php
    if(isset($_GET["id"])) // Überprüft ob GET Variable gesetzt ist
    {
      require("../config/dbaccess.php"); // DB Connector
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :id"); // Username überprüfen
      $stmt->bindParam(":id", $_GET["id"]); // Binded Get variable mit lokaler
      $stmt->execute(); // execute
      $count = $stmt->rowCount(); // Zählt die Rows die vom letzten Statement zurückgegeben werden. In dem Fall 1 weil 1 User
      if($count != 0) // Wenn ungleich 0
      {
          if(isset($_POST["changepw"])) // Wenn changepw button gedrückt
          {
              if($_POST["password1"] == $_POST["password2"]) // Kontrolliert ob eingegebene Passwörter übereinstimmen
              {
                  $hash = password_hash($_POST["password1"], PASSWORD_BCRYPT); // Hashed das eingegebene Passwort (Feld1) und speichert es in eine variable
                  $stmt = $mysql->prepare("UPDATE accounts SET PASSWORD = :password1 WHERE USERNAME = :id"); // Updated den Eintrag in der Datenbank beim User
                  $stmt->bindParam(":password1", $hash); // Binded den hashed Wert
                  $stmt->bindParam(":id", $_GET["id"]); // Bindet GET mit variable
                  $stmt->execute(); // execute
                  echo "Passwort has changed!";
              } 
              else
              {
                echo "Passwords doesn't match!";
              }
            }
          }
        }
      ?>

</body>
</html>

</html>

