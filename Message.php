<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Messenger</title>
    <style>
        /* General body styles */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #8CB9BD; /* Subtle light blue background for a soft look */
            display: flex;
            justify-content: center; /* Centers the content horizontally */
            align-items: center; /* Centers the content vertically */
            height: 100vh; /* Full viewport height */
            flex-direction: column; /* Stack content vertically */
        }

        /* Centered text */
        .centered-text {
            font-size: 48px; /* Large font size */
            font-weight: bold;
            color: black; /* White text color */
            text-align: center; /* Center text horizontally */
            animation: fadeInOut 4s infinite; /* Fade in and out animation */
        }

        /* Fade In and Out Animation */
        @keyframes fadeInOut {
            0% {
                opacity: 0;
                transform: translateX(-100%); /* Start off-screen to the left */
            }
            50% {
                opacity: 1;
                transform: translateX(0); /* Move to the center */
            }
            100% {
                opacity: 0;
                transform: translateX(100%); /* Move off-screen to the right */
            }
        }

        /* Back Button Styles */
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

        /* Tidio Chat Widget Styles */
        .tidio-chat {
            color: white; /* Text color */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Shadow effect */
            padding: 20px; /* Padding inside the chat */
            max-width: 400px; /* Maximum width of the chat */
            position: fixed; /* Fixed position */
            bottom: 20px; /* Distance from the bottom */
            right: 20px; /* Distance from the right */
            z-index: 1000; /* Ensure it appears above other elements */
            background-color: #ffffff; /* White background for the chat */
            display: flex;
            flex-direction: column;
        }

        /* Chat header styles */
        .tidio-chat-header {
            font-size: 18px; /* Header font size */
            font-weight: bold; /* Bold header */
            margin-bottom: 10px; /* Space below header */
            color: #0084ff; /* Use the primary color for the header */
            text-align: center; /* Center the header */
        }

        /* Message bubble styles */
        .tidio-chat-message {
            background-color: #e9e9e9; /* Light gray for message bubbles */
            color: #333; /* Dark text color */
            border-radius: 15px; /* Rounded message bubbles */
            padding: 12px; /* Padding inside message bubbles */
            margin: 8px 0; /* Space between messages */
            max-width: 80%;
            line-height: 1.5; /* Improve readability */
        }

        /* User message styles */
        .tidio-chat-message.user {
            background-color: #0084ff; /* User messages in blue */
            color: white; /* White text for user messages */
            align-self: flex-end; /* Align user messages to the right */
        }

        /* Operator message styles */
        .tidio-chat-message.operator {
            align-self: flex-start;
            background-color: #f1f1f1; /* Light background for operator */
        }

        /* Input field styles */
        .tidio-chat-input {
            border: 1px solid #ccc; /* Light gray border */
            border-radius: 20px; /* Rounded corners for input */
            padding: 12px; /* Padding inside input */
            width: calc(100% - 24px); /* Full width minus padding */
            margin-top: 10px; /* Space above input */
            font-size: 14px; /* Text size in input field */
            outline: none;
        }

        /* Focus effect on input field */
        .tidio-chat-input:focus {
            border-color: #0084ff; /* Focus on border color */
            box-shadow: 0 0 5px rgba(0, 132, 255, 0.5); /* Subtle glow */
        }

        /* Typing indicator */
        .tidio-chat-typing {
            font-size: 16px;
            color: #0084ff;
            margin-top: 10px;
            text-align: center;
        }

        /* Responsive styles */
        @media (max-width: 600px) {
            .tidio-chat {
                width: 90%; /* Full width on small screens */
                margin: 0 auto; /* Center the chat */
            }
        }
    </style>
</head>
<body>
    <!-- Centered "Trabahanap" text -->
    <div class="centered-text">
        TRABAHANAP.SITE
    </div>

    <!-- Back Button -->
    <a href="dashboard.php" class="back-button">Back to Dashboard</a>

    <!-- Tidio Chat Widget -->
    <script src="//code.tidio.co/7x2qh68bpghtsqeqbnieb0tgqonk6wt5.js" async></script>
    <!-- AI Chat Response Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Wait for the Tidio API to initialize
            tidioChatApi.on('ready', function () {
                console.log('Tidio Chat is ready!');

                // Send a welcome message
                tidioChatApi.sendMessage({
                    message: "Hi there! 👋 How can I assist you today?",
                    from: "operator"
                });

                // Listen for messages from the user
                tidioChatApi.on('messageReceived', function (message) {
                    if (message.from === 'visitor') {
                        console.log("User said:", message.message);

                        // Display typing indicator
                        const typingIndicator = document.createElement('div');
                        typingIndicator.classList.add('tidio-chat-typing');
                        typingIndicator.textContent = 'AI is typing...';
                        document.querySelector('.tidio-chat').appendChild(typingIndicator);

                        // Simulate AI thinking and then respond
                        setTimeout(function () {
                            typingIndicator.remove(); // Remove typing indicator after response
                            
                            const userMessage = message.message.toLowerCase();

                            // Simple AI response logic
                            if (userMessage.includes("hello")) {
                                tidioChatApi.sendMessage({
                                    message: "Hello! 😊 How can I assist you today?",
                                    from: "operator"
                                });
                            } else if (userMessage.includes("help")) {
                                tidioChatApi.sendMessage({
                                    message: "Of course! What can I help you with? 😊",
                                    from: "operator"
                                });
                            } else {
                                tidioChatApi.sendMessage({
                                    message: "I'm here to help! Can you provide more details? 😊",
                                    from: "operator"
                                });
                            }
                        }, 1500); // Simulate a small delay for the AI's response
                    }
                });
            });
        });
    </script>
</body>
</html>
