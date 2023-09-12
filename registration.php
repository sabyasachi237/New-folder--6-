<?php
session_start();

// Initialize the step if it's not set in the session
if (!isset($_SESSION['step'])) {
    $_SESSION['step'] = 1;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_SESSION['step'] == 1) {
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
        // Clear the session to reset the process
        session_unset();
        session_destroy();
    }
    header('Location: registration.php');
    exit;
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Registration</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: skyblue;
            margin: 0;
            padding: 0;
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
            max-width: 600px;
            margin: 20px auto;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #007bff;
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
            border-radius: 4px;
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
            color: #007bff;
        }
    </style>
</head>

<body>
    <h1>Patient Registration</h1>
    <div class="container">
        <?php if ($_SESSION['step'] == 1) : ?>
            <form action="registration.php" method="post">
                <!-- Logo -->
                <div style="text-align: center;">
                    <img src="your-logo.png" alt="Your Logo" width="150">
                </div>

                <!-- Heading -->
                <div style="text-align: center; margin-top: 20px;">
                    <h3>Step 1: Get Started</h3>
                </div>

                <!-- Lorem Ipsum Text -->
                <div style="text-align: center; margin-top: 20px;">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam nec mauris urna. Proin aliquet nulla eu ligula feugiat, ac bibendum turpis venenatis. Sed ac ligula quis arcu suscipit auctor.</p>
                </div>

                <!-- Submit Button -->
                <div style="text-align: center; margin-top: 20px;">
                    <input type="submit" value="Next">
                </div>
            </form>

        <?php elseif ($_SESSION['step'] == 2) : ?>
            <form action="registration.php" method="post">
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" required><br><br>

                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" required><br><br>

                <label for="dob">Date of Birth:</label>
                <input type="date" name="dob" required><br><br>

                <input type="submit" value="Next">
            </form>
        <?php elseif ($_SESSION['step'] == 3) : ?>
            <h2>Step 3: Upload Documents</h2>
            <form action="registration.php" method="post" enctype="multipart/form-data">
                <label for="documents">Upload Documents:</label>
                <input type="file" name="documents[]" multiple required><br><br>

                <input type="submit" value="Next">
            </form>
        <?php elseif ($_SESSION['step'] == 4) : ?>
            <h2>Step 4: Electronic Signature</h2>
            <div class="signature-pad">
                <canvas id="signature-canvas" width="400" height="200"></canvas>
                <button id="clear-button">Clear</button>
            </div>
            <form action="registration.php" method="post">
                <!-- Add a hidden input to store the signature data -->
                <input type="hidden" name="signature" id="signature-data">
                <input type="submit" value="Submit">
            </form>
            <script src="https://cdn.jsdelivr.net/npm/signature_pad@2.3.2/dist/signature_pad.min.js"></script>
            <script>
                var signaturePad = new SignaturePad(document.getElementById('signature-canvas'));

                // Handle Clear button click
                document.getElementById('clear-button').addEventListener('click', function() {
                    signaturePad.clear();
                });

                // Handle form submission
                document.querySelector('form').addEventListener('submit', function() {
                    // Get the signature data as a base64-encoded PNG image
                    var signatureData = signaturePad.toDataURL();

                    // Set the value of the hidden input to the signature data
                    document.getElementById('signature-data').value = signatureData;
                });
            </script>
        <?php elseif ($_SESSION['step'] == 5) : ?>
            <h2>Step 5: Thank You</h2>
            <p>Thank you for registering!</p>
        <?php endif; ?>
    </div>
</body>

</html>