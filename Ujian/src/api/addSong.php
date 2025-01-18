<?php
include '../db.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->title) && !empty($data->artist)) {
    $sql = "INSERT INTO songs (title, artist) VALUES (:title, :artist)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':title', $data->title);
    $stmt->bindParam(':artist', $data->artist);
    if ($stmt->execute()) {
        echo json_encode(["message" => "Song added successfully"]);
    } else {
        echo json_encode(["message" => "Failed to add song"]);
    }
} else {
    echo json_encode(["message" => "Invalid input"]);
}
?>