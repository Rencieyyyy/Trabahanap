<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login for Jobseeker</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #8CB9BD;
            font-family: Arial, sans-serif;
            padding: 10px;
            position: relative;
        }

        .center-container, .container {
            text-align: center;
            max-width: 90%;
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

        .welcome-text, .login-title {
            font-size: 1.5rem;
            color: #333;
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }

        .input-field, input[type="email"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .button-container, .button, .login-button, button {
            width: 100%;
            padding: 10px;
            font-size: 1rem;
            color: #fff;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover, .login-button:hover, button:hover {
            background-color: #0056b3;
        }

        .forgot-password {
            display: block;
            margin-top: 15px;
            font-size: 0.9rem;
            color: #007bff;
            text-decoration: none;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .sign-up {
            margin-top: 15px;
            font-size: 1rem;
        }

        .sign-up a {
            color: #007bff;
            text-decoration: none;
        }

        .sign-up a:hover {
            text-decoration: underline;
        }

        /* Back Button Positioning */
        .back-button {
            font-size: 1rem;
            color: #007bff;
            text-decoration: none;
            position: absolute;
            top: 20px;
            left: 20px;
            display: inline-block;
        }

        .back-button:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .center-container, .container, .login-container {
                padding: 15px;
                max-width: 100%;
            }

            .welcome-text, .login-title {
                font-size: 1.2rem;
            }

            .button-container {
                flex-direction: column;
                gap: 10px;
            }

            .button, .login-button, button {
                padding: 8px 10px;
                font-size: 0.9rem;
            }

            .input-field, input[type="email"] {
                padding: 8px;
                font-size: 0.9rem;
            }
        }
    </style>
</head>
<body>
    <!-- Back Button -->
    <a href="frontend.php" class="back-button">← Back</a>

    <div class="center-container">
        <img src="imgs/Screenshot 2024-11-17 171708.png" alt="Logo" class="logo">
        <h1 class="welcome-text">Welcome</h1>
        <div class="center-container">
            <!-- Login Form -->
            <form action="login_backend.php" method="POST">
                <div class="login-container">
                    <h2 class="login-title">LOG IN</h2>
                    <input type="email" id="login-email" name="email" placeholder="Email" class="input-field" required>
                    <input type="password" id="login-password" name="password" placeholder="Password" class="input-field" required>
                    <button type="submit" class="login-button">Log In</button>
                    <a href="forgotpassword.php" class="forgot-password">Forgot Password?</a>
                    <p class="sign-up">Don't have an account? <a href="register.php">Register</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
