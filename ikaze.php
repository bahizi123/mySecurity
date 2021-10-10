<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "websecurity";
$Firstname = $_POST['fname'];
$Lastname = $_POST['lname'];
$Email = $_POST['email'];
$usernam= $_POST['uname'];
$passwor= sha1($_POST['psw']);
$conn = new mysqli($server, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql="insert into login (Firstname,Lastname,Email,username,password) values(?,?,?,?,?)";

$st=mysqli_stmt_init($conn);
if(mysqli_stmt_prepare($st,$sql))
{
echo "New Register created successfully";
mysqli_stmt_bind_param($st,"sssss",$Firstname,$Lastname,$Email,$usernam,$passwor);
mysqli_stmt_execute($st);
echo "<script>location.href='akana.php'</script>";
}
else{

echo "error:".$sql."<br>".$conn->error;
}

?>