<?php session_start();
error_reporting(0); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Josh Thomas - Contact</title>
		<link rel='stylesheet' href='a2style.css' type='text/css'/>
		
		<script>
			function getFlexibility()
			{
				var rangeValue = document.getElementById("range").value;
				
				if (rangeValue == 0)
				{
					document.getElementById("flexibility").value = "inflexible";
				}
				else if (rangeValue == 1)
				{
					document.getElementById("flexibility").value = "flexible";
				}
				else if (rangeValue == 2)
				{
					document.getElementById("flexibility").value = "super-flexible";
				}
			}
		</script>
	</head>

	<body>
		<?php include_once('modules/nav.php'); ?>
		
		<main>
			<h1>Contact</h1>
			<p>Want Josh to perform at your event? Need a hilarious MC for a light-hearted presentation? Just need a few laughs at your next 21st? You've come to the right place!</p>
			<br/>
			<p>Please enter the details of your desired booking into the following form:</p>
			<br/>
			<br/>
			
			<div class="contact">
				<form action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php" method="post" onsubmit="getFlexibility()">
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
					<label for="date">Event Date:</label>
					<input type="date" name="date" id="date" required>
					<br/>
					<br/>
					<label for="time">Event Time:</label>
					<input type="time" name="time" id="time" required>
					<br/>
					<br/>
					<label for="range">Date/Time Flexibility:</label>
					<input type="range" id="range" min="0" max="2" required>
					<input type="hidden" id="flexibility" name="flexibility" value="rangeValue">
					<br/>
					<br/>
					<label for="location">Event Location:</label>
					<textarea name="location" id="location" rows="2" cols="20" pattern="^([A-Za-z]+|\d+)((\s)?((\'|\-|\.)?([A-Za-z])+|\d+))*$" placeholder="e.g 15 Flemington Road, Melbourne" required></textarea>
					<br/>
					<br/>
					<br/>
					<label for="description">Event Description:</label>
					<textarea name="description" id="description" rows="2" cols="20" pattern="^([A-Za-z]+|\d+)((\s)?((\'|\-|\.)?([A-Za-z])+|\d+))*$" placeholder="e.g Birthday Party" required></textarea>
					<br/>
					<br/>
					<br/>
					<label for="performance">Performance Required:</label>
					<select name="performance" id="performance" required>
						<option value="none">- None -</option>
						<option value="MC">MC</option>
						<option value="comedySpot">Comedy Spot</option>
						<option value="fullShow">Full Show</option>
						<option value="other">Other</option>
					</select>
					<br/>
					<br/>
					<input type="reset" name ="reset" id="reset" value="Reset">
					<input type="submit" id="submit" value="Submit">
				</form>
			</div>
		</main>
		<?php include_once('modules/footer.php'); ?><?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Josh Thomas - Contact</title>
		<link rel='stylesheet' href='a2style.css' type='text/css'/>
		
		<script>
			function getFlexibility()
			{
				var rangeValue = document.getElementById("range").value;
				
				if (rangeValue == 0)
				{
					document.getElementById("flexibility").value = "inflexible";
				}
				else if (rangeValue == 1)
				{
					document.getElementById("flexibility").value = "flexible";
				}
				else if (rangeValue == 2)
				{
					document.getElementById("flexibility").value = "super-flexible";
				}
			}
		</script>
	</head>

	<body>
		<?php include_once('modules/nav.php'); ?>
		
		<main>
			<h1>Contact</h1>
			<p>Want Josh to perform at your event? Need a hilarious MC for a light-hearted presentation? Just need a few laughs at your next 21st? You've come to the right place!</p>
			<br/>
			<p>Please enter the details of your desired booking into the following form:</p>
			<br/>
			<br/>
			
			<div class="contact">
				<form action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php" method="post" onsubmit="getFlexibility()">
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
					<label for="date">Event Date:</label>
					<input type="date" name="date" id="date" required>
					<br/>
					<br/>
					<label for="time">Event Time:</label>
					<input type="time" name="time" id="time" required>
					<br/>
					<br/>
					<label for="range">Date/Time Flexibility:</label>
					<input type="range" id="range" min="0" max="2" required>
					<input type="hidden" id="flexibility" name="flexibility" value="rangeValue">
					<br/>
					<br/>
					<label for="location">Event Location:</label>
					<textarea name="location" id="location" rows="2" cols="20" pattern="^([A-Za-z]+|\d+)((\s)?((\'|\-|\.)?([A-Za-z])+|\d+))*$" placeholder="e.g 15 Flemington Road, Melbourne" required></textarea>
					<br/>
					<br/>
					<br/>
					<label for="description">Event Description:</label>
					<textarea name="description" id="description" rows="2" cols="20" pattern="^([A-Za-z]+|\d+)((\s)?((\'|\-|\.)?([A-Za-z])+|\d+))*$" placeholder="e.g Birthday Party" required></textarea>
					<br/>
					<br/>
					<br/>
					<label for="performance">Performance Required:</label>
					<select name="performance" id="performance" required>
						<option value="none">- None -</option>
						<option value="MC">MC</option>
						<option value="comedySpot">Comedy Spot</option>
						<option value="fullShow">Full Show</option>
						<option value="other">Other</option>
					</select>
					<br/>
					<br/>
					<input type="reset" name ="reset" id="reset" value="Reset">
					<input type="submit" id="submit" value="Submit">
				</form>
			</div>
		</main>
		<?php include_once('modules/footer.php'); ?>