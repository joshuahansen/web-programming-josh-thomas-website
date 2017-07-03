	<?php
		$itemCount = 0;
		if(isset($_SESSION['cart']))
		{
			$arraylength = count($_SESSION['cart']);
			for($x = 0; $x < $arraylength; $x++)
			{
				$itemCount += $_SESSION['cart'][$x]['qty'];
			}
		}
		?>
		<nav>
			<ul class="topnav">
				<li class="nav" id="mainHeading"><b>Josh Thomas</b></li>
				<li class="nav"><a href="index.php" class="navbutton">Home</a></li>
				<li class="nav"><a href="contact.php" class="navbutton">Contact</a></li>
				<li class="nav"><a href="shop.php" class="navbutton">Shop</a></li>
				<li class="nav"><a href="cart.php" class="navbutton">Cart (<?php echo $itemCount?>)</a></li>
				<li class="nav"><a href="checkout.php" class="navbutton">Checkout</a></li>
			</ul>
		</nav>
		
		<img src="images/josh_thomas.png" id="mainImage" alt="An image of Josh Thomas.">