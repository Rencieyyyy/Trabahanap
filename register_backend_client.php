<?php
    include 'Connection.php'; // Ensure that the database connection is correct

    // Fetch form data
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword']; // Get the confirm password
    $contactNumber = $_POST['contactNumber'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $category = $_POST['category']; // Category will be either 'Job Seeker' or 'Client'

    // Ensure all fields are filled
    if (!empty($email) && !empty($password) && !empty($category) && !empty($contactNumber) && !empty($gender) && !empty($address)) {
        // Validate if passwords match
        if ($password !== $confirmPassword) {
            echo "<script>alert('Passwords do not match.');</script>";
            exit; // Stop the execution if passwords do not match
        }

        // Prepare an INSERT query
        $insertQuery = "INSERT INTO users (email, password, contactNumber, gender, address, category) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insertQuery);

        if ($stmt) {
            // Corrected bind_param to use the proper hashed password variable ($Password)
            $stmt->bind_param("ssssss", $email, $password, $contactNumber, $gender, $address, $category);

            // Execute the query
            if ($stmt->execute()) {
                // Fetch the last inserted user ID
                $userID = $stmt->insert_id;
                // Set the session variable for the user ID
                session_start();
                $_SESSION['userID'] = $userID;

                echo "<script>alert('User registered successfully as $category');</script>";
                header("Location: login.php"); // Redirect to profile page after registration
                exit; // Prevent further execution after redirection
            } else {
                echo "<script>alert('Error: Could not register user.');</script>";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "<script>alert('Error preparing statement.');</script>";
        }
    } else {
        echo "<script>alert('Please fill in all required fields.');</script>";
    }

    // Close the database connection
    $conn->close();
?>
