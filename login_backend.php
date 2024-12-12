<?php
    session_start(); // Start the session to store session variables

    include 'Connection.php';

    $email = $_POST['email'];
    $password = $_POST['password'];

    if(isset($_POST['email']) == true){
        // Query to check if user exists with the provided email and password
        $loginQuery = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $loginresult = $conn->query($loginQuery);
        
        if ($loginresult->num_rows > 0) {
            // Fetch the user data and store the user ID in the session
            $user = $loginresult->fetch_assoc();
            $_SESSION['user_id'] = $user['userID']; // Assuming the column for user ID is named 'userID'
            echo "<script> alert('Log in successfully');</script>";
            header("Location: dashboard.php"); // Redirect to dashboard after successful login
            exit; // Prevent further execution after redirect
        } else {
            // If no matching record is found, show an alert and redirect to the login page
            echo "<script>
                    alert('You don\'t have an account. Please sign up first!');
                    window.location.href = 'login.php'; // Redirect to the correct page
                  </script>";
            exit; // Ensure no further processing after redirect
        }
        
    }
?>
 