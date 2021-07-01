<html>
<head>

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</head>
<body>
<?php
    try {
	$username = 'student';
	$password = 'asdf1234.';
	$dbName = 'direktprodukte';
	$dbHost = "34.89.182.101:3306";

	$dsn = sprintf('mysql:dbname=%s;host=%s', $dbName, $dbHost);

	$conn = new PDO($dsn, $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conn->prepare("SELECT id, bezeichnung, thumbnail, langbeschreibung FROM Products");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    }
    catch (PDOException $e) {
        print("Error connecting to SQL Server.");
        die(print_r($e));
}
try {
  		echo  "<div class='container'>".
		      "<h1 class='my-4'>".
		      "</h1>".

		      "<div class='row'>";
		while($row = $stmt->fetch()) {
		echo "<div class='col-lg-6 mb-4'>".
		     "<div class='card h-100'>".

		     "<a href='#'><img class='card-img-top' src='" . $row['thumbnail'] . "' width=700 height=400 alt=''></a>".
		     "<div class='card-body'>".
		     "<h4 class='card-title'>".
		     "<p>" . htmlspecialchars($row['bezeichnung'], ENT_QUOTES, 'UTF-8') . "</p>".
		     "</h4>".
         "<p class='card-text'>".
         "<p>" . htmlspecialchars($row['langbeschreibung'], ENT_QUOTES, 'UTF-8') . "</p> ".
         "<form action='buy.php' method='post'>".
		     "<input type='hidden' name='artnr' value=" . $row['id'] . ">".
         "<div class='form-group'>".
         "<label for='menge'>Menge</label>".
         "<input type='number' name='menge' class='form-control' id='menge' placeholder='Menge eingeben'>".
         "</div>".
         "<div class='form-group'>".
         "<label for='comment'>Kommentar</label>".
         "<input type='text' name='comment' class='form-control' id='comment' placeholder='Kommentar eingeben'>".
         "</div>".
         "<button type='submit' class='btn btn-primary'>Buy</button>".
         "</form>".
         "</p>".
		     "</div>".
		     "</div>".
		     "</div>";
		}
echo "</div>";

}

catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
echo "</table>";
$conn = null;
?>
</body>
</html>
