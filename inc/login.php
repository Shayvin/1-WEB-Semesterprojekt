
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="stylesheet" href="../res/style.css">

    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>Login</title>
    <link href="../res/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
  <?php
  include "nav.php"; // Navigationbar wird inkludiert
  ?>
 <div class="forms">
<main class="form-signin w-100 m-auto">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

    <div class="form-floating">
      <input type="text" class="form-control" name="username" placeholder="Username">
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password1" placeholder="Password">
      <label for="floatingPassword">Password</label>
    </div>
    <button class="w-100 btn btn-lg submit" name="submit" type="submit">Sign in</button>

    <?php
    if(isset($_POST["submit"])) // Checkt ob submit geklickt wurde.
    {
      require("../config/dbaccess.php"); // Datenbankverbindung
      $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); // Select Statement preparen
      $stmt->bindParam(":user", $_POST["username"]); // Binded POSt an die lokale Variable
      $stmt->execute(); // Wird ausgeführt
      $count = $stmt->rowCount(); // Zählt die Rows die vom letzten Statement zurückgegeben werden. In dem Fall 1 weil 1 User
      
      if($count == 1) // Wenn der count gleich 1 ist
      {
        $row = $stmt->fetch(); // Geht in die Zeile vom Username
        if($row["ACTIVE"] == 1) // Wenn der User aktiv ist, fahre fort.
        {
          if(password_verify($_POST["password1"], $row["PASSWORD"])) // Vergleicht den im Formular eingegebenen Wert mit dem in der Datenbank
          {
            session_start(); // Session start
            $_SESSION["username"] = $row["USERNAME"]; // Setzt die Session Variable gleich den Username aus der DB
            $url = "profil.php?id=" . $_SESSION["username"]; // Variable die noch "profil.php?id=%USERNAME%" an die URL ranhängt
            header("Location: $url"); // Weiterleitung an url
          }
          else
          {
            echo "Der Login ist fehlgeschlagen";
          }
        }
        else {
          echo "User is not active.";
        }
      }
      else 
      {
        echo "Der Login ist fehlgeschlagen";
      }
    }
     ?>
    
  </form>
</main>
</div>
  </body>
</html>
