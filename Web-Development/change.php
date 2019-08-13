<?php
require_once'connection.php';
session_start();
if (isset($_POST['change']))
{
$email=$_SESSION['id'];
$emailid=$_POST['email'];
$opass=$_POST['opass'];
$npass=$_POST['npass'];
$cpass=$_POST['cpass'];

if ($email == $emailid)
 {
	$data = mysqli_query($con,"SELECT * FROM stud WHERE email='$email'");
	$row = mysqli_fetch_assoc($data);
    
	$opass = md5(crc32(sha1($opass)));
   
	if($opass == $row["password"])
	{
		if($npass == $cpass)
		{
			$npass = md5(crc32(sha1($npass)));
	        $update = "UPDATE stud SET password='$npass' WHERE email ='$emailid' ";
	        $sql = mysqli_query($con,$update);
	        if($sql)
	        {
	        	echo"your password has changed";
	        	header("localtion:profile.php");
	        }
	        else
	        {
	        	echo"ERROR";
	 
	        }
	    }


	    else
	    {
	        	echo"password didn't correct";
	    }
	}
    else
    {
	echo"old password is wrong";
    }
 }
 else
 {
	echo"wrong emailid";
 }
}
?>     
<!DOCTYPE html>
<html>
<head><title>Change Your Password</title>
</head>
<body bgcolor ="#ffbb99">
	<fieldset>
		<center>
		<form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<input type="text" name="email" placeholder="Example@gmail.com"required><br><br>
		<input type="password" name="opass" placeholder="Enter Old Password"required><br><br>
			<input type="password" name="npass" placeholder="Enter New Password"required><br><br>
			<input type="password" name="cpass" placeholder="Confirm Password"required><br><br>
       <input type="submit" value="Save Password" name="change"><br><br>
       <a href="index.php">Sign In</a>
	
</center>
</fieldset>
</body>
</html>