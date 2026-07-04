<?php
header('Content-Type: application/json');
include '../includes/db.php';

$response = ['success' => false, 'images' => []];

$sql = "SELECT * FROM gallery ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response['images'][] = $row;
    }
    $response['success'] = true;
}

echo json_encode($response);
?>
