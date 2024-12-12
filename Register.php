<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #8CB9BD;
            font-family: Arial, sans-serif;
            padding: 10px;
        }

        .center-container {
            text-align: center;
            width: 100%;
            max-width: 500px;
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo {
            width: 80px;
            height: auto;
            margin-bottom: 15px;
        }

        h1 {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        .input-field {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        button, select, textarea {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
            cursor: pointer;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
        }

        .password-container {
            position: relative;
        }

        .password-toggle {
                        position: absolute;
                        right: 10px;
                        top: 50%;
                    transform: translateY(-50%);
                        padding: 3px;
                background-color: white;
                color: #fff;
                border: none;
                border-radius: 3px;
                cursor: pointer;
                font-size: 12px;
                width: 25px;
                height: 25px;
                display: flex;
                align-items: center;
                justify-content: center;
    
        }

        .password-toggle:hover {
            color: #0056b3;
        }

        .back-button {
            font-size: 1rem;
            color: #007bff;
            text-decoration: none;
            position: absolute;
            top: 20px;
            left: 20px;
        }

        .back-button:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <a href="frontend.php" class="back-button">← Back</a>

    <div class="center-container">
        <img src="imgs/Screenshot 2024-11-17 171708.png" alt="Logo" class="logo">
        <h1>Register</h1>
        <form action="register_backend_client.php" method="POST">
            <!-- Email -->
            <input type="email" id="email" name="email" placeholder="Email" class="input-field" required>

            <!-- Password -->
            <div class="password-container">
                <input type="password" id="password" name="password" placeholder="Password" class="input-field" required>
                <button type="button" class="password-toggle" onclick="togglePasswordVisibility('password')">👁️</button>
            </div>

            <!-- Confirm Password -->
            <div class="password-container">
                <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" class="input-field" required>
                <button type="button" class="password-toggle" onclick="togglePasswordVisibility('confirmPassword')">👁️</button>
            </div>

            <!-- Contact Number -->
            <input type="text" id="contactNumber" name="contactNumber" placeholder="Contact Number" class="input-field" required>

            <!-- Gender -->
            <select id="signup-sex" name="gender" class="input-field" required>
                <option value="" disabled selected>Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
            </select>

            <!-- Address -->
            <textarea id="signup-address" name="address" placeholder="Address" class="input-field" required></textarea>

            <!-- Category -->
            <select id="category" name="category" class="input-field" required>
                <option value="" disabled selected>Register as:</option>
                <option value="Job Seeker">Job Seeker</option>
                <option value="Client">Client</option>
            </select>

            <!-- Register Button -->
            <button type="submit">Register</button>
        </form>
    </div>

    <script>
        // Function to toggle password visibility
        function togglePasswordVisibility(id) {
            var passwordField = document.getElementById(id);
            passwordField.type = passwordField.type === "password" ? "text" : "password";
        }
    </script>
</body>
</html>
