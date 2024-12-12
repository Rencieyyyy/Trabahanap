<!DOCTYPE html>
<html>
<head>
    <title>Job Application or Posting</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #8CB9BD;
            color: #333;
            overflow-x: hidden;
        }

        h1 {
            text-align: center;
            margin: 20px 0;
            color: #444;
            animation: fadeIn 1s ease-in-out;
        }

        #userTypeSelection {
            text-align: center;
            margin: 40px 0;
            animation: slideIn 1.5s ease-out;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 10px;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.3s, background-color 0.3s;
        }

        button:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
            max-width: 600px;
            animation: fadeInForm 1s ease-in-out;
        }

        input, textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button[type="submit"] {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #218838;
        }

        #jobApplicationForm, #jobPostingForm {
            display: none;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        @keyframes slideIn {
            from {
                transform: translateY(-20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        @keyframes fadeInForm {
            from {
                opacity: 0;
                transform: scale(0.95);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @media (max-width: 768px) {
            body {
                padding: 10px;
            }

            button {
                width: 90%;
            }
        }
        .back-button {
            background-color: #6c757d; /* Gray background */
            color: white; /* White text */
            border: none;
            border-radius: 5px;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            position: absolute; /* Position it absolutely */
            top: 20px; /* Distance from the top */
            left: 20px; /* Distance from the left */
            text-align: center;
            text-decoration: none; /* Remove underline */
        }

        .back-button:hover {
            background-color: #5a6368; /* Slightly darker gray on hover */
        }

    </style>
</head>
<body>
<a href="dashboard.php" class="back-button">Back to Dashboard</a>

    <h1>Apply or Post a Job</h1>
    <div id="userTypeSelection">
        <h3>Select User Type</h3>
        <button onclick="showForm('seeker')">I am a Job Seeker</button>
        <button onclick="showForm('client')">I am a Client</button>
    </div>

    <div id="jobApplicationForm">
        <h3 style="text-align: center; animation: fadeIn 1s ease-in;">Job Application Form</h3>
        <form method="GET" action="dashboard.php">
            <input type="text" name="name" placeholder="Full Name" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <textarea name="resume" placeholder="Paste Your Resume" required></textarea>
            <button type="submit">Submit Application</button>
        </form>
    </div>

    <div id="jobPostingForm">
        <h3 style="text-align: center; animation: fadeIn 1s ease-in;">Job Posting Form</h3>
        <form method="GET" action="dashboard.php">
            <input type="text" name="title" placeholder="Job Title" required>
            <textarea name="description" placeholder="Job Description" required></textarea>
            <input type="text" name="location" placeholder="Location" required>
            <button type="submit">Post Job</button>
        </form>
    </div>

    <script>
        function showForm(userType) {
            document.getElementById('userTypeSelection').style.display = 'none';

            if (userType === 'seeker') {
                document.getElementById('jobApplicationForm').style.display = 'block';
            } else if (userType === 'client') {
                document.getElementById('jobPostingForm').style.display = 'block';
            }
        }
    </script>
</body>
</html>
