<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/res/style.css">
    <link rel="stylesheet" href="/res/signin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="../index.php">Hill Inn Vienna</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav ms-auto">
            <?php
            if(isset($_SESSION['username']))
            {
            require($_SERVER["DOCUMENT_ROOT"] . "/config/dbaccess.php");
            $stmt = $mysql->prepare("SELECT * FROM accounts WHERE USERNAME = :user"); // Select Statement preparen
            $stmt->bindParam(":user", $_SESSION["username"]); // Binded POSt an die lokale Variable
            $stmt->execute(); // Wird ausgeführt
            $row = $stmt->fetch();
            if($row["GROUP"] == 1)
            {
            ?>
            <li class="nav-item">
              <a class="nav-link" href="/inc/admin.php">Adminpanel</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/inc/addnews.php">Create News</a>
            </li>
            <?php
                }
            }
            ?>
            <?php
            if(!isset($_SESSION['username']))
            {
            ?>
              <li class="nav-item">
                  <a class="nav-link" href="/inc/register.php">Register</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/inc/login.php">Login</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/inc/news.php">News</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/inc/faq.php">FAQ</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/inc/impressum.php">Impressum</a>
              </li>
                <?php
              }
              ?>
              


              <?php if (isset($_SESSION['username'])) // Checkt ob der User eingeloggt ist
              {
                ?>
                <li class="nav-item">
                  <a class="nav-link" href="/inc/reservierung.php?id=<?php echo $_SESSION["username"]?>">Rooms</a>
              </li>
                <li class="nav-item navcenter">
                  <a class="nav-link" href="/inc/profil.php?id=<?php echo $_SESSION["username"] // gibt den Username aus?>">Profil</a>
                </li>
                <li class="nav-item navcenter">
                  <a class="nav-link" href="/inc/bookinghistory.php?id=<?php echo $_SESSION["username"] // gibt den Username aus?>">Reservations</a>
                </li>
                <li class="nav-item navcenter"><a class="nav-link" href="/inc/logout.php">Logout</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/inc/news.php">News</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/inc/faq.php">FAQ</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="/inc/impressum.php">Impressum</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled">Logged in as: <?php echo $_SESSION["username"] // gibt den Username aus?></a>
              </li>
                <?php } ?>
          </ul>
        </div>
      </div>
  </nav>
</body>
</html>