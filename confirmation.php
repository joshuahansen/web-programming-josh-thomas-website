<?php session_start(); 
error_reporting(0); 
if(empty($_SESSION['cart']))
{
	header('Location: cart.php');
	exit(); 
}

function cardExpiry()
{
	if ((int) $_POST["expiryYear"] > (int) date('Y'))
	{
		$expired = false;
		return $expired;
	}
	
	$currentMonth = (int) date('m');
	
	$selectedMonth = (int) $_POST["expiryMonth"];
	
	$expired = true;
	
	if ($selectedMonth < $currentMonth)
	{
		$expired = true;
	}
	else
	{
		$expired = false;
	}
	
	return $expired;
}

function checkExpiry()
{
	$expired = cardExpiry();
	
	if ($expired)
	{
		$_SESSION['expiryAlert'] = true;
		unset($_SESSION['refreshed']);
		header('Location: checkout.php');
	}
}

function checkNumber()
{
	$credit = $_POST["credit"];
	
	$matches = preg_match("/^\d{4}[ ]?\d{4}[ ]?\d{4}[ ]?\d{4}$/", $credit);
	
	if (!$matches)
	{
		$_SESSION['numberAlert'] = true;
		unset($_SESSION['refreshed']);
		header('Location: checkout.php');
	}
}

function getDeliveryCost()
{
	$deliveryCost;
	
	if (strcmp($_POST['delivery'], "regular") == 0)
	{
		$deliveryCost = 0.00;
	}
	else if (strcmp($_POST['delivery'], "regularCourier") == 0)
	{
		$deliveryCost = 7.00;
	}
	else if (strcmp($_POST['delivery'], "expressCourier") == 0)
	{
		$deliveryCost = 10.50;
	}
	
	return $deliveryCost;
}

function getDeliveryMethod()
{
	$deliveryMethod;
	
	if (strcmp($_POST['delivery'], "regular") == 0)
	{
		$deliveryMethod = "Regular";
	}
	else if (strcmp($_POST['delivery'], "regularCourier") == 0)
	{
		$deliveryMethod = "Regular Courier";
	}
	else if (strcmp($_POST['delivery'], "expressCourier") == 0)
	{
		$deliveryMethod = "Express Courier";
	}
	
	return $deliveryMethod;
}

function writeToFile($billingArray)
{
	$sessionLength = count($_SESSION['cart']);
	$filename = "orders.txt";
	
	$orderSeperator = "****************************************".PHP_EOL;
	$newline = "".PHP_EOL;
	$orderSummary = "ORDER SUMMARY:".PHP_EOL;
	
	$item;
	$media;
	$quantity;
	$price;
	
	$billingInformation = "BILLING INFORMATION:".PHP_EOL;
	$fullname = $billingArray[0];
	$email = $billingArray[1];
	$phone = $billingArray[2];
	$address = $billingArray[3];
	
	$delivery = $billingArray[4];
	$deliveryCostNumber = $billingArray[5];
	$deliveryCostString = "Delivery Cost: $" . $deliveryCostNumber.PHP_EOL;
	
	$total = "Total: $" . number_format((((float)$_SESSION['totalCost'])+(number_format((float)$deliveryCostNumber, 2, '.', ''))), 2, '.', '').PHP_EOL;
	
	file_put_contents($filename, $orderSeperator, FILE_APPEND);
	file_put_contents($filename, $newline, FILE_APPEND);
	file_put_contents($filename, $orderSummary, FILE_APPEND);
	file_put_contents($filename, $newline, FILE_APPEND);
	
	for($x = 0; $x < $sessionLength; $x++)
	{
		$item = "Item: " . $_SESSION['cart'][$x]["season"].PHP_EOL;
		$media = "Media Type: " . $_SESSION['cart'][$x]["media"].PHP_EOL;
		$quantity = "Quantity: " . $_SESSION['cart'][$x]["qty"].PHP_EOL;
		$price = "Price: $" . number_format((float)$_SESSION['cart'][$x]["price"], 2, '.', '').PHP_EOL;
		
		file_put_contents($filename, $item, FILE_APPEND);
		file_put_contents($filename, $media, FILE_APPEND);
		file_put_contents($filename, $quantity, FILE_APPEND);
		file_put_contents($filename, $price, FILE_APPEND);
		file_put_contents($filename, $newline, FILE_APPEND);
	}
	
	file_put_contents($filename, $delivery, FILE_APPEND);
	file_put_contents($filename, $deliveryCostString, FILE_APPEND);
	file_put_contents($filename, $total, FILE_APPEND);
	file_put_contents($filename, $newline, FILE_APPEND);
	
	file_put_contents($filename, $billingInformation, FILE_APPEND);
	file_put_contents($filename, $newline, FILE_APPEND);
	file_put_contents($filename, $fullname, FILE_APPEND);
	file_put_contents($filename, $email, FILE_APPEND);
	file_put_contents($filename, $phone, FILE_APPEND);
	file_put_contents($filename, $address, FILE_APPEND);
	file_put_contents($filename, $delivery, FILE_APPEND);
	file_put_contents($filename, $newline, FILE_APPEND);
	file_put_contents($filename, $orderSeperator, FILE_APPEND);
	
	session_destroy();
}

