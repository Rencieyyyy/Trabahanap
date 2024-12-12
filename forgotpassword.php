<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Forgot Password</title>
<style>
   
 

   body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #8CB9BD;
        }

        .container {
            width: 100%;
            max-width: 700px;
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            text-align: center;
        }

        h2 {
            color: #333;
            font-size: 2rem;
        }

        label {
            display: block;
            margin: 15px 0 5px;
            text-align: left;
            font-size: 1.1rem;
        }

        input[type="email"] {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
        }

        button {
            padding: 12px 18px;
            background-color: #A52A2A;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 1.1rem;
        }

        .message {
            margin-top: 20px;
            color: green;
            font-size: 1rem;
        }

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

        @media (max-width: 768px) {
            .container {
                max-width: 90%;
                padding: 15px;
            }

            h2 {
                font-size: 1.5rem;
            }

            label {
                font-size: 0.9rem;
            }

            input[type="email"] {
                padding: 8px;
                font-size: 0.9rem;
            }

            button {
                padding: 8px 12px;
                font-size: 1rem;
            }

            .message {
                font-size: 0.9rem;
            }
        }
</style>
</head>
<body>
    <a href="login.php" class="back-button">← Back</a>
   
<div class="container">
  <h2>Forgot Password</h2>
  <p>Please enter your email address to receive a verification link.</p>

  <form id="forgot-password-form">
    <label for="email">Email:</label>
    <input type="email" id="email" placeholder="Enter your email" required>

    <button type="submit">Send Verification Link</button>
  </form>

  <div class="message" id="message" style="display: none;">
    A verification link has been sent to your email. Please check your inbox.
  </div>
</div>

<script src="https://cdn.emailjs.com/dist/email.min.js"></script>
<script>
  (function() {
    emailjs.init('your_user_id'); // Replace with your EmailJS user ID
  })();

  document.getElementById('forgot-password-form').addEventListener('submit', function(event) {
    event.preventDefault();

    const email = document.getElementById('email').value;

    if (email) {
      const templateParams = {
        to_email: 'your-email@example.com', // Replace with your email address
        subject: 'Password Reset Verification',
        message: `A password reset request was made for the email address: ${email}. If this was not you, please ignore this email.`
      };

      // Send email to your email address
      emailjs.send('your_service_id', 'your_template_id', templateParams)
        .then(function(response) {
          console.log('Success:', response);
          document.getElementById('message').style.display = 'block';
          window.location.href = "Trabahanap.html"; // Redirect to another page after submission
        }, function(error) {
          console.error('Error:', error);
          alert('There was an issue sending the email. Please try again later.');
        });
    }
  });
</script>

</body>
</html>