<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>

<?php
$conn = mysqli_connect('localhost','root','','evaluation_08') or die('connection failed');
session_start();

$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
}

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
	$product_size = $_POST['size'];
   $check_cart_numbers = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id = '$user_id'") or die('query failed');

   if(mysqli_num_rows($check_cart_numbers) > 0){
      $message[] = 'already added to cart!';
   }else{
	   
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, image,size) VALUES( '$user_id','$product_name', '$product_price', '$product_image','$product_size')") or die('bquery failed');
	   
      $message[] = 'product added to cart!';
   }

}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-compatible" content"IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>TOPS</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link rel="stylesheet" type="text/css"  href="HomePage.css"/>
<style type="text/css"></style>
</head>

<body>
	
	<?php include 'header.php'; ?>
	<section id="page-header">
		<h2>#STAYHOME</h2>
		<p>Shop your favourite styles</p>
	</section>
		
	<br>
   	<section class="products">

   <h1 class="title" align="center">Featured Products</h1><br><br><br><br>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` where category='TOP'") or die('query failed');
         if(mysqli_num_rows($select_products) > 0){
            while($fetch_products = mysqli_fetch_assoc($select_products)){
      ?>
     <form action="" method="post" class="box">
      <img class="image" src="Productimages/<?php echo $fetch_products['image']; ?>" alt="">
      <div class="name"><?php echo $fetch_products['name']; ?></div>
      <div class="price">LKR <?php echo $fetch_products['price']; ?></div>
      <input type="hidden" name="product_name" value="<?php echo $fetch_products['name']; ?>">
      <input type="hidden" name="product_price" value="<?php echo $fetch_products['price']; ?>">
      <input type="hidden" name="product_image" value="<?php echo $fetch_products['image']; ?>">
		
		 <label for="size">Select size:</label>
  			<select name="size" id="size">
    		<option value="S">S</option>
  		    <option value="M">M</option>
   		    <option value="L">L</option>
  		 </select>
		 <div class="addtocart">
		 <input type="submit" value="add to cart" name="add_to_cart" class="btn">
		</div> 
     </form>
      <?php
         }
      }else{
         echo '<p class="empty">NO PRODUCTS</p>';
      }
      ?>
   </div>



</section> 
	
	<section id="pagination" class="section-p1">
		 <a href="#">1</a>
	     <a href="#">2</a>
		 <a href="#" class="icon">&#8594</a>
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
		
 <script src="script.js"></script>
</body>
</html>