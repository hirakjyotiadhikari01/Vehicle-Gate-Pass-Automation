<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "employment";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dept = $_POST['dept'];
    $empId = $_POST['empId'];
    $phone = $_POST['Phone'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO employees (name, department, employee_id, phone, email, password)
            VALUES ('$name', '$dept', '$empId', '$phone', '$email', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Invalid request method.";
}

$conn->close();
?>
