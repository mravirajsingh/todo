
<?php 
 include 'config.php'; 
 require_once "header.php";
?>
<?php
//database connection
$db=new mysqli("$dbhost","$dbuser","$dbpass");
$db->select_db("$dbname");

?>
<html>

<head>
<meta http-equiv=Content-Type content="text/html; charset=windows-1252">
</head>

<body>

<!-- register form section end -->
<div  style="width: 500px; margin:auto">
<div class="row">
<div class="col-8 m-auto">
<form action="" method="post" name="login" class="mt-4">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" NAME="username">
 </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input INPUT TYPE="email" NAME="email" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">First Name</label>
    <input  class="form-control form-control-lg" id="exampleInputEmail1" INPUT TYPE="text" NAME="fname">
 </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Last Name</label>
    <input class="form-control" id="exampleInputPassword1" INPUT TYPE="text" NAME="lname">
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Country</label>
    <input  class="form-control form-control-lg" id="exampleInputEmail1" INPUT TYPE="text" NAME="country">
 </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" NAME="password">
  </div>
  <div class="mb-3">
  Already have a account ? <a href="login.php"> Signin</a>
    </div>
  <button type="submit" class="btn btn-primary" NAME="register" Onclick="return done(this.form);">Register</button>
</form>
</div>
</div>
</div>
<!-- register form section end -->
</body>
</html>
<!-- php quary section -->
<?php
  if(isset($_POST['register']))
  {
   //geting the values from user input form index
   $fname=$_POST['fname'];
   $lname=$_POST['lname'];
   $email=$_POST['email'];
   $username=$_POST['username'];
   $password=$_POST['password'];
   $country=$_POST['country'];
    //quary
   if ($db->query("INSERT INTO prof
    (username,email,fname,lname,country,password)
    VALUES ('$username','$email','$fname','$lname','$country','$password')"))
    print "<script>document.write('Account created :)');</script>";
	
	else {
		echo 'Error :(';
	}
  }
 ?>