<?php

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$email = $_POST["email"];
$contact = $_POST["contact"];
$msg = $_POST["msg"];

$host = "localhost";
$username = "root";
$dbname = "barangay";
$port = 3307;
$password = "Darrenkaido143.";

$conn = mysqli_connect($host, $username, $password, $dbname, $port);

if (mysqli_connect_errno()){
    die("connection error: " . mysqli_connect_error());
}

$sql = "INSERT INTO inquiries (fname, lname, email, contactno, message)
        VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_stmt_init($conn);

if (! mysqli_stmt_prepare($stmt, $sql)){
    die(mysqli_error($conn));
}

mysqli_stmt_bind_param($stmt, "sssss", 
                       $fname, 
                       $lname, 
                       $email, 
                       $contact, 
                       $msg);

mysqli_stmt_execute($stmt);

echo '<script> 
         window.location.href="contactus.html";
         alert("Success!");
         </script>';

?>