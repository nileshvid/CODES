<?php
require_once 'connection.php';
// input from index.php
$email=$_POST['email'];
$pass =$_POST['pass'];

// checking email
$check = mysqli_query($con," SELECT * FROM database_user WHERE email= '$email' ");

$count= mysqli_num_rows($check);
if ($count==true) 
{     
	$pass = md5(crc32(sha1($pass)));
	$row = mysqli_fetch_assoc($check);
	
	if ($pass==$row["password"]) 
	{
	     session_start();
	     $_SESSION['id']=$row['email'];
	     $_SESSION['name']=$row['name'];
        
	     header("location:profile.php"); // redirects the page..


	}
	
}
else
{
	echo" $email you are not registered....";
}


?>