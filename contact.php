<?php

$conn = mysqli_connect('localhost','root','','evaluation_08') or die('connection failed');

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['send'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $number = $_POST['number'];
   $msg = mysqli_real_escape_string($conn, $_POST['message']);

   $select_message = mysqli_query($conn, "SELECT * FROM `contact` WHERE name = '$name' AND email = '$email' AND number = '$number' AND message = '$msg'") or die('aquery failed');

   if(mysqli_num_rows($select_message) > 0){
      $message[] = 'message sent already!';
   }else{
      mysqli_query($conn, "INSERT INTO `contact`(user_id, name, email, number, message) VALUES('$user_id', '$name', '$email', '$number', '$msg')") or die('bquery failed');
      $message[] = 'message sent successfully!';
   }

}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-compatible" content"IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>CONTACT US</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link rel="stylesheet" type="text/css"  href="HomePage.css"/>
<style type="text/css"></style>
</head>

<body>
	
	<?php include 'header.php'; ?>
	<br>
	
	<section id="heading">
		<h2>CONTACT US</h2>
		<p>Hey! How Can We Help You?</p>
	</section>
	
	<section id="contact-details" class="section-p1">
		<div class="details">
		 <span>GET IN TOUCH</span>
		 <h2>LADY HOLTON</h2>
		 <h3>Company information</h3>
		 <p>We believe in delivering excellent products and we are dedicated to satisfy our customers.<br>Please send us a message for any inquiries and we will reply to you as soon as possible. </p>
		 <div>
			<li>
			  <i class="far fa-map"></i>
			  <p>31/16 1st Lane, Narahenpita - Nawala Rd, Colombo, Sri Lanka 10250</p>
			 </li>
			 <li>
			  <i class="far fa-envelope"></i>
			  <p>holtonlady@gmail.com</p>
			 </li>
			 <li>
			  <i class="fas fa-phone-alt"></i>
			  <p>077 377 7741</p>
			 </li>
			 <li>
			  <i class="far fa-clock"></i>
			  <p>9:30AM – 6.00PM, Monday - Sunday</p>
			 </li>
			</div>
		</div>
		
		<div class="map">
		 <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.127242025874!2d79.885471!3d6.8867932!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x6a31ac020561074b!2sLady%20Holton!5e0!3m2!1sen!2slk!4v1655219774854!5m2!1sen!2slk" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
	</section>
	
	<section id="form-details">
		<form action="" method="post">
      <h3>say something!</h3>
      <input type="text" name="name" required placeholder="enter your name" class="box">
      <input type="email" name="email" required placeholder="enter your email" class="box">
      <input type="number" name="number" required placeholder="enter your number" class="box">
      <textarea name="message" class="box" placeholder="enter your message" id="" cols="30" rows="10"></textarea>
      <input type="submit" value="send message" name="send" class="btn">
   </form>
		
	</section>
	
	<section id="newsletter" class="section-p1 section-m1">
		      <div class="newstext">
			      <h4> BE THE FIRST ONE TO KNOW</h4>
				  <p>About our latest styles and <span> special offers</span></p>
			 </div>
			 <div class="form">
			        <input type="text" placeholder="Your Email Address">
				    <button class="normal">Sign Up</button>
			 </div>
		</section>
	
		<footer id="footer" class="section-p1">
		     <div class="col">
				 <h4>CONTACT</h4>
				 <p><strong>Address: </strong> 31/16 1st Lane, Narahenpita -  Nawala Rd, Colombo, Sri Lanka 10250
				 </p>
				 <p><strong>Phone:</strong> 077 377 7741</p>
				 <p><strong>Hours:</strong> 9:30AM – 6.00PM, Mon - Sun</p>
				    
				 <div class="follow">
                    <h4>FOLLOW US ON</h4>
					<div class="icon">
						<a href="https://www.facebook.com/LADYHOLTON/"><i class="fab fa-facebook-f"></i></a>
						<a href="https://www.instagram.com/ladyholtoncolombo/"><i class="fab fa-instagram"></i></a>
						<a href="https://www.youtube.com/channel/UCqAtFH5_-gcKWzu8TuKnwRw"><i class="fab fa-youtube"></i></a>
					</div>
				 </div>
			</div>
			
			<div class="col">
			   <h4>INFORMATION</h4>
			   <a href="about.php">About Us</a>
			   <a href="delivery.php">Delivery Information</a>
			   <a href="sizeguide.php">Size Guide</a>
			   <a href="returns.php">Return Policy</a>
			   <a href="promotions.php">Promotions</a>
			</div>
			
			<div class="col">
			   <h4>LET US HELP YOU</h4>
			   <a href="Faq.php">FAQ'S</a>
			   <a href="terms.php">Terms And Conditions</a>
			   <a href="exchange.php">Exchange Policy</a>
			   <a href="privacy.php">Privacy Policy</a>
			   <a class="active" href="contact.php">Contact Us</a>
			</div>
			
			<div class="col payment">
			<p>Secured Payment Gateways</p>
				<img src="images/Payment.png" width="50" height="50" alt="">
			</div>
			
			<div class="copyright">
			     <p style="text-align: center"> © 2022 LadyHolton, All Rights Reserved.</p>
			</div>
		</footer>
		
 <script src="script.js"></script>
</body>
</html>