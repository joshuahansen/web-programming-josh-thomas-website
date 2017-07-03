<?php session_start();
error_reporting(0); 
if(empty($_SESSION['cart']))
{
	header('Location: cart.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Josh Thomas - Checkout</title>
		<link rel='stylesheet' href='a2style.css' type='text/css'/>
		
		<script>
		
			function prefill()
			{
				if (typeof(Storage) !== "undefined")
				{
					if (localStorage.getItem("firstname") !== null)
					{
						var remembered = document.getElementById("remember");
						remembered.checked = true;
						document.getElementById("firstname").value = localStorage.getItem("firstname");
						document.getElementById("lastname").value = localStorage.getItem("lastname");
						document.getElementById("email").value = localStorage.getItem("email");
						document.getElementById("phone").value = localStorage.getItem("phone");
						document.getElementById("address").value = localStorage.getItem("address");
					}
					else
					{
						/* localStorage not set */
					}
				}
				else
				{
					/* localStorage not available */
				}
			}
			
			function rememberMe()
			{
				localStorage.setItem("firstname", document.getElementById("firstname").value);
				localStorage.setItem("lastname", document.getElementById("lastname").value);
				localStorage.setItem("email", document.getElementById("email").value);
				localStorage.setItem("phone", document.getElementById("phone").value);
				localStorage.setItem("address", document.getElementById("address").value);
			}
			
			function forgetMe()
			{
				localStorage.removeItem("firstname");
				localStorage.removeItem("lastname");
				localStorage.removeItem("email");
				localStorage.removeItem("phone");
				localStorage.removeItem("address");
			}
			
			function resetRemember()
			{
				document.getElementById("remember").checked = false;
			}
			
			function resetForget()
			{
				document.getElementById("forget").checked = false;
			}
			
			function clearDates()
			{
				var select = document.getElementById("expiryYear");
				
				var counter = 0;
				
			    for(counter = select.options.length - counter ; counter >= 0 ; counter--)
			    {
			        select.remove(counter);
			    }
			    
			    populateDates();
			}
		
			function populateDates()
			{
				/* when page is loaded populate credit card expiry years with years from now to 4 years in the future */
				
				var date = new Date();
				
				var currentYear = date.getFullYear();
				
				var maxYear = currentYear + 4;
				var select = document.getElementById("expiryYear");

				var counter = 0;

				for (counter = currentYear; counter <= maxYear; counter++)
				{
    				var year = document.createElement("option");
    				year.value = counter;
    				year.innerHTML = counter;
    				select.appendChild(year);
				}
			}		
						
			function cardExpiry()
			{
				var date = new Date();
				
				var expired = true;
				
				var year = document.getElementById("expiryYear");
				
				var currentYear = parseInt(date.getFullYear());
				
				var selectedYear = parseInt(year.options[year.selectedIndex].value);
				
				if (selectedYear > currentYear)
				{
					expired = false;
					return expired;
				}
				else
				{
					var month = document.getElementById("expiryMonth");
					
					var currentMonth = parseInt(date.getMonth());
					
					var selectedMonth = parseInt(month.options[month.selectedIndex].value);
					
					if (selectedMonth < currentMonth)
					{
						expired = true;
					}
					else
					{
						expired = false;
					}
					
					return expired;
				}
			}
			
			function checkExpiry()
			{
				var expired = cardExpiry();
				
				if (expired)
				{
					document.getElementById("error*").innerHTML = "<b> *</b>"
					document.getElementById("errorMsg").innerHTML = "<b> * Credit Card has expired.</b>"
					event.preventDefault();
				}
			}
			
			function formSubmit()
			{
				checkExpiry();
				
				var remembered = document.getElementById("remember");
				var forgotten = document.getElementById("forget");
				
				if (remembered.checked == true)
				{
					if (typeof(Storage) !== "undefined")
					{
						rememberMe();
					}
					else
					{
						/* localStorage not available */
					}
				}
				else if (forgotten.checked == true)
				{
					if (typeof(Storage) !== "undefined")
					{
						forgetMe();
					}
					else
					{
						/* localStorage not available */
					}
				}
			}

		</script>
	</head>

	<body onload="clearDates();">

	<?php include_once('modules/nav.php'); ?>
	
	<main>	
			<h1>Checkout</h1>
			
			<p>Please enter your billing and delivery information in the following form:</p>
			<br/>
			<br/>
			
			<div class="checkout">
				<form action="confirmation.php" method="post" onsubmit="formSubmit();">
					<label for="firstname">First name:</label>
					<input type="text" name="firstname" id="firstname" pattern="^[-A-Za-z]+((\s)?(('|\.)?([A-Za-z])+))*$" placeholder="e.g John" required>
					<br/>
					<br/>
					<label for="lastname">Last name:</label>
					<input type="text" name="lastname" id="lastname" pattern="^[-A-Za-z]+((\s)?(('|\.)?([A-Za-z])+))*$" placeholder="e.g Smith" required>
					<br/>
					<br/>
					<label for="email">Email Address:</label>
					<input type="email" name="email" id="email" placeholder="e.g john.smith@gmail.com" required>
					<br/>
					<br/>
					<label for="phone">Phone Number:</label>
					<input type="tel" name="phone" id="phone" pattern="^(\(\d{1,3}\)|\d{1,3}|\+\d{1,3}|\(\+\d{1,3}\))*[ ]?\d{4}[ ]?\d{4}$" placeholder="e.g (04) 1234 1234" required>
					<br/>
					<br/>
					<label for="address">Delivery Address:</label>
					<textarea name="address" id="address" rows="2" cols="20" pattern="^([A-Za-z]+|\d+)((\s)?((\'|\-|\.)?([A-Za-z])+|\d+))*$" placeholder="e.g 15 Flemington Road, Melbourne" required></textarea>
					<br/>
					<br/>
					<br/>
					<label for="delivery">Delivery Method:</label>
					<select name="delivery" id="delivery" required>
						<option value="regular">Regular Post: No charge.</option>
						<option value="regularCourier">Regular Courier: $7.00</option>
						<option value="expressCourier">Express Courier: $10.50</option>
					</select>
					<br/>
					<br/>
					<label for="credit">Credit Card Number:</label>
					<input type="text" name="credit" id="credit" pattern="^\d{4}[ ]?\d{4}[ ]?\d{4}[ ]?\d{4}" placeholder="e.g XXXX XXXX XXXX XXXX" style="margin-right: 5px" required>
					<?php
						if (isset($_SESSION['numberAlert']))
						{
							if ($_SESSION['numberAlert'])
							{
								echo "<p>*</p>";
								echo " The credit card number you have entered is invalid. Please try again.";
							}
						}
					?>
					<br/>
					<br/>
					<label for="ccv">CCV Number:</label>
					<input type="text" name="ccv" id="ccv" pattern="^\d{3}$" placeholder="e.g XXX" required>
					<br/>
					<br/>
					<label for="expiryMonth" id="expired">Credit Card Expiry:</label>
					<select name="expiryMonth" id="expiryMonth" required>
						<option value="1">01</option>
						<option value="2">02</option>
						<option value="3">03</option>
						<option value="4">04</option>
						<option value="5">05</option>
						<option value="6">06</option>
						<option value="7">07</option>
						<option value="8">08</option>
						<option value="9">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select>
					<select name="expiryYear" id="expiryYear" style="margin-right: 5px" required>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
						<option value="2020">2020</option>
					</select><p id="error*" style="color:red"></p></br>
					<p id="errorMsg" style="color:red"></p>
					<?php
						if (isset($_SESSON['expiryAlert']))
						{
							if ($_SESSION['expiryAlert'])
							{	
								echo "<p>*</p>";
								echo "The credit card you have entered has expired. Please try again.";
							}
						}
					?>
					<br/>
					<br/>
					<input type="reset" name ="reset" id="reset" value="Reset">
					<input type="submit" id="submit" value="Submit">
					 <div id='savedetails'>
						<label for="remember">Remember Me:</label>
						<input type="checkbox" name="remember" id="remember" value="remember" onclick="resetForget()">
						<label for="remember">Forget Me:</label>
						<input type="checkbox" name="forget" id="forget" value="forget" onclick="resetRemember()">
					</div>
					<script>
						prefill();
					</script>
				</form>
			</div>
	</main>
</body>
<?php include_once('modules/footer.php'); ?>
