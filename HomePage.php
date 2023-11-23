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
      mysqli_query($conn, "INSERT INTO `cart`(user_id, name, price, size, image) VALUES('$user_id', '$product_name', '$product_price', '$product_size', '$product_image')") or die('bquery failed');
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
<title>HOME</title>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css"  href="HomePage.css"/>
<style type="text/css"></style>
</head>

<body>
	
	<?php include 'header.php'; ?>

	<div class="container">
	 <div class="slider-container">
	   <div class="slider">
	     <a href="#"><img src="images/slider1.jpg" alt="image" ></a>
		 <div class="slider-item-text">
			 <h5> A style for every story </h5>
			 <p> Dress Collection</p>
			 <a href="Shop.php">
				 <button>Shop Now</button> </a>
			 
		 </div>
		 </div>	
	   <div class="slider">
	     <a href="#"><img src="images/slider2.jpg" alt="image"></a> 
		 <div class="slider-item-text">
			 <h5> Smart | Stylish | Trendy </h5>
			 <p> Work wear collection </p>
			 <a href="Collection.php">
				 <button>Shop Now</button> </a>
		 </div>	
		 </div>
	   <div class="slider">
	     <a href="#"><img src="images/slider3.jpg" alt="image"></a>
		   <div class="slider-item-text">
			 <h5> Perfect for all seasons </h5>
			 <p> Top Collection</p>
			   <a href="Top.php">
				   <button>Shop Now</button> </a>
		 </div>
		 </div>
	   
		 
		<div class="prev-button" onClick="plusSlide(-1)">&#10094;</div>
		<div class="next-button" onClick="plusSlide(1)">&#10095;</div>
		
		
		 
		 <div class="lines">
			<div class="line" onClick="currentSlide(1)"></div>
		    <div class="line" onClick="currentSlide(2)"></div>
			<div class="line" onClick="currentSlide(3)"></div>
		    <div class="line" onClick="currentSlide(4)"></div>
		 
		</div>
		</div>
	</div>

		<br>
 <!-- <section id="product1">
		<h2>Featured Products</h2>
	    <p>______________</p>
	    <div class="pro-container">
	        <div class="pro">
			    <img src="images/Featured Products/product1.jpg" alt="">
				<div class="des">  
				<h3>ROZANNE V-NECK MAXI DRESS</h3>
				<p>LKR 3400.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/Featured Products/top11.jpg" alt="">
				<div class="des">  
				<h3>KEYANA RED CROP-TOP</h3>
				<p>LKR 2240.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/Featured Products/top12.jpg" alt="">
				<div class="des">  
				<h3>KEYANA PINK CROP-TOP</h3>
				<p>LKR 2240.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/Featured Products/dress4.jpg" alt="">
				<div class="des">  
				<h3>PINK PRINTED MINI DRESS</h3>
				<p>LKR 2990.00</p>
			    </div>
			</div>
			
		    <div class="pro">
			    <img src="images/Featured Products/dress5.jpg" alt="">
				<div class="des">  
				<h3>GREEN FLORAL MINI DRESS</h3>
				<p>LKR 2990.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/Featured Products/office6.jpg" alt="">
				<div class="des">  
				<h3>CLARA PINK WORK WEAR</h3>
				<p>LKR 2300.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/Featured Products/office7.jpg" alt="">
				<div class="des">  
				<h3>TWO TONNED WORK WEAR</h3>
				<p>LKR 2300.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/Featured Products/product8.jpg" alt="">
				<div class="des">  
				<h3>EMILY FRONT DETAILED BLUE TOP</h3>
				<p>LKR 2580.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/Featured Products/top10.1.jpg" width="100" height="350" alt="">
				<div class="des">  
				<h3>WHITE PRINTD BELL SLEEVE TOP</h3>
				<p>LKR 2490.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/Featured Products/office2.jpg" width="100" height="350" alt="">
				<div class="des">  
				<h3>WHITE BUTTONED WORK WEAR </h3>
				<p>LKR 2500.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/Featured Products/jumpsuit3.jpg" width="100" height="350" alt="">
				<div class="des">  
				<h3>OFF-SHOULDER JUMPSUIT</h3>
				<p>LKR 3000.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/Featured Products/product9.jpg" width="100" height="350" alt="" onclick="window.location.href='SProduct.php';">
				<div class="des">  
				<h3>BLACK SHINY PARTY DRESS</h3>
				<p>LKR 3500.00</p>
			    </div>
			</div>
			</div>
	   </div>
		</section>  -->
	
