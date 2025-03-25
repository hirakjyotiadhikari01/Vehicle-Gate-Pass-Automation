<?php
// handle_action.php
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

$employee_id = $input['employee_id'];
$action = $input['action'];

// Database connection
$conn = new mysqli('localhost', 'username', 'password', 'database');

if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Connection failed: ' . $conn->connect_error]));
}

if ($action === 'approve') {
    $sql = "UPDATE employees SET status='approved' WHERE employee_id=?";
} else if ($action === 'reject') {
    $sql = "UPDATE employees SET status='rejected' WHERE employee_id=?";
}

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $employee_id);

if ($stmt->execute()) {
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error updating record: ' . $conn->error]);
}

$stmt->close();
$conn->close();
?>
