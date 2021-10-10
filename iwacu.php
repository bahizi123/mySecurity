<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "websecurity";
$usernam= $_POST['uname'];
$passwor= sha1($_POST['pass']);
$check=0;
$conn = new mysqli($server, $username, $password, $database);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT Firstname, Lastname , Email, username, password FROM login";
$result = $conn->query($sql);

if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) { $userna=$row["username"];
$pass=$row["password"];
if($usernam==$userna && $passwor==$pass){
		$_SESSION['uname'] = $usernam;
		$check=1;
		
		echo "<script>location.href='akana.php'</script>";

	}
}}
session_start();
if($check===1){
	$_SESSION['user']=$usernam;
	$_SESSION['pa']=$passwor;
	echo "<h1>welcome ".$_SESSION['name']."</h1>";
	echo "<script>location.href='akana.php'</script>";
}


	else{
		echo "<script>alert ('username or password incorrect!')</script>";
		
	echo "<script>location.href='login.php'</script>";
  }
 
if(!empty($_POST["remember"]))   
   {  
    setcookie ("uname",$usernam,time()+ 3600);  
    setcookie ("pass",$_POST['pass'],time()+ 3600);
    $_SESSION["uname"] = $usernam;
   }  
   else  
   {  
    if(isset($_COOKIE["uname"]))   
    {  
     setcookie ("uname","");  
    }  
    if(isset($_COOKIE["pass"]))   
    {  
     setcookie ("pass","");  
    }  
    
  else  
  {  
   $message = "Invalid Login";  
  } 
 }


$conn->close();
?>