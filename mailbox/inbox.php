<?php
session_start();
if (isset($_SESSION['name'])) {
    $name = $_SESSION['name'];
  }
  
  if (isset($_COOKIE['user'])){
    $name = $_COOKIE['user'];
  }
  
  if (!isset($_SESSION['name']) and !isset($_COOKIE['user'])) {
    header('Location: index.php');
    exit();
  }

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mailbox";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM inbox where receiver = '$name' ORDER BY datetime DESC";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Account</title>
    <link rel="icon" href="./images/mail.png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/style.css" />
</head>

<body style="background-image: url(./images/pawel-unsplash.jpg);
  background-size: cover;
  background-repeat: no-repeat;">
    <nav class="navbar container1">
        <a class="navbar-brand" href="index.php">
            <img src="images/mailboxes_com.jpg" height="95" alt="" />
        </a>
        <a class="buttonL" href="./logout.php">Logout</a>
    </nav>

    <div class="container">
        <div class="row">
            <div class="inboxb col-md-2">
                <a class="navbuttonsI" href="./account.php" type="submit">Compose</a>
                <a class="navbuttonsI activeNavB" href="./inbox.php" type="submit">Inbox</a>
                <a class="navbuttonsI" href="./draft.php" type="submit">Draft</a>
                <a class="navbuttonsI" href="./sent.php" type="submit">Sent</a>
                <a class="navbuttonsI" href="./outbox.php" type="submit">Outbox</a>
            </div>
            <div class="inboxb col-md-10">
                <div class="inboxDiv">
                    <p class="ml-4 mt-3"><?php echo "Welcome " . $name; ?></p>
                    <form class="ml-5 mt-3 compose_form" action="" method="post">
                        <table class="tabledraft">
                            <tr>
                                <th>From</th>
                                <th>Subject</th>
                                <th>Message</th>
                                <th>Date & Time</th>
                            </tr>
                            <?php

                            while ($row = mysqli_fetch_row($result)) {
                                echo "
               <tr>
        <td>$row[2]</td>
        <td>$row[3]</td>
        <td>$row[4]</td>
        <td>$row[5]</td>
    </tr>
    ";
                            }

                            ?>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <hr>
    </div>

    <div class="container pb-4" style="display: flex; justify-content: center">
        <p style="font-weight: 600">© All rights are reserved by mailbox.com</p>
    </div>
</body>

</html>