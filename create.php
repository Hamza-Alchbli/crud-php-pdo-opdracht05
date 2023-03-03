<?php

require_once 'connect.php';
// Get the form data
$homeclub_id = $_POST["homeclub"];
$membership_type = $_POST["membership_type"];
$duration = $_POST["duration"];
$extras = implode(",", $_POST["extras"]);
$email = $_POST["email"];

// Insert the form data into the database
$insert_query = "INSERT INTO form_data (homeclub_id, membership_type, duration, extras, email, submission_datetime) VALUES (?, ?, ?, ?, ?, NOW())";
$stmt = $pdo->prepare($insert_query);
$result = $stmt->execute([$homeclub_id, $membership_type, $duration, $extras, $email]);

// Display a success message
if ($result) {
    echo "Het record is gemaakt";
    header('Refresh:3; url=read.php');
} else {
    echo "Het record is niet gemaakt";
    header('Refresh:3; url=read.php');
}
