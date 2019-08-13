<!DOCTYPE html>
<html>
<head>
<title> change password...</title>
</head>
<body bgcolor="#ffbb99">
<fieldset> 
<h1><center> 


<?php

session_start();
require_once'connection.php';
$email=$_SESSION['id'];

if($email)
{

if($_POST['submit'])
{
$pass =md5(crc32(sha1($_POST['pass'])));
$npass=md5(crc32(sha1($_POST['npass'])));
$rnpass=md5(crc32(sha1($_POST['rnpass'])));
$check = mysqli_query($con," SELECT * FROM database_user WHERE email= '$email' ");

$count= mysqli_num_rows($check);
	if ($count==true) 
{     

	$row = mysqli_fetch_assoc($check);


	
	$oldpass= $row['password'];
	if ($pass==$oldpass) 
	{
		if ($npass==$rnpass)
	    {

         $update= mysqli_query($con,"UPDATE database_user SET password='$npass' WHERE email='$email'");
         header("location: changepassword.php");
         
          
			
		}
		else
		{
			echo"PASSWORD DID NOT MATCHED....";?><br> <a href="changep.php">BACK</a> TO CHANGED PASSWORD SCREEN......<BR>
		<?php
	}
	}
    else
	{echo"WRONG OLD PASSWORD....";
?> <br> <a href="changep.php">BACK</a> TO CHANGED PASSWORD SCREEN......<BR>
		<?php
    }
}
}
}?>
</center>
</h1>
</fieldset>
</body>
</html>


	