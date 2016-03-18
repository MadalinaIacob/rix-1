<?php
$username = $email = $password = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
	if (empty($_POST["username"])) {
    $nameErr = "Username is required";
  } else {
    $username = test_input($_POST["username"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$username)) {
       $usernameErr = "Only letters and white space allowed"; 
     }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
       $emailErr = "Invalid email format"; 
     }
  }

  if (empty($_POST["password"])) {
    $password = "";
  } else {
    $password = test_input($_POST["password"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$password)) {
       $passwordErr = "Only letters and white space allowed"; 
     }
  }
}

function test_input($data){
	$data=trim($data);
	$data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
>