<section class="products">

   <h1 class="title" align="center">Featured Products</h1><br><br><br><br>

   <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` where category='OFFICE'") or die('query failed');
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
		
		<section id="banner" class="section-m1">
		   <h4>DISCOVER THEM ALL</h4>
		   <h2>Upto <span>20% off</span> - On selected items</h2>
		<br>
		   <button class="normal">SHOP NOW</button>
		</section>
	
	 <!--	<section id="product1">
		<h2>New Arrivals</h2>
	    <p>______________</p>
	    <div class="pro-container">
	        <div class="pro">
			    <img src="images/N_Arrivals/arrival1.jpg" alt="">
				<div class="des">  
				<h3>GREY ROUND NECK PRINTED TOP</h3>
				<p>LKR 2790.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/N_Arrivals/arrival2.jpg" alt="">
				<div class="des">  
				<h3>OLIVIA ROUND NECK PRINTED TOP</h3>
				<p>LKR 2890.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/N_Arrivals/arrival3.jpg" alt="">
				<div class="des">  
				<h3>BROWN V-NECK BUTTONED TOP</h3>
				<p>LKR 2890.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/N_Arrivals/arrival4.jpg" alt="">
				<div class="des">  
				<h3>BLACK ROUND NECK BUTTONED TOP</h3>
				<p>LKR 2890.00</p>
			    </div>
			</div>
			
		    <div class="pro">
			    <img src="images/N_Arrivals/arrival5.jpg" alt="">
				<div class="des">  
				<h3>YELLOW ROUND NECK BUTTONED TOP</h3>
				<p>LKR 2790.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/N_Arrivals/arrival6.jpg" alt="">
				<div class="des">  
				<h3>AISLA ROUND NECK TOP</h3>
				<p>LKR 2790.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/N_Arrivals/arrival7.jpg" alt="">
				<div class="des">  
				<h3>BLUE ROUND NECK BUTTONED TOP</h3>
				<p>LKR 2790.00</p>
			    </div>
			</div>
			
			<div class="pro">
			    <img src="images/N_Arrivals/arrival8.jpg" alt="">
				<div class="des">  
				<h3>AMORA PRINTED ROUND NECK TOP</h3>
				<p>LKR 2890.00</p>
			    </div>
			</div>
	   </div>
		</section>   -->
	
	<section class="products">

   <h1 class="title" align="center">Featured Products</h1><br><br><br><br>

      <div class="box-container">

      <?php  
         $select_products = mysqli_query($conn, "SELECT * FROM `products` where category='DRESS'") or die('query failed');
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
		
		<section id="sm-banner" class="section-p1">
		    <div class="banner-box">
			  <h4> DISCOVER THEM ALL </h4>
			  <h1> JUMPSUITS </h1>
			  <span> Essential styles come alive in bright colors </span>
			  <br>
				<br>
				<a href="Jumpsuit.php">
					<button class="white">SHOP NOW</button> </a>
			</div>
	         
			<div class="banner-box banner-box2">
			  <h4> UNIQUE | COMFORT </h4>
			  <h1> DRESSES </h1>
			  <span> The best classic outfit is on sale </span>
			  <br>
				<br>
				<a href="Shop.php">
					<button class="white">SHOP NOW</button> </a>
			</div>
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
		
 <script src="script.js"></script>
</body>
</html>
