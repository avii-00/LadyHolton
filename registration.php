<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Evaluation 08</title>
<link rel="stylesheet" type="text/css" href="Regcss.css"/>
<style type="text/css">
body {
    
}
</style>
</head>

<body style="text-align: center; font-family: Constantia, 'Lucida Bright', 'DejaVu Serif', Georgia, serif; font-size: 24px; color: #8B7272;">
<table width="641" height="191" border="0" align="center" cellpadding="5" class="one">
  <tbody style="text-align: left" class="three">
    <tr style="text-align: right; color: #FFFFFF;">
      <td width="692"><span style="text-align: center"></span>        <span style="text-align: center"></span>        <span style="text-align: center"></span>        <h1><span style="text-align: left; color: #FFFBFB; font-size: 36px;">SIGN UP  </span><img src="images/image.jpg" width="249" height="136" alt=""/></h1></td>
    </tr>
  </tbody>
</table>
<form id="form1" name="form1" method="post" action="registration.php">
  <table width="641" height="420" border="0" align="center" cellpadding="5" class="two">
    <tbody>
      <tr>
        <td width="252">First Name</td>
        <td width="359"><input name="txtFirstName" type="text" required="required" id="txtFirstName" placeholder="Type your First Name" autofocus ></td>
      </tr>
      <tr>
        <td>Last Name</td>
        <td><input name="txtLastName" type="text" required="required" id="txtLastName" placeholder="Type your Last Name"></td>
      </tr>
      <tr>
        <td>Email</td>
        <td><input type="text" name="txtEmail" id="txtEmail" placeholder="Enter your Email Address"></td>
      </tr>
      <tr>
        <td>Contact Number</td>
        <td><input name="txtCnumber" type="text" required="required" id="txtCnumber" maxlength="10" placeholder="Enter your Contact Number" autocomplete="off"></td>
      </tr>
      <tr>
        <td>Contact Address</td>
        <td><textarea name="txtAddress" required="required" id="txtAddress" placeholder="Enter a Permanent Address"  autocomplete="off"></textarea></td>
      </tr>
      <tr>
        <td>Password</td>
        <td><input name="txtPassword" type="password" required="required" id="txtPassword" maxlength="12" autocomplete="off"></td>
      </tr>
      <tr>
        <td>Confirm Password</td>
        <td><input name="txtCpassword" type="password" required="required" id="txtCpassword" maxlength="12" autocomplete="off"></td>
      </tr>
      <tr>
        <td colspan="2"> <input name="chkTerms" type="checkbox" required="required" id="chkTerms">
        I agree to all terms &amp; policy</td>
      </tr>
      <tr>
        <td colspan="2"><a href="https://vfefbebetbhte.lk/">Return to store</a></td>
      </tr>
      <tr>      </tr>
    </tbody>
  </table>
  <span style="text-align: right" colspan="2"></span>
  <table width="716" border="0" align="center" cellpadding="5" class="two">
    <tbody>
      <tr>      </tr>
    </tbody>
  </table>
  <span style="text-align: right" colspan="2"></span>
  <table width="641" border="0" align="center" cellpadding="5" class="two">
    <tbody>
      <tr>
        <td width="669" colspan="2"><input type="submit" name="btnsubmit" id="btnsubmit" value="Sign Up Now"></td>
      </tr>
      <tr>
        <td colspan="2">Already have an account? <a href="login.php">Login</a></td>
      </tr>
    </tbody>
  </table>
</form>
<p>&nbsp;</p>
</body>
	<?php
	
	if(isset($_POST["btnsubmit"]))   //check whether button is clicked or not
	{
		$email = $_POST["txtEmail"];
		$FirstName = $_POST["txtFirstName"];
		$LastName = $_POST["txtLastName"];
		$Contact = $_POST["txtCnumber"];
		$Address = $_POST["txtAddress"];
		$Password = $_POST["txtPassword"];
		
		$con = mysqli_connect("localhost","root","","evaluation_08"); 
		
		if(!$con) 
				 {
					 die("Cannot connect to the database server");   
				 }
		
		$sql = "INSERT INTO `user` (`Email`, `FirstName`, `LastName`, `Contact`, `Address`, `Password`) VALUES ('".$email."', '".$FirstName."', '".$LastName."', '.$Contact.', '".$Address."', '".$Password."');";
		
		mysqli_query($con,$sql);
		
		header('Location:login.php');
	}
	
	?>
	
</html>
