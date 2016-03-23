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

$email = $_POST["inEmail"];
$password = $_POST["inPassword"];


if($email&&$password){
    $sql = "SELECT * FROM `users` WHERE `email`='$email' AND `password`='password'";
if ($result=mysqli_query($conn, $sql)) {
    if(mysqli_row_count($result)>0)
      header (Location : afterLogin.html);
    else
      echo "Invalid email/password";
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