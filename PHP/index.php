<?php
// Databaseconfiguratie en gegevens ophalen
$servername = "localhost";
$username = "Exauce1905";
$password = "Blex1905!";
$dbname = "Verzamelaars_DB";

$gegevens = array();

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Een eenvoudige query om gegevens op te halen (vervang dit door je eigen query)
    $query = $conn->query("SELECT * FROM Shoes");

    $gegevens = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Verbinding met de database is mislukt: " . $e->getMessage();
}

// Sluit de databaseverbinding
$conn = null;
?>




<!DOCTYPE html>
<html>
<head>
	<title>SoleMate</title>

    <link rel="stylesheet" type="text/css" href="../CSS/Index.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
	<!-- Header section -->
	<header>
		<nav>
			<ul>
				<li><a href="../PHP/index.php"><strong>Home</strong></a></li>
				<li><a href="../PHP/collection.php"><strong>Collection</strong></a></li>
				<li><a href="../PHP/contact.php"><strong>Contact</strong></a></li>
				<li><a href="../PHP/add-shoe.php"><strong>Add shoe</strong></a></li>
			</ul>
		</nav>
		<form action="#" method="GET">
			<input type="text" name="search" placeholder="Search for Shoes">
			<button type="submit">Search</button>
		</form>
	</header>



	<!-- Hero section -->
    <section class="hero">
        <img src="../IMAGES/adidas_originals_yeezy_700v3_kyanite_blog_3000x.gif" alt="GIF-afbeelding">
        <img src="../IMAGES/adidas_originals_yeezy_700v3_clay_brown_blog_3000x.gif" alt="GIF-afbeelding">
        <img src="../IMAGES/adidas_originals_yeezy_700_bright_blue_blog_3000x.gif" alt="GIF-afbeelding">
        <h1>Welcome to SoleMate</h1>
        <p>Where Your Feet Find Their Perfect Match</p>
    </section>
    

	<!-- Featured Villas section -->
	<section class="featured-villas">

    <h2>Featured Shoes</h2>
    <?php foreach ($gegevens as $schoen): ?>
        <div class="villa-card">
            <img src="<?php echo $schoen['image']; ?>" alt="<?php echo $schoen['name']; ?>">
            <h3><?php echo $schoen['name']; ?></h3>
            <p>Retail Price: <strong>$<?php echo $schoen['retail_price']; ?></strong></p>
            <p>Colorway: <strong><?php echo $schoen['colorway']; ?></strong></p>
            <a href="#">View Details</a>
        </div>
		
    <?php endforeach; ?>


		<!-- Add more villa cards as needed -->
	</section>


	<!-- Footer section -->
	<footer>
		<strong><p>&copy; 2023 Exauce Kiananwa. All rights reserved.</p></strong>
		<nav>
			<ul>
				<li><a href="#"><strong>Privacy Policy</strong></a></li>
				<li><a href="#"><strong>Terms of Service</strong></a></li>
				<li><a href="/Pagina's/ContactPagina/ContactPagina.html"><strong>Contact</strong></a></li>
			</ul>
		</nav>
	</footer>

	<!-- JavaScript code specific to Koop je Villa website -->
	<script>
		// Koop je Villa-specific JavaScript code
		// ...
	</script>



</body>
</html>

