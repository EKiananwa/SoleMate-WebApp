<?php
// Database configuration
$servername = "localhost";
$username = "Exauce1905";
$password = "Blex1905!";
$dbname = "Verzamelaars_DB";

$gegevens = array();

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Check if a form to add shoes is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $sql = "INSERT INTO Shoes (name, image, retail_price, colorway, placed_by, shoe_size, type_shoe, shoe_brand, shoe_rating) 
                VALUES (:name, :image, :retail_price, :colorway, :placed_by, :shoe_size, :type_shoe, :shoe_brand, :shoe_rating)";
        $stmt = $conn->prepare($sql);

        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':image', $_POST['image']);
        $stmt->bindParam(':retail_price', $_POST['retail_price']);
        $stmt->bindParam(':colorway', $_POST['colorway']);
        $stmt->bindParam(':placed_by', $_POST['placed_by']);
        $stmt->bindParam(':shoe_size', $_POST['shoe_size']);
        $stmt->bindParam(':type_shoe', $_POST['type_shoe']);
        $stmt->bindParam(':shoe_brand', $_POST['shoe_brand']);
        $stmt->bindParam(':shoe_rating', $_POST['shoe_rating']);



        $stmt->execute();

        header('Location: collection.php'); // Redirect back to the shoe collection page
    }

    // Fetch data from the database (replace with your query)
    $query = $conn->query("SELECT * FROM Shoes");
    $gegevens = $query->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Verbinding met de database is mislukt: " . $e->getMessage();
}

// Close the database connection
$conn = null;
?>





<!DOCTYPE html>
<html>
	<style>
	/* Registration section styles */
.Registration {
    padding: 50px;
    background-color: #eaeaea;
    margin-left: 100px;
	margin-right: 100px;
	margin-top: 30px;
	margin-bottom: 30px;
}

.Registration h2 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 30px;
    color: #393939c9;
}

.Registration form {
    text-align: center;
}

.Registration form label {
    display: block;
    margin-bottom: 10px;
    color: #393939c9;
    font-size: 20px;
}

.Registration form input[type="text"],
.Registration form textarea {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.Registration form textarea {
    height: 120px;
}

.Registration form input[type="email"] {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

form input[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #393939c9;
    color: rgb(235, 235, 235);
    border: none;
    cursor: pointer;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}


	</style>
<head>
	<title>SoleMate</title>

    <link rel="stylesheet" type="text/css" href="../CSS/collection.css">
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
				<li><a href="../PHP/"><strong>Add shoe</strong></a></li>
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
        <p>Where Your Feet Find Their SoleMate</p>
    </section>
    

	<!-- Featured Villas section -->
	<section class="featured-villas">
		
    <h2>SoleMate's Shoe Collection</h2>
        <?php foreach ($gegevens as $schoen): ?>
            <div class="villa-card">
                <img src="<?php echo $schoen['image']; ?>" alt="<?php echo $schoen['name']; ?>">
                <h3><?php echo $schoen['name']; ?></h3>
                <p>Retail Price: <strong>$<?php echo $schoen['retail_price']; ?></strong></p>
                <p>Colorway: <strong><?php echo $schoen['colorway']; ?></strong></p>
                <p>Placed By: <strong><?php echo $schoen['placed_by']; ?></strong></p>
                <p>Shoe Size: <strong><?php echo $schoen['shoe_size']; ?></strong></p>
                <p>Type Shoe: <strong><?php echo $schoen['type_shoe']; ?></strong></p>
                <p>Shoe Brand: <strong><?php echo $schoen['shoe_brand']; ?></strong></p>
                <p>Shoe Rating: <strong><?php echo $schoen['shoe_rating']; ?></strong></p>
                <!-- Voeg hier meer details toe op basis van je databasekolommen -->
                <a href="#">Register</a>
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