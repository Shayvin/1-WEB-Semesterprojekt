<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="stylesheet" href="/res/style.css">
    <link rel="stylesheet" href="/res/signin.css">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Register</title>
  </head>
  <?php
    if(isset($_POST["submit"]))
    {
      require("../config/dbaccess.php"); // DB Connector
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); // Select Statement preparen
      $stmt->bindParam(":user", $_POST["username"]); // Binded POST an die lokale Variable
      $stmt->execute(); // execute
      $useralreadyexists = $stmt->fetchColumn(); // Gibt ID aus der nächsten Zeile der Tabelle zurück
      if(!$useralreadyexists) // Wenn User nicht existiert
      {
        if($_POST["password1"] == $_POST["password2"]) // Vergleiche eingegebene Passwörter
        {
          $stmt = $mysql->prepare("INSERT INTO accounts (USERNAME, PASSWORD, FIRST_NAME, LAST_NAME, EMAIL, SALUTATION) VALUES (:user, :password1, :firstname, :lastname, :email, :salutation)"); // Prepare insert Statement
          $stmt->bindParam(":user", $_POST["username"]); // Binded POST an die lokale Variable 
          $stmt->bindParam(":firstname", $_POST["firstname"]); // Binded POST an die lokale Variable 
          $stmt->bindParam(":lastname", $_POST["lastname"]); // Binded POST an die lokale Variable 
          $stmt->bindParam(":email", $_POST["email"]); // Binded POST an die lokale Variable 
          $stmt->bindParam(":salutation", $_POST["salutation"]); // Binded POST an die lokale Variable 
          $hash = password_hash($_POST["password1"], PASSWORD_BCRYPT); // Hashed eingegebenes Passwort und speichert es in eine Variable
          $stmt->bindParam(":password1", $hash); // Binded POST an die lokale Variable 
          $stmt->execute(); // execute
          echo "Dein Account wurde angelegt";

        }
        else
        {
          echo "Die Passwörter stimmen nicht überein";
        }
      }
      else
      {
        echo "Der Username ist bereits vergeben";
      }
    }
     ?>
  <body class="text-center">
  <?php
  include "nav.php";
  ?>
<div class="forms">
<main class="form-signin w-100 m-auto">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal">Registration Form</h1>

    <div class="form-floating">
      <select class="form-select" name="salutation">
        <option value="1">Mr</option>
        <option value="2">Ms</option>
        <option value="3">Others</option>
      </select>
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
      <input type="email" class="form-control" name="email" placeholder="name@example.com">
      <label for="email">Email address</label>
    </div>
    <div class="form-floating">
      <input type="text" class="form-control" name="username" placeholder="John">
      <label for="username">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password1" placeholder="Password">
      <label for="password1">Password</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password2" placeholder="Password">
      <label for="password2">Password</label>
    </div>
    <div class="col-auto button">
    <button class="w-100 btn" name="submit" type="submit">Register</button>
    </div>
    </form>
    </div>
</main>


<?php
  include "footer.php";
  ?>
  </body>
</html>