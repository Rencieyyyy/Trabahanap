<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "trabahanap";

    // Create a connection
    $conn = new mysqli($server, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
