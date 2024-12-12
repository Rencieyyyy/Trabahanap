<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reply</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f3f4f6;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 1.8em;
            color: #333;
            margin-bottom: 20px;
            text-align: center;
        }

        .message-info {
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .message-info strong {
            color: #1f2937;
        }

        .actions {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }

        .actions button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .actions button.accept {
            background-color: #4caf50;
            color: white;
        }

        .actions button.accept:hover {
            background-color: #45a049;
            transform: scale(1.05);
        }

        .actions button.decline {
            background-color: #f44336;
            color: white;
        }

        .actions button.decline:hover {
            background-color: #e53935;
            transform: scale(1.05);
        }

        .form-container {
            display: none; /* Initially hidden */
        }

        textarea {
            width: 100%;
            height: 120px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 20px;
            resize: none;
        }

        button.send {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        button.send:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .back-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #6c757d;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            margin-bottom: 20px;
            transition: background-color 0.3s ease;
        }

        .back-button:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="message.php" class="back-button">Back to Messages</a> <!-- Back button added here -->
        <h1>Message from <?php echo htmlspecialchars($_GET['sender']); ?></h1>
        <div class="message-info">
            <p><strong>Sender:</strong> <?php echo htmlspecialchars($_GET['sender']); ?></p>
            <p><strong>Message:</strong> <?php echo htmlspecialchars($_GET['message']); ?></p>
        </div>

        <div class="actions">
            <button class="accept" id="accept-button">Accept</button>
            <button class="decline" onclick="declineMessage()">Decline</button>
        </div>

        <div class="form-container" id="reply-form">
            <form action="send_reply.php" method="POST">
                <textarea name="reply" placeholder="Type your reply here..."></textarea>
                <button type="submit" class="send">Send Reply</button>
                <input type="hidden" name="sender" value="<?php echo htmlspecialchars($_GET['sender']); ?>">
            </form>
        </div>
    </div>

    <script>
        const acceptButton = document.getElementById('accept-button');
        const replyForm = document.getElementById('reply-form');

        // Show the reply form when "Accept" is clicked
        acceptButton.addEventListener('click', function () {
            replyForm.style.display = 'block';
            acceptButton.parentElement.style.display = 'none'; // Hide buttons after accepting
        });

        // Redirect or handle "Decline" functionality
        function declineMessage() {
            alert("You have declined the message.");
            window.location.href = "message.php"; // Redirect to the messages list
        }
    </script>
</body>
</html>
