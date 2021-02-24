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

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if (isset($_POST['send'])) {
  $i = "INSERT INTO `inbox`(`Receiver`, `Sender`, `Subject`, `Message`) VALUES ('$_POST[to]', '$name', '$_POST[subject]', '$_POST[message]')";
  $res = mysqli_query($conn, $i);
  if ($res) {
    echo "<script> alert('Email sent successfully')</script>";
  }
}

if (isset($_POST['draft'])) {
  $i = "INSERT INTO `draft`(`Receiver`, `Sender`, `Subject`, `Message`) VALUES ('$_POST[to]', '$name', '$_POST[subject]', '$_POST[message]')";
  $res = mysqli_query($conn, $i);
  if ($res) {
    echo "<script> alert('Email saved to draft')</script>";
  }
}
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
        <a class="navbuttonsI activeNavB" href="./account.php" type="submit">Compose</a>
        <a class="navbuttonsI" href="./inbox.php" type="submit">Inbox</a>
        <a class="navbuttonsI" href="./draft.php" type="submit">Draft</a>
        <a class="navbuttonsI" href="./sent.php" type="submit">Sent</a>
        <a class="navbuttonsI" href="./outbox.php" type="submit">Outbox</a>
      </div>
      <div class="inboxb col-md-10">
        <div class="inboxDiv">
          <p class="ml-4 mt-3"><?php echo "Welcome " . $name; ?></p>
          <form class="ml-5 mt-3 compose_form" action="" method="post">
            <table>
              <tr>
                <td>
                  <label for="">To:</label>
                </td>
                <td>
                  <select class="inputcompose" name="to" id="">
                    <option value="" selected>Select a reciever</option>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                      echo "<option value='$row[name]'>" . $row['name'] . "</option>";
                    }
                    ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="subject">Subject:</label>
                </td>
                <td>
                  <input name="subject" class="inputcompose" type="text" placeholder="Type subject here">
                </td>
              </tr>
              <tr>
                <td>
                  <label for="message">Message:</label>
                </td>
                <td>
                  <textarea class="inputcompose" name="message" id="" cols="30" rows="10"></textarea>
                </td>
              </tr>
              <tr>
                <td><button style="opacity: 0;"></button></td>
                <td class="buttonTd"><button name="send" type="submit">Send</button><button class="ml-2" name="draft">Save to Draft</button></td>
              </tr>
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