
<?php

$conn = mysqli_connect('localhost','root','','evaluation_08') or die('connection failed');

session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};



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
    

<?php include 'Header.php'; ?>


<section class="search-form">
   <form action="" method="post">
      <input type="text" name="search" placeholder="search products..." class="box">
      <input type="submit" name="submit" value="search" class="btn">
   </form>
</section>

<section class="products">

   <div class="box-container" padd>
   <?php
      if(isset($_POST['submit'])){
         $search_item = $_POST['search'];
         $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%{$search_item}%'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
   ?>
   <form action="" method="post" class="box">
      <img src="Productimages/<?php echo $fetch_product['image']; ?>" alt="" class="image">
      <div class="name"><?php echo $fetch_product['name']; ?></div>
      <div class="price">$<?php echo $fetch_product['price']; ?>/-</div>
      <input type="number"  class="qty" name="product_quantity" min="1" value="1">
      <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
      <input type="submit" class="btn" value="add to cart" name="add_to_cart">
   </form>
   <?php
            }
         }else{
            echo '<p class="empty">no result found!</p>';
         }
      }else{
         echo '<p class="empty">search something!</p>';
      }
   ?>
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
			   <a href="About.php">About Us</a>
			   <a href="delivery.php">Delivery Information</a>
			   <a href="sizeguide.php">Size Guide</a>
			   <a href="returns.php">Return Policy</a>
			   <a href="promotions.php">Promotions</a>
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