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

    // Check if a form was submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Prepare an SQL statement to insert data into the "Shoes" table
        $sql = "INSERT INTO Shoes (name, image, retail_price, colorway, placed_by, shoe_size) 
                VALUES (:name, :image, :retail_price, :colorway, :placed_by, :shoe_size)";
        $stmt = $conn->prepare($sql);

        // Bind parameters from the form
        $stmt->bindParam(':name', $_POST['name']);
        $stmt->bindParam(':image', $_POST['image']);
        $stmt->bindParam(':retail_price', $_POST['retail_price']);
        $stmt->bindParam(':colorway', $_POST['colorway']);
        $stmt->bindParam(':placed_by', $_POST['placed_by']);
        $stmt->bindParam(':shoe_size', $_POST['shoe_size']);

        // Execute the SQL statement
        $stmt->execute();

        // Redirect back to the page with the shoe collection
        header('Location: collection.php');
    }

    // Fetch data from the database (replace with your query)
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

    <link rel="stylesheet" type="text/css" href="../CSS/collection.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</head>
	<style>
	.add-shoe {
    padding: 50px;
    background-color: #eaeaea;
	margin-top: 30px;
	margin-bottom: 30px;
}

.add-shoe h2 {
    text-align: center;
    font-size: 24px;
    margin-bottom: 30px;
    color: #393939c9;
}

.add-shoe form {
    text-align: center;
}

.add-shoe form label {
    display: block;
    margin-bottom: 10px;
    color: #393939c9;
    font-size: 20px;
}

.add-shoe form input[type="text"],
.add-shoe form textarea {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Toegevoegd box shadow */
}

.add-shoe form textarea {
    height: 120px;
}

.add-shoe form input[type="email"] {
    width: 100%;
    padding: 12px;
    font-size: 16px;
    margin-bottom: 20px;
    border-radius: 5px;
    border: 1px solid #ccc;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Toegevoegd box shadow */
}

.add-shoe form input[type="submit"] {
    padding: 10px 20px;
    font-size: 16px;
    background-color: #393939c9;
    color: rgb(235, 235, 235);
    border: none;
    cursor: pointer;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Toegevoegd box shadow */
}

	</style>
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
        <p>Where Your Feet Find Their SoleMate</p>
    </section>
    

	<!-- Featured Villas section -->
	<section class="featured-villas">

<section class="add-shoe">
    <h2>Add a New Shoe</h2>
    <form id= "collection-form"action="#" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" placeholder="Shoe NAME:" required>

        <label for="retail_price">Retail Price:</label>
        <input type="number" name="retail_price" step="0.1" placeholder="Retail price" required>

        <label for="colorway">Colorway:</label>
        <input type="text" name="colorway" placeholder=" Max. 3 " required>

        <label for="placed_by">Placed By:</label>
        <input type="text" name="placed_by" placeholder="User NAME" required>

        <label for="shoe_size">Shoe Size:</label>
        <input type="text" name="shoe_size" placeholder="Shoe SIZE:" required>

        <button type="submit">Add Shoe</button>
    </form>
</section>

		    <h2>Featured Shoes</h2>
<?php foreach ($gegevens as $schoen): ?>
    <div class="villa-card">
        <img src="<?php echo $schoen['image']; ?>" alt="<?php echo $schoen['name']; ?>">
        <h3><?php echo $schoen['name']; ?></h3>
        <p>Retail Price: <strong>$<?php echo $schoen['retail_price']; ?></strong></p>
        <p>Colorway: <strong><?php echo $schoen['colorway']; ?></strong></p>
        <!-- You can add more details here based on your schema -->
        <a href="../PHP/collection.php">View Details</a> 
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