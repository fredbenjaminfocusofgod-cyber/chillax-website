<?php
header('Content-Type: application/json');
include '../includes/db.php';

$response = ['success' => false, 'testimonials' => []];

$sql = "SELECT * FROM testimonials WHERE status = 'approved' ORDER BY created_at DESC LIMIT 6";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $response['testimonials'][] = $row;
    }
    $response['success'] = true;
}

echo json_encode($response);
?>
