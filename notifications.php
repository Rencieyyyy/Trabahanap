<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification</title>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js"></script>
    <script type="text/javascript">
        (function(){
            emailjs.init("ZK2OyQylXGWQuSO-s"); // Public key from EmailJS
        })();
    </script>
    <style>
        /* General styles */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #8CB9BD;
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Align items to the top for better spacing */
    height: 100vh;
    padding-top: 20px; /* Add padding for better visibility on mobile */
}

/* Email form container */
.email-form {
    background: #ffffff;
    padding: 20px 30px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 450px;
    text-align: center;
}

/* Input and textarea styling */
.email-form input,
.email-form textarea {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 16px;
    outline: none;
}

/* Button styling */
.email-form button {
    background: #007BFF;
    color: #ffffff;
    border: none;
    padding: 10px 20px;
    border-radius: 4px;
    font-size: 16px;
    cursor: pointer;
    transition: background 0.3s ease;
    margin: 5px;
}

.email-form button:hover {
    background: #0056b3;
}

/* Back button styling */
.back-button {
    position: absolute;
    top: 20px;
    left: 20px;
    background: #6c757d;
    color: #ffffff;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.back-button:hover {
    background: #5a6268;
}

/* Notification section */
.notifications {
    background: #ffffff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    width: 90%;
    max-width: 450px;
    margin-top: 20px;
}

.notifications h3 {
    font-size: 18px;
    margin-bottom: 15px;
}

.notification-item {
    padding: 10px;
    border-bottom: 1px solid #ddd;
    cursor: pointer;
    transition: background 0.3s ease;
}

/* Unseen notifications */
.notification-item.unseen {
    background: #007BFF;
    color: #ffffff;
}

.notification-item:hover {
    background: #f0f0f0;
    color: #000000;
}

/* Mark All and Clear All Buttons */
.notification-actions {
    display: flex;
    justify-content: space-between;
    margin-top: 15px;
}

.notification-actions button {
    background: black;
    color: #ffffff;
    border: none;
    padding: 6px 10px;
    border-radius: 4px;
    font-size: 12px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.notification-actions button:hover {
    background: #0056b3;
}

/* Responsive design */
@media (max-width: 1024px) {
    .email-form, .notifications {
        width: 80%;
        max-width: 350px;
    }
}

@media (max-width: 768px) {
    .email-form, .notifications {
        width: 90%;
        max-width: 320px;
    }

    .back-button {
        font-size: 12px;
        padding: 8px 12px;
    }

    .email-form input,
    .email-form textarea {
        font-size: 14px;
    }

    .notification-actions {
        flex-direction: column;
        align-items: stretch;
    }

    .notification-actions button {
        margin-bottom: 10px;
    }
}

@media (max-width: 480px) {
    .email-form, .notifications {
        width: 95%;
        max-width: 280px;
    }

    .email-form button {
        font-size: 14px;
        padding: 8px 15px;
    }

    .back-button {
        font-size: 10px;
        padding: 6px 10px;
    }

    .notification-item {
        font-size: 14px;
    }
}

    </style>
</head>
<body>
    <button class="back-button" onclick="goBack()">Back to Dashboard</button>
    <div class="email-form">
        <h2>Send an Email</h2>
        <input type="text" id="fullName" placeholder="Full Name" required />
        <input type="email" id="email_id" placeholder="Email ID" required />
        <textarea id="message" placeholder="Your Message" rows="5" required></textarea>
        <button onclick="sendMail()">Send</button>

        <!-- Notifications Section -->
        <div class="notifications">
            <h3>Notifications</h3>
            <div class="notification-item unseen" onclick="showNotificationDetails('New message from John', this)">New message from John</div>
            <div class="notification-item unseen" onclick="showNotificationDetails('System update available', this)">System update available</div>
            <div class="notification-item" onclick="showNotificationDetails('Meeting scheduled at 3 PM', this)">Meeting scheduled at 3 PM</div>
            <div class="notification-item unseen" onclick="showNotificationDetails('Your subscription is expiring soon', this)">Your subscription is expiring soon</div>
            <div class="notification-item" onclick="showNotificationDetails('New comment on your post', this)">New comment on your post</div>

            <div class="notification-actions">
                <button onclick="markAllAsRead()">Mark All as Read</button>
                <button onclick="clearAll()">Clear All</button>
            </div>
        </div>
    </div>

    <script>
       // Function to simulate sending an email and adding a notification
function sendMail() {
    const params = {
        from_name: document.getElementById("fullName").value,
        email_id: document.getElementById("email_id").value,
        message: document.getElementById("message").value,
    };

    // Check if all fields are filled
    if (!params.from_name || !params.email_id || !params.message) {
        alert("Please fill in all fields!");
        return;
    }

    // Create a new notification for the sent email
    const notifications = document.querySelector('.notifications');
    const newNotification = document.createElement('div');
    newNotification.classList.add('notification-item', 'unseen');
    newNotification.textContent = `Email to ${params.email_id} was queued. Check the outbox for details.`;
    newNotification.onclick = () => showNotificationDetails(newNotification.textContent, newNotification);

    // Insert the notification at the top of the list
    notifications.insertBefore(newNotification, notifications.firstChild);

    alert("Email simulation successful. Notification added.");
}

// Function to navigate back to the dashboard
function goBack() {
    window.location.href = "dashboard.php";
}

// Function to mark all notifications as read
function markAllAsRead() {
    const notifications = document.querySelectorAll('.notification-item.unseen');
    notifications.forEach(notification => {
        notification.classList.remove('unseen');
    });
    alert("All notifications marked as read.");
}

// Function to clear all notifications
function clearAll() {
    const notificationList = document.querySelector('.notifications');
    notificationList.querySelectorAll('.notification-item').forEach(notification => notification.remove());
    alert("All notifications cleared.");
}

// Function to show the details of a clicked notification
function showNotificationDetails(notificationMessage, element) {
    // Check if the details already exist; if they do, return
    if (element.querySelector('.notification-details')) return;

    // Mark the notification as read
    element.classList.remove('unseen');

    // Create a div to show full details
    const details = document.createElement('div');
    details.classList.add('notification-details');
    details.style.marginTop = '10px';
    details.innerHTML = `
        <p>${notificationMessage} - Additional information about this notification.</p>
        <button onclick="toggleReply(this)">Reply</button>
        <div class="reply-box" style="display: none; margin-top: 10px;">
            <textarea placeholder="Write your reply..." rows="3" style="width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px;"></textarea>
            <button onclick="sendReply(this)">Send Reply</button>
        </div>
    `;

    // Append the details below the clicked notification
    element.appendChild(details);
}

// Function to toggle the visibility of the reply box
function toggleReply(button) {
    const replyBox = button.nextElementSibling;
    replyBox.style.display = replyBox.style.display === 'none' ? 'block' : 'none';
}

// Function to send a reply
function sendReply(button) {
    const replyBox = button.parentElement;
    const replyMessage = replyBox.querySelector('textarea').value;

    if (!replyMessage) {
        alert("Please write a reply before sending.");
        return;
    }

    alert("Reply sent!");
    replyBox.querySelector('textarea').value = ''; // Clear the textarea
    replyBox.style.display = 'none';  // Hide the reply box
}

    </script>
</body>
</html>
