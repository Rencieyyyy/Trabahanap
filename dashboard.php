<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Sidebar with Recommendations</title>
    <style>
/* Common styling */
body {
    margin: 0;
    font-family: Arial, sans-serif;
    display: flex;
    flex-direction: column;
    height: 100vh;
    background-color: #8CB9BD;
}

.burger-menu {
    position: absolute;
    margin-top: 20px;
    left: 10px;
    cursor: pointer;
    font-size: 24px;
    z-index: 1;
}

.search-bar {
    position: absolute;
    top: 6%;
    left: 50%;
    transform: translateX(-50%);
    width: 60%;
    max-width: 600px;
    background-color: #f1f1f1;
    padding: 10px;
    border-radius: 4px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.search-bar input {
    width: 100%;
    margin-left:-8px;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
}

.sidebar {
    height: 100vh;
    width: 220px;
    background-color: #333;
    color: #fff;
    position: fixed;
    top: 0;
    left: 0;
    display: flex;
    flex-direction: column;
    transition: transform 0.3s;
    transform: translateX(-100%);
}

.sidebar.visible {
    transform: translateX(0);
}

.sidebar a {
    margin-top: 40px;
    padding: 15px;
    text-decoration: none;
    color: #fff;
    display: block;
}

.sidebar a:hover {
    background-color: #444;
}

.content {
    margin-left: 220px;
    margin-top: 60px; /* Adjusted for search bar */
    padding: 20px;
    flex-grow: 1;
    transition: margin-left 0.3s;
    max-width: 1100px;
    margin-right: auto;
}

.content.shifted {
    margin-left: 0;
}

@media (max-width: 768px) {
    /* Mobile & Tablet Styles */
    .sidebar {
        display: block;
        transform: translateX(-100%);
    }

    .content {
        margin-left: 0;
        padding-top: 60px;
        padding-left: 10px;
        padding-right: 10px;
    }

    .sidebar.visible {
        transform: translateX(0);
    }

    .search-bar {
        top: 10px;
        width: 80%;
        max-width: 400px;
    }

    .recommendations-section {
        margin-left: 10px;
        margin-right: 10px;
        max-width: none;
        width: auto;
    }

    .sidebar a {
        padding: 10px;
        font-size: 14px;
    }

    .burger-menu {
        font-size: 30px;
    }
}

/* Styling for Recommendations */
.recommendations-section {
    background-color: #f1f1f1;
    padding: 15px;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    max-width: 600px;
    margin-left: 230px;
    margin-bottom: 20px;
}

.recommendations-section h2 {
    margin-bottom: 10px;
}

.recommendation {
    background: #ffffff;
    padding: 15px;
    margin-bottom: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.recommendation h3 {
    margin: 0 0 5px;
}

.recommendation p {
    margin: 0 0 5px;
}

.recommendation .details {
    font-size: 14px;
    color: #555;
    margin-bottom: 5px;
}

.recommendation a {
    display: inline-block;
   
    color: black;
    padding: 5px 10px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 14px;
}

.recommendation a:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>

    <div class="burger-menu" onclick="toggleMenu()">☰</div>

    <div class="search-bar">
        <input type="text" placeholder="Search...">
    </div>

    <div class="sidebar" id="sidebar">
        <a href="Message.php">Chat-plug in</a>
        <a href="notifications.php">Email Notifications</a>
        <a href="profile.php">Profile</a>
        <a href="AppJob.php">Job Form</a>
    </div>

    <div class="content" id="content">
        <h1>Trabahanap</h1>

        <!-- Recommendations Section -->
        <section class="recommendations-section" id="recommendationsSection">
            <h2>Recommended Jobs</h2>
        </section>
    </div>

    <script>
        // Toggle sidebar
        function toggleMenu() {
            var sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('visible');
            document.getElementById('content').classList.toggle('shifted');
        }

        // Display recommendations
        const recommendations = [
            { 
                title: 'Air Conditioning Repair', 
                company: 'Cool Breeze Solutions', 
                location: 'Luta Norte, Malvar, Batangas', 
                description: 'Reliable air conditioning repair and maintenance services for your home.', 
                link: 'apply.php',
                mapsUrl: 'https://www.google.com/maps?q=Luta+Norte,+Malvar,+Batangas' 
            },
            { 
                title: 'Interior Design Consultation', 
                company: 'Creative Spaces Inc.', 
                location: 'San Isidro, Malvar, Batangas', 
                description: 'Transform your space with our expert interior design consultations.', 
                link: 'apply.php',
                mapsUrl: 'https://www.google.com/maps?q=San+Isidro,+Malvar,+Batangas' 
            },
            { 
                title: 'Plumbing Services', 
                company: 'PipeFix Pro', 
                location: 'Bagong Pook, Malvar, Batangas', 
                description: 'Expert plumbing solutions for your home or office, available 24/7.', 
                link: 'apply.php',
                mapsUrl: 'https://www.google.com/maps?q=Bagong+Pook,+Malvar,+Batangas' 
            },
            { 
                title: 'Home Cleaner Needed', 
                company: 'Sparkle Cleaners', 
                location: 'Quezon City, PH', 
                description: 'Looking for a reliable home cleaner to assist with weekly cleaning.', 
                link: 'apply.php',
                mapsUrl: 'https://www.google.com/maps?q=Quezon+City,+PH' 
            },
            { 
                title: 'Handyman Available', 
                company: 'Fix-It Services', 
                location: 'Poblacion, Malvar, Batangas', 
                description: 'Hiring experienced handymen for home repairs and maintenance.', 
                link: 'apply.php',
                mapsUrl: 'https://www.google.com/maps?q=Poblacion,+Malvar,+Batangas' 
            },
            { 
                title: 'Gardener for Hire', 
                company: 'Green Thumb Landscaping', 
                location: 'San Gregorio, Malvar, Batangas', 
                description: 'Seeking skilled gardeners to maintain residential gardens.', 
                link: 'apply.php',
                mapsUrl: 'https://www.google.com/maps?q=San+Gregorio,+Malvar,+Batangas' 
            }
        ];

        function displayRecommendations() {
            const recommendationsSection = document.getElementById('recommendationsSection');
            recommendations.forEach(rec => {
                const recommendationDiv = document.createElement('div');
                recommendationDiv.className = 'recommendation';

                const title = document.createElement('h3');
                title.textContent = rec.title;

                const company = document.createElement('p');
                company.textContent = rec.company;
                company.className = 'details';

                const locationLink = document.createElement('a');
                locationLink.href = rec.mapsUrl;
                locationLink.textContent = ` ${rec.location}`;
                locationLink.target = '_blank'; // Opens in a new tab
                locationLink.style.color = '#007BFF';
                locationLink.style.textDecoration = 'underline'; // Always underlined
                locationLink.style.cursor = 'pointer';

                const description = document.createElement('p');
                description.textContent = rec.description;

                const applyLink = document.createElement('a');
applyLink.href = `${rec.link}?title=${encodeURIComponent(rec.title)}&company=${encodeURIComponent(rec.company)}&location=${encodeURIComponent(rec.location)}`;
applyLink.textContent = 'Apply Now';

// Add styles for the button-like appearance
applyLink.style.display = 'inline-block'; // Makes it look like a button
applyLink.style.backgroundColor = '#007BFF'; // Blue background
applyLink.style.color = '#FFFFFF'; // White text for contrast
applyLink.style.padding = '4px 15px'; // Padding: 4px top/bottom, 15px left/right
applyLink.style.borderRadius = '5px'; // Rounded corners
applyLink.style.textDecoration = 'none'; // Remove underline
applyLink.style.marginTop = '10px'; // Optional spacing above the link

// Add a hover effect
applyLink.onmouseover = () => {
    applyLink.style.backgroundColor = '#0056b3'; // Darker blue when hovered
};

applyLink.onmouseout = () => {
    applyLink.style.backgroundColor = '#007BFF'; // Revert to original blue
};

                const likeButton = document.createElement('button');
                likeButton.textContent = 'Saved';
                likeButton.style.marginLeft = '10px';
                likeButton.onclick = () => {
                    likeButton.textContent = likeButton.textContent === 'Saved' ? 'Unsaved' : 'Saved';
                };

                recommendationDiv.appendChild(title);
                recommendationDiv.appendChild(company);
                recommendationDiv.appendChild(locationLink); // Directly append the link
                recommendationDiv.appendChild(description);
                recommendationDiv.appendChild(applyLink);
                recommendationDiv.appendChild(likeButton);
                recommendationsSection.appendChild(recommendationDiv);
            });
        }

        window.onload = displayRecommendations;

    </script>
</body>
</html>
