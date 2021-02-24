<?php

if (isset($_POST["register"])) {

    if(empty($_POST['name']) || empty($_POST['username']) || empty($_POST['password']) || empty($_POST['re-password']) || empty($_POST['phone']) || empty($_POST['dob']) || empty($_POST['dob']) || empty($_POST['gender']) || empty($_POST['dob']) || empty($_POST['country']))
    {
        echo "<script>alert ('any field must not be empty')</script>";
        echo "<script>  window.location.assign('index.php')</script>";
    } 
    
   elseif($_POST['password'] != $_POST['re-password']){
        echo "<script>alert ('Passwords don't matched')</script>";
        echo "<script>  window.location.assign('index.php')</script>";
   }

    else{

        $con = mysqli_connect("localhost", "root", "") or die("could not connect to database");
    
    // creating database
    $i = "create database mailbox";
    mysqli_query($con, $i);
    
    // using database

    mysqli_select_db($con, "mailbox");

    // insert table

    $t = "create table users(id int not null auto_increment primary key, name varchar(50), username varchar(50), password varchar(50), phone varchar(20), dob varchar(20), gender varchar(20), country varchar(50))";

    mysqli_query($con, $t);
    
    // insert values to columns
    
    $v = "INSERT INTO users VALUES ('','$_POST[name]', '$_POST[username]', '$_POST[password]', '$_POST[phone]', '$_POST[dob]', '$_POST[gender]', '$_POST[country]')";
    $res = mysqli_query($con, $v);
    if ($res) {
        echo '<script>alert("Your details are registered, You can login now.")</script>';
        echo "<script>  window.location.assign('index.php')</script>";
    } else {
        echo '<script>alert("not added values to columns")</script>';
        print_r($v);
    }
}
}