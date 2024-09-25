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

    // Check if the Registration form is submitted via POST
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = $_POST["name"];
        $email = $_POST["e_mail"];
        $shoe_name = $_POST["shoe_name"];

        // Prepare the SQL query with placeholders
        $query = $conn->prepare("INSERT INTO Registration (name, e_mail, shoe_name) VALUES (:name, :e_mail, :shoe_name)");

        // Bind the parameters to the placeholders
        $query->bindParam(':name', $name);
        $query->bindParam(':e_mail', $email);
        $query->bindParam(':shoe_name', $shoe_name);

        // Execute the SQL query to store the data in the database
        if ($query->execute()) {
            echo "Bedankt! Je gegevens zijn succesvol verzonden.";
        } else {
            echo "Er is een fout opgetreden bij het verzenden van je gegevens.";
        }
	}
	
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
    

	

	<section class= "Registration">
	    <h2>Registratieformulier</h2>
    <form id="collection-form" action="#" method="POST">
        <label for="name">Name:</label>
        <input type="text" name="name" required>
		
		<label for="shoe_name">Shoe Name:</label>
		<input type="text" name="shoe_name" required>

        <label for="e_mail">E-mail:</label>
        <input type="email" name="e_mail" required>

        <button type="submit">Register</button>
    </form>
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