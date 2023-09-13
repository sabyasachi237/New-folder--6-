<?php
session_start();

// Initialize the step if it's not set in the session
if (!isset($_SESSION['step'])) {
    $_SESSION['step'] = 1;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['prev'])) {
        // Handle the "Previous" button click
        if ($_SESSION['step'] > 1) {
            $_SESSION['step']--;
        }
    } elseif ($_SESSION['step'] == 1) {
        // Handle Step 1 data if needed
        $_SESSION['step'] = 2;
    } elseif ($_SESSION['step'] == 2) {
        // Handle Step 2 data if needed
        $_SESSION['step'] = 3;
    } elseif ($_SESSION['step'] == 3) {
        // Handle Step 3 data if needed
        $_SESSION['step'] = 4;
    } elseif ($_SESSION['step'] == 4) {
        // Handle Step 4 data if needed
        $_SESSION['step'] = 5;
    } elseif ($_SESSION['step'] == 5) {
        // Handle Step 5 data if needed
        $_SESSION['step'] = 6;
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: white;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        h1 {
            text-align: center;
            color: white;
            background-color: #007bff;
            padding: 20px 0;
            margin: 0;
        }

        .container {
            background-color: white;
            padding: 20px;
            width: 100%;
            margin: 20px auto;
        }

        h2 {
            color: #333;
            margin-top: 0;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"],
        input[type="date"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"],
        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        button:hover {
            background-color: #0056b3;
        }

        .signature-pad {
            text-align: center;
        }

        #signature-canvas {
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        #clear-button {
            background-color: #f44336;
            color: white;
            border: none;
            padding: 5px 10px;
            margin-top: 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        #clear-button:hover {
            background-color: #d32f2f;
        }

        p {
            color: white;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 20px 20px 0; /* Adjust padding as needed */
            background-color: #007bff;
            margin: 0;
        }

        .header h1 {
            margin: 0;
            color: white;
        }

        .container {
            background-color: white;
            padding: 20px;
            width: 100%;
            margin: 20px auto;
        }

        .container form {
            margin-top: 20px;
        }

        #prev-button {
            background-color: #ccc;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            position: absolute;
            left: 20px; /* Adjust the left position as needed */
            top: 20px; /* Adjust the top position as needed */
        }

        #prev-button:hover {
            background-color: #999;
        }

    </style>
</head>

<body>
<h1>
        <?php if ($_SESSION['step'] == 1) : ?>
            Step 1 Title
        <?php elseif ($_SESSION['step'] == 2) : ?>
            Step 2 Title
        <?php elseif ($_SESSION['step'] == 3) : ?>
            Step 3 Title
        <?php elseif ($_SESSION['step'] == 4) : ?>
            Step 4 Title
        <?php elseif ($_SESSION['step'] == 5) : ?>
            Step 5 Title
        <?php endif; ?>
    </h1>
    <div class="container">
        <?php if ($_SESSION['step'] == 1) : ?>
            <form action="registration.php" method="post">
                <!-- Logo -->
                <div style="text-align: center;">
                    <img src="your-logo.png" alt="Your Logo" width="150">
                </div>

                <!-- Heading -->
                <div style="text-align: center; margin-top: 20px;">
                    <h3>Get Started</h3>
                </div>

                <!-- Lorem Ipsum Text -->
                <div style="text-align: center; margin-top: 20px;">
                    <p style="color:#333">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mauris urna. Proin aliquet nulla eu ligula feugiat, ac bibendum turpis venenatis. Sed ac ligula quis arcu suscipit auctor.</p>
                </div>

                <!-- Submit Button -->
                <div style="text-align: center; margin-top: 20px;">
                 <input type="submit" id="prev-button" name="prev" value="Previous">
                    <input type="submit" value="Get Started">
                </div>
            </form>

        <?php elseif ($_SESSION['step'] == 2) : ?>
            <form action="registration.php" method="post">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" style="width: 90%;" required><br><br>

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" style="width: 90%;" required><br><br>

                <label for="dob">Date of Birth:</label>
                <div id="dob-container">
                    <input type="date" name="dob" id="dob" placeholder="Click to open calendar" style="width: 90%;" required>
                </div><br><br>
                <input type="submit" id="prev-button" name="prev" value="Previous">

                <input type="submit" value="Continue" style="width: 90%;">
            </form>

            <script>
                // Add a click event listener to the "Date of Birth" input field container
                document.getElementById('dob-container').addEventListener('click', function() {
                    // Trigger a click event on the "Date of Birth" input field when the container is clicked
                    document.getElementById('dob').click();
                });
            </script>




<?php elseif ($_SESSION['step'] == 3) : ?>
    <h2>Upload Documents</h2>
    <form action="registration.php" method="post" enctype="multipart/form-data">
        <label for="documents">Upload Documents:</label>
        <div class="custom-file-upload">
            <input type="file" id="file-upload" name="documents[]" multiple required>
            <label for="file-upload" class="file-label">
                <i class="fa fa-camera"></i>
            </label>
        </div><br><br>

        <input type="submit" value="Next">
    </form>
    <style>
        .custom-file-upload {
            display: inline-block;
            position: relative;
        }

        .file-label {
            background-color: #f0f0f0;
            padding: 10px;
            border: 1px solid #ccc;
            cursor: pointer;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .fa-camera {
            margin-right: 5px;
        }

        /* Style the file input to be hidden */
        #file-upload {
            display: none;
        }
    </style>

        <?php elseif ($_SESSION['step'] == 4) : ?>
            <h2>Agree to Terms & Conditions</h2>
            <div style="text-align: left; margin-top: 20px;">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mauris urna. Proin aliquet nulla eu ligula feugiat, ac bibendum turpis venenatis. Sed ac ligula quis arcu suscipit auctor.
                </p>
            </div>
            <button onclick="openSignaturePopup()">Sign</button>

            <!-- Hidden signature popup -->
            <!-- Hidden signature popup -->
            <div id="signature-popup" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.7); z-index: 999;">
                <div style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); background: white; padding: 20px; width: 80%; max-width: 400px;">
                    <h2>New Signature</h2>
                    <canvas id="signature-canvas" width="400" height="200"></canvas>
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 10px;">
                        <button id="cancel-button" onclick="closeSignaturePopup()">Cancel</button>
                        <p>Please sign here.</p>
                        <button id="done-button">Done</button>
                    </div>
                </div>
            </div>


            <form action="registration.php" method="post">
                <!-- Add your terms & conditions form elements here -->
                <input type="hidden" id="signature-data" name="signature-data">
                <input type="submit" value="Next" style="display: none;">
            </form>

            <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
            <script>
                var signaturePad = new SignaturePad(document.getElementById('signature-canvas'));

                function openSignaturePopup() {
                    document.getElementById('signature-popup').style.display = 'block';
                }

                function closeSignaturePopup() {
                    document.getElementById('signature-popup').style.display = 'none';
                }

                // Handle Clear button click
                document.getElementById('cancel-button').addEventListener('click', function() {
                    signaturePad.clear();
                });

                // Handle form submission
                document.getElementById('done-button').addEventListener('click', function() {
                    // Get the signature data as a base64-encoded PNG image
                    var signatureData = signaturePad.toDataURL();

                    // Set the value of the hidden input to the signature data
                    document.getElementById('signature-data').value = signatureData;

                    // Submit the form
                    document.querySelector('form').submit();
                });
            </script>
        <?php elseif ($_SESSION['step'] == 5) : ?>
            <h2>Thank You</h2>
            <p>Thank you for registering!</p>
        <?php endif; ?>
    </div>
</body>

</html>
