<?php
$Fname = filter_input(INPUT_POST, 'Fname');
$email = filter_input(INPUT_POST, 'email');
$message = filter_input(INPUT_POST, 'message');

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "web";
// Create connection
$conn = mysqli_connect($host, $dbusername, $dbpassword);
mysqli_select_db($conn, $dbname);


if (mysqli_connect_error()){
    die('Connect Error ('. mysqli_connect_errno() .') '. mysqli_connect_error());
}else{
    $sql = "INSERT INTO connect (Fname, email, message)
    values ('$Fname','$email', '$message')";
        if ($conn->query($sql)){
            echo "<script>alert('Successfully submitted'); window.location = './../index.html';</script>";
        }else{
           echo "Error: ". $sql ."". $conn->error;
        }
    $conn->close();
}


?>