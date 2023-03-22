<?php   
 session_start();
 include("config.php"); //include the config
 require_once "header.php";
?>
<?php
//create database connection
$db=new mysqli("$dbhost","$dbuser","$dbpass");
$db->select_db("$dbname");
?>


<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
</head>

<body>

<!-- Login form start -->
<div  style="width: 500px; margin:auto">
<div class="row">
<div class="col-8 m-auto">
<form action="" method="post" name="login" class="mt-4">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" NAME="username">
 </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" NAME="password">
  </div>
  <div class="mb-3">
  Not a member ? <a href="register.php"> Register Now</a>
    </div>
  <button type="submit" class="btn btn-primary" NAME="login">Login</button>
</form>
</div>
</div>
</div>
<!-- Login form end-->

</body>

</html>

<!-- php quary section -->
 <?php
 if(isset($_POST['login']))
 {
   $username =$_POST['username'];
   $password=$_POST['password'];
   $query="SELECT * FROM prof WHERE username = '$username' AND password = '$password'"; //quary
   $result=$db->query($query);
   $num_rows=$result->num_rows;
   for($i=0;$i<$num_rows;$i++)
   {   $row=$result->fetch_row();
	}
   if(($username==$row[1])&&($password==$row[6])) //checking the username and password if right
   {
     $_SESSION['username']=$username;
	 Header("location:index.php");
   }
   else
   {
     echo 'Username and Password not Right :P';
   }
}
@mysql_close($con);
?>