<?php session_start();
error_reporting(0); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>Josh Thomas - Shop</title>
		<link rel='stylesheet' href='a2style.css' type='text/css'/>
		<script>
			function calcS1Price()
			{
				return 17.00 * document.getElementById("S1").value;
			}
			function calcS2Price()
			{
				return 22.50 * document.getElementById("S2").value;
			}
			function calcS3Price()
			{
				return 26.75 * document.getElementById("S3").value;
			}
		</script>
	</head>

	<body>
	<?php include_once('modules/nav.php'); ?>
		
		<main>
			<h1>Shop</h1>
			<div>
				<input type="checkbox" class="read-more-state" id="post-1" />
				<p class="read-more-wrap">A coming of age comedy/drama, a hilarious set of zany scrapes and side-splitting moments, a non-stop thrill ride featuring some of the most insightful and explorative comedy ever 
				seen on screen. These are all things which could describe <i>Please Like Me</i>, an original series written and starred in by the star of young Australian comedy, Josh Thomas himself.
					<span class="read-more-target">Largely inspired by Josh's award-winning standup comedy performances, <i>Please Like Me</i> is a charming, bittersweet comedy/drama featuring cavoodles, custard tarts, boyfriends, girlfriends, 
					and much, much more. Primarily however, it's about growing up fast and realising that your parents might not be the all-knowing heroes you grew up believing them to be, but are in fact big dumb 
					oafs with no idea what's going on - just like you.</span></p>
					<label for="post-1" class="read-more-trigger"></label>
			</div>
			<form action="cart.php" method="post">
				<div>
				<h3>Season 1</h3>
				<div class="shopSeason">
					<img class="season_pic" src="images/season_one.jpg" height = 300 width = 300 alt="Season 1 DVD cover">
					<div class="description">
						<input type="checkbox" class="read-more-state" id="post-2" />
						<p class="read-more-wrap seasontext"><i>Please Like Me</i> is the story of Josh Thomas and his journey of self-discovery following the break-up between himself and his then-girlfriend 
						Claire. Josh realises after separating from his former partner that he is in fact gay, and with the support of his ex-girlfriend Claire, and his house mate 
						and best friend Tom, Josh sets out into a new world of his own making, full of excitement, laughter and exploration of his new orientation.
						<span class="read-more-target">	In addition, Josh must help his mother with her battle with depression as well as persuading the rest of his family to embrace his 
								new found orientation. All of this becomes a little more complicated when he explores his sexuality with a young and handsome man named Geoffrey.</span></p>
						<label for="post-2" class="read-more-trigger"></label>
					</div>
					<div class="onlineshops">
						<a href="https://itunes.apple.com/us/tv-season/please-like-me-season-1/id671267950"><img src="images/itunes_store_logo.png" height="50px" width="100px" alt="iTunes Store Logo"></a>
						<a href="https://play.google.com/store/tv/show/Please_Like_Me?id=RtnabrwLBEs&cdid=tvseason-BJko0zBBVQxuX_8ClWkkUQ"><img src="images/google_play_logo.png" height="55px" width="100px" alt="Google Play Logo"></a>
					</div>
					<div class="shopQuantity">
						<span id="s1Total">Price: $17.00 each </span> Quantity:
						<select name="plm[S1]" id="S1" class="season" onchange="calcS1Price(); calcTotal();">
		  					<option value="0">0</option>
		  					<option value="1">1</option>
		  					<option value="2">2</option>
		  					<option value="3">3</option>
		  					<option value="4">4</option>
		  					<option value="5">5</option>
		  				</select>
		  				<script>function calcS1Price()
								{	
									var price = 17.00;
									var amount = document.getElementById("S1").value;
									var total = price * amount;
		  						document.getElementById("s1Total").innerHTML = "Price: $" + total.toFixed(2);
		  						return total;
		  						}
		  						</script>
	  				</div>
				</div>
				
				<br/>
				<h3>Season 2</h3>
				<div class="shopSeason">
					<img class="season_pic" src="images/season_two.jpg" height = 300 width = 300 alt="Season 2 DVD cover">
					<div class="description">
						<input type="checkbox" class="read-more-state" id="post-3" />
						<p class="read-more-wrap seasontext"> After receiving rave reviews and critical acclaim in both Australia and the US, the award-winning, voted in "best new comedy" 
						<i>Please Like Me</i> is back for another season, written by Josh Thomas and starring your favourite returning characters, including the man himself.
						<span class="read-more-target">Growing up and evolving from Season 1, comedian and writer Josh Thomas explores the more complicated sides of relationships, 
								moving beyond the simplistic and into murky waters with the new additions of Patrick, Arnold and the return of Geoffrey.</p>
						<label for="post-3" class="read-more-trigger"></label>
					</div>
					<div class="onlineshops">
						<a href="https://itunes.apple.com/us/tv-season/please-like-me-season-2/id891079725"><img src="images/itunes_store_logo.png" height="50px" width="100px" alt="iTunes Store Logo"></a>
						<a href="https://play.google.com/store/tv/show/Please_Like_Me?id=RtnabrwLBEs&cdid=tvseason-9aM7tHsSt5EjPpLQ3AMKhw"><img src="images/google_play_logo.png" height="55px" width="100px" alt="Google Play Logo"></a>
					</div>
					<div class="shopQuantity">
						<span id="s2Total">Price: $22.50 each </span> Quantity:
						<select name="plm[S2]" id="S2" class="season" onchange="calcS2Price(); calcTotal();">
		  					<option value="0">0</option>
		  					<option value="1">1</option>
		  					<option value="2">2</option>
		  					<option value="3">3</option>
		  					<option value="4">4</option>
		  					<option value="5">5</option>
		  				</select>
		  				<script>function calcS2Price()
								{	
									var price = 22.50;
									var amount = document.getElementById("S2").value;
									var total = price * amount;
		  						document.getElementById("s2Total").innerHTML = "Price: $" + total.toFixed(2);
		  						return total;
		  						}
		  						</script>
					</div>
				</div>
				
			<br/>
				<h3>Season 3</h3>
				<div class="shopSeason">
					<img class="season_pic" src="images/season_three.jpg" height = 300 width = 300 alt="Season 3 DVD cover">
					<div class="description">
						<input type="checkbox" class="read-more-state" id="post-4"/>
						<p class="read-more-wrap seasontext">"Hilariously awkward", "unlike anything else", "sweet, sharp, sad, funny and astute", and "ridiculously funny". Just some of the praise that has 
						been sent the way of comedian writer Josh Thomas in regards to his smash hit TV series <i>Please Like Me</i>, which returns for yet another crazy fun-filled season.
						<span class="read-more-target">A half-an-hour romantic comedy, an... "eventful" family Christmas lunch, and no small amount of sex, drugs, secrets, singing and food, 
								Season 3 undoubtedly goes off and finishes with a resounding bang. The latest chapter in the ongoing saga of hilarity that is the life and times of Josh Thomas 
								is without doubt the best to come yet. Oh, and did we mention there's a transgender chicken?</p>
						<label for="post-4" class="read-more-trigger"></label>
					</div>
					<div class="onlineshops">
						<a href="https://itunes.apple.com/us/tv-season/please-like-me-season-3/id1041583976"><img src="images/itunes_store_logo.png" height="50px" width="100px" alt="iTunes Store Logo"></a>
						<a href="https://play.google.com/store/tv/show/Please_Like_Me?id=RtnabrwLBEs&cdid=tvseason-cUcfPF0x2mR-B5A4TXy5Xw"><img src="images/google_play_logo.png" height="55px" width="100px" alt="Google Play Logo"></a>
					</div>
					<div class="shopQuantity">
						<span id="s3Total">Price: $26.75 each </span> Quantity:
							<select name="plm[S3]" id="S3" class="season" onchange="calcS3Price(); calcTotal();">
		  					<option value="0">0</option>
		  					<option value="1">1</option>
		  					<option value="2">2</option>
		  					<option value="3">3</option>
		  					<option value="4">4</option>
		  					<option value="5">5</option>
		  				</select>
		  				<script>function calcS3Price()
								{	
									var price = 26.75;
									var amount = document.getElementById("S3").value;
									var total = price * amount;
		  						document.getElementById("s3Total").innerHTML = "Price: $" + total.toFixed(2);
		  						return total;
		  						}
		  						</script>
					</div>
				</div>
				
			<br>
			<br>
			<div class="media">
				Media Type:</br>
				  <input type="radio" name="media" value="DVD" checked> DVD</br>
				  <input type="radio" name="media" value="BluRay"> BluRay</br></br>
			</div>
				<span id="Total">Total Price: $0.00</span>
  				<script>function calcTotal()
  						{
  							var Total = calcS1Price() + calcS2Price() + calcS3Price();
  						document.getElementById("Total").innerHTML = "Total Price: $" + Total.toFixed(2);
  						}
  							</script>
  				</div>
  				<input type="submit" value="Add To Cart" id="AddtoCart"></br>
  			</form>
		</main>
	<?php include_once('modules/footer.php'); ?>
