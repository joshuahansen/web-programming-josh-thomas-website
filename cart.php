<!DOCTYPE html>
<?php session_start();
error_reporting(0);  
	$cart;
	$min = 0;
	$max = 5;
	$prices = array('s1price' => 17.00, 's2price' => 22.50, 's3price' => 26.75);
	function calcTotal() {
		$tCost = 0;
		$arraylength = count($_SESSION['cart']);
		for($x = 0; $x < $arraylength; $x++)
		{
			$tCost += $_SESSION['cart'][$x]['price'];
		}
		$_SESSION['totalCost'] = $tCost;
	}
	if(isset($_POST['plm']))
	{
		if (filter_var($_POST['plm']['S1'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false || 
			filter_var($_POST['plm']['S2'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false
			|| filter_var($_POST['plm']['S3'], FILTER_VALIDATE_INT, array("options" => array("min_range"=>$min, "max_range"=>$max))) === false) {
    		// $validate = "No items where added to the cart";
			}
		else {
  
			if($_POST['plm']['S1'] > 0)
			{
				$cart = array("season" => "Season 1", "qty" => $_POST['plm']['S1'], "price" => $prices['s1price'] * $_POST['plm']['S1'], "media" => $_POST["media"], "remove" => "S1");
				$_SESSION['cart'][] = $cart;
			}
		
			if($_POST['plm']['S2'] > 0)
			{
				$cart= array("season" => "Season 2", "qty" => $_POST['plm']['S2'], "price" => $prices['s2price'] * $_POST['plm']['S2'], "media" => $_POST["media"], "remove" => "S2");
				$_SESSION['cart'][] = $cart;
			}

			if($_POST['plm']['S3'] > 0)
			{
				$cart = array("season" => "Season 3", "qty" => $_POST['plm']['S3'], "price" => $prices['s3price'] * $_POST['plm']['S3'], "media" => $_POST["media"], "remove" => "S3");
				$_SESSION['cart'][] = $cart;
			}
			calcTotal();
		}		
	}	
	$item;
	unset($item);
	if(isset($_GET['S1']) == true)
	{
		if(isset($_GET['DVD']) == true)
		{
			$type = "DVD";
		}
		else
		{
			$type = "BluRay";
		}
		$arraylength = count($_SESSION['cart']);
		for($x = 0; $x < $arraylength; $x++)
		{
			if(strcmp($_SESSION['cart'][$x]['season'], "Season 1") == 0 && strcmp($_SESSION['cart'][$x]['media'], $type) == 0)
			{
				$item = $x;
				unset($_SESSION['cart'][$item]);
			}
		}
		$_SESSION['cart'] = array_values($_SESSION['cart']);
		
		calcTotal();
	}
	else if(isset($_GET['S2']) == true)
	{
		if(isset($_GET['DVD']) == true)
		{
			$type = "DVD";
		}
		else
		{
			$type = "BluRay";
		}
		$arraylength = count($_SESSION['cart']);
		for($x = 0; $x < $arraylength; $x++)
		{
			if(strcmp($_SESSION['cart'][$x]['season'], "Season 2") == 0 && strcmp($_SESSION['cart'][$x]['media'], $type) == 0)
			{
				$item = $x;
				unset($_SESSION['cart'][$item]);
			}
		}
		$_SESSION['cart'] = array_values($_SESSION['cart']);
		calcTotal();
	}
	else if(isset($_GET['S3']) == true)
	{
		if(isset($_GET['DVD']) == true)
		{
			$type = "DVD";
		}
		else
		{
			$type = "BluRay";
		}
		$arraylength = count($_SESSION['cart']);
		for($x = 0; $x < $arraylength; $x++)
		{
			if(strcmp($_SESSION['cart'][$x]['season'], "Season 3") == 0 && strcmp($_SESSION['cart'][$x]['media'], $type) == 0)
			{
				$item = $x;
				unset($_SESSION['cart'][$item]);
			}
		}
		$_SESSION['cart'] = array_values($_SESSION['cart']);
		calcTotal();
	}
	if(isset($_GET['emptycart']) == true)
	{	$arraylength = count($_SESSION['cart']);
		for($x = 0; $x  < $arraylength; $x++)
		{
			unset($_SESSION['cart'][$x]);
		}
		calcTotal();
	}

	?>   
   <head>
		<title>Josh Thomas - Cart</title>
		<link rel='stylesheet' href='a2style.css' type='text/css'/>
	</head>

	<body>
	<?php include_once('modules/nav.php'); ?>
	<main>	
			<h1>Cart</h1>
			
			<div id="cartLayout">
				<?php
			if ( empty($_SESSION['cart']) )
	    	{
	    		 echo "<div id='cartEmptyMsg'><p class='msg'>Cart is Empty</p></div>";
	    	}
			?>
				<div id="cartseason">
					<p class="carttext2">Season:</p>
					</br>
					</br>
					<?php
					if(!empty($_SESSION['cart']))
					{
						$arraylength = count($_SESSION['cart']);
						for($x = 0; $x < $arraylength; $x++)
						{
							echo $_SESSION['cart'][$x]["season"];
							echo "</br></br>";
						}
					}
					?>
				</div>
				<div id="cartmedia">
					<p class="carttext">Media Type:</p>
					</br>
					</br>
					<?php
					if(!empty($_SESSION['cart']))
					{
						$arraylength = count($_SESSION['cart']);
						for($x = 0; $x < $arraylength; $x++)
						{
							echo $_SESSION['cart'][$x]["media"];
							echo "</br></br>";
						}
					}
					?>
				</div>
				<div id="cartqty">
					<p class="carttext">Quantity:</p>
					</br>
					</br>
					<?php
					if(!empty($_SESSION['cart']))
					{
						$arraylength = count($_SESSION['cart']);
						for($x = 0; $x < $arraylength; $x++)
						{
							echo $_SESSION['cart'][$x]["qty"];
							echo "</br></br>";
						}
					}
					?>
				</div>
				<div id="cartprice">
					<p class="carttext2">Price:</p>
					</br>
					</br>
					<?php
					if(!empty($_SESSION['cart']))
					{
						$arraylength = count($_SESSION['cart']);
						for($x = 0; $x < $arraylength; $x++)
						{
							echo number_format((float)$_SESSION['cart'][$x]["price"], 2, '.', '');
							echo "</br></br>";
						}
					}
					?>
				</div>
				<div id="remove">
					</br></br>
					<?php
					if(!empty($_SESSION['cart']))
					{
						$arraylength = count($_SESSION['cart']);
						for($x = 0; $x < $arraylength; $x++)
						{
							$remove = $_SESSION['cart'][$x]['remove'];
							$type = $_SESSION['cart'][$x]['media'];
							echo "<a href='cart.php?$remove=true&$type=true'><div class='remove'>Remove</div></a>";
							echo "</br></br>";
						}
					}	
					?>
				</div>
			
				<div id="total">
					<p>Total: $<?php 
							if(!empty($_SESSION['totalCost']))
							{
								echo number_format((float)$_SESSION['totalCost'], 2, '.', ''); 
							}
						?>
					</p>
				</div>
				
				<a href="checkout.php">
					<div id="checkout">
					Checkout
					</div>
				</a>
				
				<a href="shop.php">
					<div id="backtoShop">
					Back To</br>Shop
					</div>
				</a>
				<a href="cart.php?emptycart=true">
					<div id="emptycart">
					Empty Cart
					</div>
				</a>
			</div>
    </main>
    <?php include_once('modules/footer.php'); ?>
