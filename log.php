<?php
session_start();
error_reporting(0);
include('dbconnection.php');
if(isset($_POST['login']))
{
 $emailcon=$_POST['emailcont'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"select ID from tbluser where  (Email='$emailcon' || MobileNumber='$emailcon') && Password='$password' ");
$ret=mysqli_fetch_array($query);
if($ret>0){
$_SESSION['uid']=$ret['ID'];
echo "<script type='text/javascript'> document.location ='dashboard.php'; </script>";
  }else{
 echo "<script>alert('Invalid Details');</script>";
 }}
 ?>
 
 <!DOCTYPE html>
 <html>
 <head>
 <title>login</title>
 </head>
 <body>
    <center>
	<form method="POST">
<div class="input-group">
     <div class="card-body">
	 <h2 class="title">Login Form</h2>                         
<input type="text" class="input--style-1" placeholder="Registered Email or Contact Number" required="true" name="emailcont">
</div>
<br>
<div class="row row-space">
<div class="col-2">
<div class="input-group">
<input type="password" class="input--style-1" placeholder="Password" name="password" required="true">
</div>
</div>
</div><br>
                        
<div class="p-t-20">
<button class="btn btn--radius btn--green" type="submit" name="login">Sign IN</button>
</div><br>
    <p>Don't have an account ?<a href="sign.php">CREATE AN ACCOUNT</a></p>
</form>
   </center>
</body>
</html>