<?php
require_once'connection.php';
$name = $_POST['name'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$contact=$_POST['mnumber'];
$city=$_POST['city'];
// checking email
$check = mysqli_query($con," SELECT email FROM database_user WHERE email= '$email' ");

$count= mysqli_num_rows($check);
if ($count== 0) {
	if ($pass==$cpass) 
	{
		$pass=md5(crc32(sha1($pass))); // encryption..
		// inserting data
		$insert= "INSERT INTO database_user (name,email, password, contact,city_name ) VALUES( '$name','$email' , '$pass','$contact','$city')";
		$sql= mysqli_query($con,$insert);
         if ($sql) {
         	echo "welcome $name";
         
         	?>
         	<a href"location:index.php"></a>
         	<?php
         }
        
         else{
         	echo" something went wrong";
         }
			}
	else
	{
		echo"password mismatch....";
	}
}
else
{
	echo " $email you are already registered...";
}
?>