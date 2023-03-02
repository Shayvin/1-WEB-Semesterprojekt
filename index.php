<!DOCTYPE html>
<?php
session_start();
?>
<html>
    <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="res/style.css">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
            <link rel="preconnect" href="https://fonts.googleapis.com"> 
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> 
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&display=swap" rel="stylesheet">
            <title>Hill Inn Vienna</title>
    </head>
    <body>
  <?php
  include "inc/nav.php";
  ?>
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col">
                <h1>Welcome to the place</h1>
                    <h3> where dreams come true</h3>
                    <p>Find your next available place in heaven</p>
                </div>
                <div class="col">
                    <img src="res/img/header.jpg" class="img-fluid" alt="Hotel Frontview">
                </div>
                
            </div>
        </div>
        <div class="container-fluid even" id="about">
            <div class="row ">
                <div class="col text-center">
                <h1>About</h1>
                    <h3>A journey for all senses</h3>
                    <p>Surrounded by exotic trees and with a breathtaking view of the city, the Hotel Hill Inn offers excellent service and a unique experience.</p> 
                    <p>Since 1979 we have been able to give our guests unforgettable moments and memories.</p>
                </div>
            </div>
        </div> 
        <div id="carouselExampleCaptions" class="carousel slide even" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="res/img/wellness.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Spa- & Wellness centre</h5>
                  <p>All our guests have access to the wellness area.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="res/img/restaurant.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Restaurant à la carte</h5>
                  <p>Let yourself be indulge by our 5-star chefs.</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="res/img/sport.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Sport and recreation</h5>
                  <p>A variety of options awaits you.</p>
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
    if(isset($_POST["submit"]))
    {
      mail("if22b170@technikum-wien.at", "Contactform Hotel", 'Name: '.$_POST["name"].' Email: '.$_POST["email"].' Topic: '.$_POST["topic"].' Phone: '.$_POST["phone"].' Message: '.$_POST["message"]);
      echo "Your request is sent!";
    }
      ?>
        <div class="container-fluid" id="contact">
            <div class="row">
                <div class="col contact">
                    <form action="index.php" method="post" class="row g-3">
                        <div class="col-md-6">
                            <label for="inputName" class="form-label">Name</label>
                            <input name="name" type="text" class="form-control" id="inputName" placeholder="First -and Last Name">
                        </div>
                        <div class="col-md-6">
                          <label for="inputEmail" class="form-label">Email</label>
                          <input name="email" type="email" class="form-control" id="inputEmail" placeholder="name@example.com">
                        </div>
                        <div class="col-md-6">
                          <label for="inputPhone" class="form-label">Phone Nr.</label>
                          <input name="phone" type="text" class="form-control" id="inputPhone" placeholder="+43 644 236 48 37">
                        </div>
                        <div class="col-12">
                          <label for="inputComment" class="form-label">Comment</label>
                          <textarea rows="4" class="form-control" id="inputComment" placeholder="Ask us anything."></textarea>
                        </div>
                        <div class="col-12">
                          <button name="submit" type="submit" class="btn">Submit</button>
                        </div>
                      </form>
                </div>
                <div class="col maps-container">
                    <iframe class="maps-frame" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2806.768843981172!2d16.333917184604317!3d48.27657773719891!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476d08b4f2db00f5%3A0x7031a80fdd7d73b5!2sSkyline%20Lounge%20Restaurant%20Kahlenberg!5e0!3m2!1sde!2sat!4v1663528536346!5m2!1sde!2sat"  allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </body>
</html>