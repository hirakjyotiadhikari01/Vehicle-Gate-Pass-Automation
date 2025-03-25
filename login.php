<?php
// Database Connection
$server_name="localhost";
$username="root";
$password="root";
$db_name="iocl";

$conn=mysqli_connect($server_name,$username,$password,$db_name);

//now check the connection
if(!$conn)
{
	die("Connection Failed:" . mysqli_connect_error());

}
else{
	echo "Connection was successful";
}

//Retrieve Form Data
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $empId = $_POST["empId"];
    $pass = $_POST["pass"];
}

//validate user authentication
$query = "SELECT * FROM `employees` WHERE EmpId='$empId' AND Pass='$pass'";

$result = $conn->query($query);

if($result->num_rows == 1){
    //Login Successful
    header("Location: success.html");
    exit();
}
else{
    //Login Failed
    header("Location: error.html");
    exiit();
}

    $conn->closed();
?>
