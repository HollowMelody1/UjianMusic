<?php
include '../db.php';

$data = json_decode(file_get_contents("php://input"));

if (!empty($data->id)) {
    $sql = "DELETE FROM songs WHERE id = :id";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':id', $data->id);
    if ($stmt->execute()) {
        echo json_encode(["message" => "Song deleted successfully"]);
    } else {
        echo json_encode(["message" => "Failed to delete song"]);
    }
} else {
    echo json_encode(["message" => "Invalid ID"]);
}
?>