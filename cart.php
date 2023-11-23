<?php

$conn = mysqli_connect('localhost','root','','evaluation_08') or die('connection failed');

session_start();

$user_id = $_SESSION['user_id'];
					


if(!isset($user_id)){
   header('location:login.php');
}


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$delete_id'") or die('query failed');
   header('location:cart.php');
}

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
   header('location:cart.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="HomePage.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">

	
</head>
<body>
    

<?php include 'header.php'; ?>

	



<section class="shopping-cart">

   <h1 class="title">products added</h1>

   <div class="box-container">
      <?php
         $grand_total = 0;
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){   
      ?>
      <div class="box">
         <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="fas fa-times" onclick="return confirm('delete this from cart?');"></a>
         <img src="Productimages/<?php echo $fetch_cart['image']; ?>" alt="">
         <div class="name"><?php echo $fetch_cart['name']; ?></div>
         <div class="price">$<?php echo $fetch_cart['price']; ?>/-</div>

         <div class="sub-total"> sub total : <span>$<?php echo $sub_total = ($fetch_cart['price']); ?>/-</span> </div>
      </div>
      <?php
      $grand_total += $sub_total;
         }
      }else{
         echo '<p class="empty">your cart is empty</p>';
      }
      ?>
   </div>

   <div style="margin-top: 2rem; text-align:center;">
      <a href="Cart.php?delete_all" class="delete-btn <?php echo ($grand_total > 1)?'':'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all</a>
   </div>

   <div class="cart-total">
      <p>Total : <span>$<?php echo $grand_total; ?>/-</span></p>
      <div class="flex">
         <a href="Menu.php" class="option-btn">continue shopping</a>
         <a href="checkout.php" class="btn <?php echo ($grand_total > 1)?'':'disabled'; ?>">proceed to checkout</a>
      </div>
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
			   <a href="wishlist.php">Wishlist</a>
			</div>
			
			<div class="col">
			   <h4>LET US HELP YOU</h4>
			   <a href="Faq.php">FAQ'S</a>
			   <a href="Terms.php">Terms And Conditions</a>
			   <a href="Exchange.php">Exchange Policy</a>
			   <a href="Privacy.php">Privacy Policy</a>
			   <a href="Contact.php">Contact Us</a>
			</div>
			
			<div class="col payment">
			<p>Secured Payment Gateways</p>
				<img src="images/Payment.png" width="50" height="50" alt="">
			</div>
			
			<div class="copyright">
			     <p style="text-align: center"> © 2022 LadyHolton, All Rights Reserved.</p>
			</div>
		</footer>
	
	
<script src="js/script.js"></script>

</body>
</html>