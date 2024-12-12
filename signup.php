<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <style>
        .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }

        .back-button:hover {
            background-color: #45a049;
        }
        body {
            font-family: Arial, sans-serif;
            background-color: white;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #CD7F32;
        }

        h2 {
            text-align: center;
        }

        .input-field {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .password-container {
            position: relative;
            width: 100%;
        }

        .input-field {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
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
            background-color: #555;
        }
        .back-button {
    display: inline-block;
    padding: 10px;
    margin-bottom: 20px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
    cursor: pointer;
}

.back-button:hover {
    background-color: #45a049;
}
    </style>
</head>
<body>
<a href="login.php" class="back-button">← Back</a>

    <form action="signup_backend.php" method="POST">
        <h2 class="signup-title">Sign Up</h2>

        <input type="email" name="email" id="signup-email" placeholder="Email" class="input-field" required>

        <div class="password-container">
            <input type="password"  name="password" id="signup-password" placeholder="Password" class="input-field" required>
            <button type="button" class="password-toggle" onclick="togglePasswordVisibility('signup-password')">👁️</button>
        </div>

        <div class="password-container">
            <input type="password" id="confirmPassword" placeholder="Confirm Password" class="input-field" required>
            <button type="button" class="password-toggle" onclick="togglePasswordVisibility('confirmPassword')">👁️</button>
        </div>

        <input type="text" id="signup-contact" name="contact" placeholder="Contact Number" class="input-field" required>

        <select id="signup-sex" class="input-field" name="gender" required>
            <option value="" disabled selected>Select Sex</option>
            <option value="Male">Male</option>
            <option value="Female" >Female</option>
            <option value="Other">Other</option>
        </select>

        <textarea id="signup-address" name="address" placeholder="Address" class="input-field" required></textarea>

        <button class="signup-button" type="submit">Sign Up</button>
    </form>

    <!-- <script>
        function signUp() {
            const email = document.getElementById('signup-email').value.trim();
            const password = document.getElementById('signup-password').value.trim();
            const confirmPassword = document.getElementById('confirmPassword').value.trim();
            const contact = document.getElementById('signup-contact').value.trim();
            const sex = document.getElementById('signup-sex').value;
            const address = document.getElementById('signup-address').value.trim();

            if (!email || !password || !confirmPassword || !contact || !sex || !address) {
                alert("All fields must be filled in. Please try again.");
                return;
            }

            if (password !== confirmPassword) {
                alert("Passwords do not match. Please try again.");
                return;
            }

            if (!/\d/.test(password)) {
                alert("Password must contain at least one number.");
                return;
            }

            if (!/^\d+$/.test(contact)) {
                alert("Contact number must contain only digits.");
                return;
            }

            const userDetails = {
                email: email,
                password: password,
                contact: contact,
                sex: sex,
                address: address
            };

            localStorage.setItem('userDetails', JSON.stringify(userDetails));

            alert('Sign-up successful! You can now log in.');
            window.location.href = 'Trabahanap.html'; // Redirect to the login page
        }

        function togglePasswordVisibility(id) {
            const passwordField = document.getElementById(id);
            const currentType = passwordField.type;
            passwordField.type = currentType === 'password' ? 'text' : 'password';
        }
    </script> -->
</body>
</html>