if (isset($_GET['write']) == true)
{
	writeToFile($_SESSION["billing"]);
	header('Location: index.php');
}
else
{
	checkExpiry();
	checkNumber();
}

$postlength = count($_POST);

$billingArray = array(5);

if ($postlength > 1)
{
	$billingArray = array(6);
	
	$fullname = "Full Name: " . $_POST['firstname'] . " " . $_POST['lastname'].PHP_EOL;
	$email = "E-mail Address: " . $_POST['email'].PHP_EOL;
	$phone = "Contact Phone: " . $_POST['phone'].PHP_EOL;
	$address = "Delivery Address: " . $_POST['address'].PHP_EOL;
	$delivery = "Delivery Method: " . getDeliveryMethod().PHP_EOL;
	$deliveryCost = number_format((float)getDeliveryCost(), 2, '.', '');
	
	$billingArray[0] = $fullname;
	$billingArray[1] = $email;
	$billingArray[2] = $phone;
	$billingArray[3] = $address;
	$billingArray[4] = $delivery;
	$billingArray[5] = $deliveryCost;
	
	$_SESSION["billing"] = $billingArray;
}
?>
<!DOCTYPE html>
    <head>
		<title>Josh Thomas - Confirmation</title>
		<link rel='stylesheet' href='a2style.css' type='text/css'/>
		
		<script>
			function reload()
			{
				location.reload();
			}
		</script>
	</head>

	<body>
	<?php include_once('modules/nav.php'); ?>
	<main>	
		<h1>Confirmation</h1>
		
		<p>Please confirm your order details below. Please check your receipt carefully to ensure you are purchasing the correct number of items.</p>
		<br/>
		<br/>
		<div class="receipt">
			
		<?php
			$sessionLength = count($_SESSION['cart']);
			$postLength = count($_POST);
			$creditDisplay = substr($_POST['credit'], -4);
			
			echo "****************************************";
			echo "<br/>";
			echo "<br/>";
			
			echo "ORDER SUMMARY:";
			echo "<br/>";
			echo "<br/>";
			
			for($x = 0; $x < $sessionLength; $x++)
			{
				echo "Item:       " . $_SESSION['cart'][$x]["season"];
				echo "<br/>";
				echo "Media Type: " . $_SESSION['cart'][$x]["media"];
				echo "<br/>";
				echo "Quantity:   " . $_SESSION['cart'][$x]["qty"];
				echo "<br/>";
				echo "Price:     $" . number_format((float)$_SESSION['cart'][$x]["price"], 2, '.', '');
				echo "<br/>";
				echo "<br/>";
			}
			
			echo "Delivery Method: " . getDeliveryMethod();
			echo "<br/>";
			echo "Delivery Cost: $" . number_format((float)getDeliveryCost(), 2, '.', '');
			echo "<br/>";
			echo "Total:	 $" . number_format((((float)$_SESSION['totalCost'])+(number_format((float)getDeliveryCost(), 2, '.', ''))), 2, '.', '');
			echo "<br/>";
			echo "<br/>";
			
			echo "BILLING INFORMATION:";
			echo "<br>";
			echo "<br>";
			
			echo "Full Name: " . $_POST['firstname'] . " " . $_POST['lastname'];
			echo "<br/>";
			echo "E-mail Address: " . $_POST['email'];
			echo "<br/>";
			echo "Contact Phone: " . $_POST['phone'];
			echo "<br/>";
			echo "Delivery Address: " . $_POST['address'];
			echo "<br/>";
			echo "Delivery Method: ";
			echo getDeliveryMethod();
			echo "<br/>";
			echo "Credit Card: xxxx xxxx xxxx " . $creditDisplay;
			
			echo "<br/>";
			echo "<br/>";
			echo "****************************************";
			echo "<br/>";
			echo "<br/>";
		?>
		
		<form method="post" action="cart.php">
			<input type="submit" id="cancel" value="Cancel">
		</form>
		
		<form method="post" action="confirmation.php?write=true" onsubmit="reload()">
			<input type="hidden" id="firstname" value="test">
			<input type="submit" id="confirm" value="Confirm">
		</form>
		
		</div>
    </main>
    <?php include_once('modules/footer.php'); ?>
