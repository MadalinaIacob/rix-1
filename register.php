<?php
$usr="root";
$pas="secret";
$database="sitedb";

$conn = mysqli_connect("localhost",$usr,$pas,$database);
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  else
    echo "Conexiune cu BD reusita\r\n";

$username=$_POST["inUsername"];
$email = $_POST["inEmail"];
$password = $_POST["inPassword"];

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
    $passwordErr = "Password is required";
  } else {
    $password = test_input($_POST["password"]);
    if (!preg_match("/^[a-zA-Z ]*$/",$password)) {
       $passwordErr = "Only letters and white space allowed"; 
     }
  }
}
if($username&&$email&&$password){
$sql = "INSERT INTO `users` (username,email,password) VALUES ('$username','$email','$password')";
if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else
  echo "All fields are mandatory!";

function test_input($data){
	$data=trim($data);
	$data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

mysqli_close($conn);
?>