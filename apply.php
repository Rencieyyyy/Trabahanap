<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Application Form</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<style>
    /* Global Styling */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #8CB9BD;
        padding: 20px;
    }

    .container {
        max-width: 900px;
        margin: auto;
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    form fieldset {
        border: none;
        margin-bottom: 20px;
    }

    legend {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin: 8px 0 4px;
    }

    input, select, textarea {
        width: 100%;
        padding: 10px;
        margin-bottom: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    textarea {
        resize: vertical;
        height: 100px;
    }

    input[type="file"] {
        padding: 5px;
    }

    input[type="submit"], button[type="submit"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
        width: 100%;
        font-size: 16px;
    }

    input[type="submit"]:hover, button[type="submit"]:hover {
        background-color: #45a049;
    }

    .form-actions {
        text-align: center;
    }

    button[type="submit"] {
        width: auto;
    }

    /* Back Button Styling */
    .back-button {
        display: inline-block;
        text-decoration: none;
        background-color:#6c757d;
        color: white;
        padding: 5px 10px; /* Reduced padding for a smaller button */
        border-radius: 5px;
        font-size: 14px; /* Smaller font size */
        margin-bottom: 20px;
        margin-top: 10px; /* Space above the button */
    }

    .back-button:hover {
        background-color: #0056b3;
    }
    .declaration {
            display: flex;
            align-items: center;
            margin-top: 20px;
        }
</style>


    <div class="container">
        <!-- Back to Dashboard Button -->
        <a href="dashboard.php" class="back-button">Back to Dashboard</a>

        <h2>Job Application Form</h2>
        <form id="job-application-form" action="#" method="POST" onsubmit="showSuccessMessage(event)" enctype="multipart/form-data">
            <!-- Personal Information -->
            <fieldset>
                <legend>Personal Information</legend>
                <label for="full-name">Full Name</label>
                <input type="text" id="full-name" name="full-name" required>

                <label for="address">Home Address</label>
                <input type="text" id="address" name="address" required>

                <label for="phone">Phone Number</label>
                <input type="tel" id="phone" name="phone" required>

                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>

                <label for="dob">Date of Birth</label>
                <input type="date" id="dob" name="dob" required>

                <label for="nationality">Nationality</label>
                <input type="text" id="nationality" name="nationality" required>
            </fieldset>

            
            <fieldset>
                <legend>Position Details</legend>
                <label for="services">Service(s) Offered</label>
                <input type="text" id="services" name="services" required>

                <label for="experience">Years of Experience in This Field</label>
                <input type="number" id="experience" name="experience" required>

                <label for="location">Preferred Work Area/Location</label>
                <input type="text" id="location" name="location" required>

                <label for="availability">Availability (Days and Hours)</label>
                <input type="text" id="availability" name="availability" required>
            </fieldset>

            
            <fieldset>
                <legend>Skills and Qualifications</legend>
                <label for="skills">List of Skills/Services Provided</label>
                <input type="text" id="skills" name="skills" required>

                <label for="certifications">Certifications or Licenses (if applicable)</label>
                <input type="text" id="certifications" name="certifications">

                <label for="languages">Languages Spoken</label>
                <input type="text" id="languages" name="languages" required>
            </fieldset>

           
            <fieldset>
                <legend>Equipment and Tools</legend>
                <label for="tools">Do you have your own tools/equipment?</label>
                <select id="tools" name="tools" required>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>

                <label for="equipment">List of Equipment (if applicable)</label>
                <input type="text" id="equipment" name="equipment">
            </fieldset>

            <!-- Work History -->
            <fieldset>
                <legend>Work History</legend>
                <label for="employer">Previous Employer/Client</label>
                <input type="text" id="employer" name="employer" required>

                <label for="job-title">Job Title/Role</label>
                <input type="text" id="job-title" name="job-title" required>

                <label for="employment-dates">Employment Dates</label>
                <input type="text" id="employment-dates" name="employment-dates" required>
            </fieldset>

            <!-- Background Information -->
            <fieldset>
                <legend>Background Information</legend>
                <label for="work-authorization">Are you legally authorized to work in this country?</label>
                <select id="work-authorization" name="work-authorization" required>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>

                <label for="limitations">Do you have any physical limitations or conditions that could affect your work?</label>
                <select id="limitations" name="limitations" required>
                    <option value="yes">Yes</option>
                    <option value="no">No</option>
                </select>
            </fieldset>

            <!-- Declaration -->
            <fieldset>
                <legend>Declaration</legend>
                <label for="declaration">
                    <input type="checkbox" id="declaration" name="declaration" required>
                    I hereby declare that the information provided is true and complete to the best of my knowledge.
                </label>
            </fieldset>

            <!-- Resume Upload -->
            <fieldset>
                <legend>Upload Resume</legend>
                <label for="resume">Resume/CV (PDF, DOC, DOCX)</label>
                <input type="file" id="resume" name="resume" accept=".pdf, .doc, .docx" required>
            </fieldset>

            <div class="form-actions">
                <button type="submit">Submit Application</button>
            </div>
        </form>
    </div>

    <script>
        function showSuccessMessage(event) {
            event.preventDefault(); // Prevents form submission for the demo purpose

            // Show success alert
            alert("Your job application has been successfully submitted!");
            // Optionally, redirect to another page or clear the form
            // window.location.href = "dashboard.php"; // Uncomment to redirect to dashboard after submission
        }
    </script>
</body>
</html>
