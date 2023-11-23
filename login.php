<?php $con = mysqli_connect('localhost','root','','evaluation_08') or die('connection failed');
session_start() ; ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Evaluation 08</title>
<link  rel="stylesheet" type="text/css" href="logincss.css"/>
<style type="text/css"></style>
</head>

<body>
<form id="form1" name="form1" method="post" action="login.php">
<table width="498" height="545" border="0" align="center" cellpadding="5">
  <tbody>
    <tr>
      <td height="219" colspan="2" style="text-align: center; font-size: 36px;"><p>
        <input name="imageField" type="image" id="imageField" src="images/image.jpg" width="300" height="200">
      </p>
      <p>LOGIN</p></td>
    </tr>
    <tr>
      <td width="240" style="font-size: 24px">Email</td>
      <td width="232"><span style="font-size: 24px">
        <input name="txtEmail" type="text" required="required" id="txtEmail" placeholder="Email Address" autofocus >
      </td>
    </tr>
    <tr>
      <td><label for="password" style="font-size: 24px">Password</label></td>
      <td><input type="password" name="txtpassword" id="txtpassword" required="required" maxlength="12" autocomplete="off" placeholder="Password"></td>
    </tr>
	  <?php
	  if(isset($_POST["btnsubmit"]))
	  {
		  $email = $_POST["txtEmail"];
		  $password = $_POST["txtpassword"];  //Read the values from the textfields
	      $valid = false;
		  
		  $con = mysqli_connect("localhost","root","","evaluation_08");  //creating connection
		  
		   if(!$con) //checking whether its working
				 {
					 die("Cannot connect to the database server");   
				 }
		  
		  $sql = "SELECT * FROM `user` WHERE `Email` = '".$email."' and `Password` = '".$password."'";
		  
		   $result = mysqli_query($con,$sql);
		  
		  
		  if(mysqli_num_rows($result) > 0 )
				  {
				           $valid = true;
				  }
				
				else
				{
					$valid = false; 
				}
		  
				if($valid)
				{ 
				$row = mysqli_fetch_assoc($result);	
         $_SESSION['user_email'] = $row['email'];
         $_SESSION['user_id'] = $row['id'];
					//created a session
					header('Location:HomePage.php'); //redirect to another page if username and pw valid
				}
		  
				else
				{
					echo "Please enter correct Email and Password";
				}
			
	  }  
	  ?>
    <tr>
      <td colspan="2">&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2"><input type="checkbox" name="chkRemember" id="chkRemember">
        Remember me</td>
    </tr>
    <tr>
      <td colspan="2" style="text-align: right"><input type="submit" name="btnsubmit" id="btnsubmit" value="LOGIN"></td>
    </tr>
    <tr>
      <td height="29" colspan="2">Not registered? <a href="registration.php"> Create an account </a></td>
    </tr>
  </tbody>
</table>
</form>
</body>
</html>