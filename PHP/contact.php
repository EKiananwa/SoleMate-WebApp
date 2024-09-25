<?php
// Databaseconfiguratie
$servername = "localhost"; // Verander dit indien nodig
$username = "089797glr"; // Verander dit naar de databasegebruikersnaam
$password = "Blex1905!"; // Verander dit naar het databasewachtwoord
$dbname = "Verzamelaars_DB"; // Verander dit naar de database naam

try {
    // Maak een databaseverbinding
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Controleer of het formulier is ingediend via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Haal de gegevens op uit het formulier
        $name = $_POST["name"];
        $address = $_POST["address"];
        $number = $_POST["number"];
        $email = $_POST["email"];
        $question = $_POST["question"];

        // Bereid de SQL-query voor met placeholders
        $query = $conn->prepare("INSERT INTO Contact (name, address, number, email, question) VALUES (:name, :address, :number, :email, :question)");

        // Bind de parameters aan de placeholders
        $query->bindParam(':name', $name);
        $query->bindParam(':address', $address);
        $query->bindParam(':number', $number);
        $query->bindParam(':email', $email);
        $query->bindParam(':question', $question);

        // Voer de SQL-query uit om de gegevens in de database op te slaan
        if ($query->execute()) {
            echo "Bedankt! Je gegevens zijn succesvol verzonden.";
        } else {
            echo "Er is een fout opgetreden bij het verzenden van je gegevens.";
        }
    }
} catch (PDOException $e) {
    echo "Verbinding met de database is mislukt: " . $e->getMessage();
}

// Sluit de databaseverbinding
$conn = null;






$gegevens = array();

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Een eenvoudige query om gegevens op te halen (vervang dit door je eigen query)
    $query = $conn->query("SELECT * FROM Contact");

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
    <link rel="stylesheet" type="text/css" href="../CSS/contact.css">
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
    

	<section class="contact">
	    <h2>Contact</h2>
	    <form id="contact-form" action="#" method="POST">
	        <label for="name">Name:</label>
	        <input type="text" id="name" name="name" placeholder="Enter your FULL name" required>

	        <label for="address">Address:</label>
	        <input type="text" id="address" name="address" placeholder="Enter your FULL address" required>

	        <label for="number">Number:</label>
	        <input type="text" id="number" name="number" placeholder="Enter your phone number" required>

	        <label for="email">E-mail:</label>
	        <input type="email" id="email" name="email" placeholder="Enter your email address" required>

	        <label for="question">Question:</label>
	        <textarea id="question" name="question" placeholder="Ask your question or make a comment" required></textarea>

	        <input type="submit" value="Verzenden">
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
