<?php

session_start();
if (isset($_SESSION['name'])) {
  header("location: account.php");
}

$ferrmsg = "";

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

if(isset($_POST['forgetpass'])){
  $sql = "SELECT * FROM users where phone = '$_POST[phone]'";
  $result = $conn->query($sql);
 
  $row = $result->fetch_assoc();
 
  if ($_POST['phone'] = $row['phone'] and $_POST['dob'] = $row['dob']) {
    echo "<script>alert('Your password is $row[password]');</script>";
  } else {
    $ferrmsg = "Phone or D.O.B is wrong.";
  }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mailbox</title>
  <link rel="icon" href="./images/mail.png">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
  <nav class="navbar container1">
    <a class="navbar-brand" href="index.php">
      <img src="images/mailboxes_com.jpg" height="95" alt="" />
    </a>
  </nav>

  <div class="container1" style="display: flex; flex-direction: row-reverse">
    <button class="accbtn" id="accbtn" onclick="showregister()">Create an Account</button>
    <button class="regbtn" id="regbtn" onclick="showlogin()">Already an User</button>
    <p class="mt-2 mr-3" id="newm">New to Mailbox?</p>
    <p class="mt-2 mr-3" id="entd" style="display: none;">Enter Your Details Below.</p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <div style="display: flex">
          <img src="images/outlook-mailbox.jpg" height="80px" alt="" />
          <h4 class="mt-3 ml-3">Email by Mailbox</h4>
        </div>
        <div class="container mt-5" style="display: flex">
          <div>
            <img src="images/images.png" height="45px" alt="" />
          </div>

          <div class="ml-5 fast">
            <h5>Fast and Easy</h5>
            <p>An eficient and usefull email service by Rohit</p>
            <p>Faster and easy</p>
          </div>
        </div>
        <div class="container mt-4" style="display: flex">
          <div>
            <img src="images/secure-email.jpg" height="60px" width="113px" alt="" />
          </div>

          <div class="ml-5 fast">
            <h5>Secured and Enthusiastic</h5>
            <p>An eficient and usefull email service by Rohit</p>
            <p>Faster and easy</p>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        

        <!-- forget pass form -->

        <div class="signupform" id="forgetpassform">
          <div class="row">
            <h5>Enter Personal Details</h5>
            <p style="margin-left: auto; color: rgb(168, 168, 168)">
              mailBOX
            </p>
          </div>
          <hr />
          <form class="mt-3" method="POST" action="forgetpass.php">
            <table>
              <tr>
                <td><label for="phone">Phone:</label></td>
                <td><input class="signinput" type="tel" name="phone" placeholder="Enter Phone"/></td>
              </tr>
              <tr>
                <td><label class="mt-3" for="dob"> D.O.B: </label></td>
                <td>
                  <input class="signinput mt-3" type="date" name="dob" />
                </td>
              </tr>
              <tr>
                <td><label class="mt-3" for="dob">Primary School</label></td>
                <td>
                  <input class="signinput mt-3" type="text" name="secque" placeholder="Enter Answer"/>
                </td>
              </tr>
            </table>

            <p id="forgetpass" class="errmsg text-center"> <?php echo $ferrmsg; ?> </p>

            <div>
              <button class="signbtnf mt-3 mb-3" name="forgetpass" type="submit">Show Password</button>
            </div>
          </form>

          <a class="acca" style="margin-left: 109px;" href="index.php">Back to Login</a>
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
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>

</html>