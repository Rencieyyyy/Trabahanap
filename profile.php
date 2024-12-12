<?php
session_start(); // Start the session to access session variables
include 'Connection.php';
// Check if the user is logged in by verifying if 'user_id' is set in the session
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to the login page
    header("Location: login.php");
    exit;
}

// Access the logged-in user's ID from the session
$user_id = $_SESSION['user_id'];
 // Ensure this matches the session variable from registration

// Fetch user information from the database
$selectQuery = "SELECT email, contactNumber, gender, address, category FROM users WHERE userID = ?";
$stmt = $conn->prepare($selectQuery);

if ($stmt) {
    $stmt->bind_param("i", $user_id); // Correct variable name here
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc(); // Fetch user data as an associative array
    } else {
        echo "<script>alert('User not found.');</script>";
        header("Location: login.php"); // Redirect to login if user does not exist
        exit();
    }

    $stmt->close();
} else {
    echo "<script>alert('Error fetching user data.');</script>";
    die("Prepare failed: " . $conn->error); // Debugging information
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
            background-color: #8CB9BD;
            position: relative; /* To position the back button fixed to top-left */
        }
        .profile-container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }
        .profile-container h1 {
            margin-top: 0;
            color: #333;
        }
        .profile-container p {
            margin: 10px 0;
            color: #555;
        }
        .profile-container a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
        }
        .profile-container a:hover {
            background-color: #0056b3;
        }
        /* Back button styles */
        .back-btn {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color:#6c757d;
            color: white;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
        .back-btn:hover {
            background-color: #45a049;
        }

        /* Rating System Styles */
        .rating {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .rating input {
            display: none;
        }
        .rating label {
            font-size: 30px;
            color: #ddd;
            cursor: pointer;
        }
        .rating input:checked ~ label {
            color: #f39c12;
        }
        .rating label:hover,
        .rating label:hover ~ label {
            color: #f39c12;
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <a href="dashboard.php" class="back-btn">Back</a>

    <!-- Profile Container -->
    <div class="profile-container">
        <h1>User Profile</h1>
        <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
        <p><strong>Contact Number:</strong> <?php echo htmlspecialchars($user['contactNumber']); ?></p>
        <p><strong>Gender:</strong> <?php echo htmlspecialchars($user['gender']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>
        <p><strong>Category:</strong> <?php echo htmlspecialchars($user['category']); ?></p>
        
        <!-- Rating Section -->
        <div class="rating">
            <input type="radio" id="star5" name="rating" value="5"><label for="star5">★</label>
            <input type="radio" id="star4" name="rating" value="4"><label for="star4">★</label>
            <input type="radio" id="star3" name="rating" value="3"><label for="star3">★</label>
            <input type="radio" id="star2" name="rating" value="2"><label for="star2">★</label>
            <input type="radio" id="star1" name="rating" value="1"><label for="star1">★</label>
        </div>
        
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
