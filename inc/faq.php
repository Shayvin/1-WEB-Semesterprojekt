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
    <title>Help Center</title>
</head>

<body>
<?php
  include "nav.php"; // Navigationbar wird inkludiert
  ?>
    <header>

        <h1>Frequently Asked Questions</h1>
    </header>

    <div class="container">
        <p class="container title">Booking</p>
        <div class="questions">
            <details>
                <summary>Which forms of payment are accepted?</summary>
                <p class="answer">We accept cash, debit cards & credit cards. If you book online you can use paypal as well.</p>
            </details>
            <details>
                <summary>Is it necessary to prepay the stay to garantee the booking?</summary>
                <p class="answer ">Yes, if we receive the payment, we will send out a booking e-mail confirmation</p>
            </details>
            <details>
                <summary>Is it possible to extend my stay?</summary>
                <p class="answer ">Yes, but it may be possible that we have to check you into another room.</p>
            </details>
            <details>
                <summary>Do you offer parking, and how much does it cost?</summary>
                <p class="answer ">Yes, we have our own free parking lots. You can enter with your room card.</p>
            </details>
        </div>
    </div>

    <div class="container">
        <p class="container title">Service</p>
        <div class="questions">
            <details>
                <summary>What are the check-in and check-out times?</summary>
                <p class="answer ">Check-in from 9 a.m. Check-out until 1 p.m.</p>
            </details>
            <details>
                <summary>Is there a possibility of a late check-out?</summary>
                <p class="answer ">Yes, if you inform us at the beginning of your stay.</p>
            </details>
            <details>
                <summary>Can I store my luggage in case of early arrival or late departure?</summary>
                <p class="answer ">Yes, of course!</p>
            </details>
            <details>
                <summary>Is the Wifi free?</summary>
                <p class="answer ">Yes, only the upgrade to a higher package is chargeable.</p>
            </details>
        </div>
    </div>

    <div class="container">
        <p class="container title ">Other Questions</p>
        <div class="container questions">
            <details>
                <summary>What's your cancellation policy?</summary>
                <p class="answer ">All bookings can be cancelled up to 5 days prior to arrival</p>
            </details>
            <details>
                <summary>Is there a smoking restriction in the hotel area?</summary>
                <p class="answer ">We are a non-smoking hotel. You can smoke in front of the hotel.</p>
            </details>
            <details>
                <summary>Do you allow pets?</summary>
                <p class="answer ">Yes, we are pet friendly.</p>
            </details>
            <details>
                <summary>Do you offer anti-allergic pillows?</summary>
                <p class="answer ">Yes, on request. Please inform us before your stay.</p>
            </details>
        </div>
        <hr>
    </div>
    </div>
    <?php
    if(isset($_POST["submit"])) // Kontaktformular E-Mail versand
    {
      mail("shayvinhd@gmail.com", "Contactform Hotel", 'Name: '.$_POST["name"].' Email: '.$_POST["email"].' Topic: '.$_POST["topic"].' Message: '.$_POST["message"]);
      echo "Your request is sent!";
    }
      ?>
    <form action="faq.php" method="post" class="container mx-auto">
        <div class="h1">
            <h1>Do you need further informations? Please contact us!</h1>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="First -and Last Name" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">E-mail address</label>
            <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com" required>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Topic</label>
            <select name="topic" class="form-control" id="exampleFormControlSelect1">
            <option value="Booking">Booking</option>
            <option value="Service">Service</option>
            <option value="Other Questions">Other Questions</option>
            <option value="Feedback">Feedback</option>
          </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Text</label>
            <textarea name="message" class="form-control" id="exampleFormControlTextarea1" placeholder="Ask us anything." rows="5" required></textarea>
        </div>
        <div class="col-auto button">
            <button name="submit" type="submit" class="btn">Submit</button>
        </div>
        <hr>
    </form>
</body>

</html>