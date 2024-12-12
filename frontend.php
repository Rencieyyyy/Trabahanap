<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>
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
      position: relative;
      overflow: hidden;
    }

    /* Sliding color effect */
    .color-slide {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: #F0F0F0;
      z-index: -1;
      animation: slideEffect 3s ease-in-out infinite;
    }

    @keyframes slideEffect {
      0% {
        left: -100%;
      }
      50% {
        left: 0;
      }
      100% {
        left: 100%;
      }
    }

    .container {
      text-align: center;
      z-index: 1;
    }

    .logo-image {
      max-width: 200px;
      margin-bottom: 20px;
    }

    .button-container {
      display: flex;
      justify-content: center;
      gap: 20px;
    }

    .cta-button {
      padding: 15px 30px;
      font-size: 16px;
      background-color: #007BFF;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .cta-button:hover {
      background-color: #0056b3;
    }
  </style>
</head>
<body>
  <!-- Sliding background color -->
  <div class="color-slide"></div>

  <!-- Main container with logo and buttons -->
  <div class="container">
    <div class="logo">
      <img src="imgs/Screenshot 2024-11-17 171708.png" alt="Logo" class="logo-image">
    </div>
   
    <div class="button-container">
        <a href="login.php" class="cta-button" id="login" name="login">Log In</a>
        <a href="register.php" class="cta-button" id="register" name="register">Register</a>
    </div>
  </div>
</body>
</html>
