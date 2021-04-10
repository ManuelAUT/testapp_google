<?php

try {
	$username = 'student';
	$password = 'asdf1234.';
	$dbName = 'direktprodukte';
	$dbHost = "10.85.176.3:3306";

	$dsn = sprintf('mysql:dbname=%s;host=%s', $dbName, $dbHost);

	$conn = new PDO($dsn, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("DROP TABLE Products");
    $stmt->execute();

}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
echo "</table>";
$conn = null;
?>
