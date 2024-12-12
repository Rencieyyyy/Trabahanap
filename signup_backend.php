<?php
    include 'Connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    if(isset($_POST['email']) == true){
        $signupQuery = $conn->prepare("INSERT INTO users (email, password, contactNumber, gender, address) 
        VALUES (?,?,?,?,?)");
        $signupQuery->bind_param("ssiss", $email, $password, $contact, $gender, $address);
        if($signupQuery->execute()){
            echo "<script> alert('Sign up succcessfully');</script>";
            header("Location: login.php");
        } else {
            echo 'di nag insert';
        }
    } else {
        echo 'false';
    }
?>