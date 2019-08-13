<?php
session_start();
require_once 'connection.php';
$email=$_SESSION['id'];
if (!$_SESSION['id']) 
{
	header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title> profile</title>
</head>
<body bgcolor="#ffbb99">
<fieldset> <legend> WELCOME</legend>
<h1><center> YOUR PROFILE</center></h1>
<?php
$check= mysqli_query($con, "SELECT * FROM database_user WHERE email='$email'");
$row= mysqli_fetch_assoc($check);?>
<tr>
      <td><b> ID-: <?php echo  $row['user_id'];?> </b></td><br>
       <td><b> NAME-: <?php echo  $row['name'];?> </b></td><br>
       <td><b> EMAIL-: <?php echo  $row['email'];?> </b></td><br>
        <td><b> CONTACT-: <?php echo  $row['contact'];?> </b></td><br>
         <td><b> CITY-: <?php echo  $row['city_name'];?> </b></td><br>
          <td><b> JOIN DATE-: <?php echo  $row['join_date'];?> </b></td><br>
          </tr>

    <a href="changep.php">change password??</a><br>
<a href="logout.php"> log out </a>
</fieldset>
</body>
</html>