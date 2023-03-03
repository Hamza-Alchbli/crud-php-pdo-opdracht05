<?php
// Retrieve the ID of the record to be deleted from the URL query string
$id = $_GET['id'];

require_once "connect.php";

// Prepare the SQL statement
$stmt = $pdo->prepare('DELETE FROM form_data WHERE id = :id');

// Bind the ID parameter to the prepared statement
$stmt->bindParam(':id', $id);

// Execute the prepared statement
$result = $stmt->execute();
if ($result) {
    echo "Het record is verwijderd";
    header('Refresh:3; url=read.php');
} else {
    echo "Het record is niet verwijderd";
    header('Refresh:3; url=read.php');
}
