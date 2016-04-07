<!DOCTYPE html>
<html>
<head>
<title> TwitSnip </title>
<link rel="stylesheet" href="css/styles.css" type="text/css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDvC1nYaqwjtagAAZbJMy7O03sesw1gdGs"></script>
</head>

<body>

<header><h1>Twit<span>Snip</span></h1></header>

<section id="searchForm">
    <form action="Twitsnipresults.php" method="POST" class="form-wrapper cf">
        <input type="text" name="usersearch" placeholder="Search here...">
    		<input class="button" type="submit" value="Search">
    </form>
 </section>
<section id="instruction">
	<p>Insert any hashtag and hit search!</p>
</section>
<section id="map-canvas"></section>
<script src="js/script.js"></script>
</body>
</html>