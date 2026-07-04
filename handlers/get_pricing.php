<?php
header('Content-Type: application/json');
include '../includes/db.php';

$response = ['success' => false, 'pricing' => []];

$sql = "SELECT * FROM pricing ORDER BY display_order ASC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response['pricing'][] = $row;
    }
    $response['success'] = true;
}

echo json_encode($response);
?>
