<?php
include '../db.php';

$sql = "SELECT * FROM songs";
$stmt = $conn->prepare($sql);
$stmt->execute();

$songs = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($songs);
?>