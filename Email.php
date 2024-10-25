<?php
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;

// Include PHPMailer classes
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

function sendMail($email, $subject, $message) {
    $mail = new PHPMailer(true);

    try {
        // Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Replace with your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'gguencarlo@gmail.com';  // Your email
        $mail->Password = 'bezw bvnz qxcc qocc';        // Your email password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Sender and recipient settings
        $mail->setFrom('gguencarlo@gmail.com', 'SANTA RITA RECORD SYSTEM ');
        $mail->addAddress($email);  // Recipient email

        // Email content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;
        $mail->AltBody = strip_tags($message);

        $mail->send();
        return "success";
    } catch (Exception $e) {
        return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>

<?php
// Check if the form is submitted
$response = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['email']) || empty($_POST['subject']) || empty($_POST['message'])) {
        $response = "All fields are required";
    } else {
        // Call sendMail function and pass the form data
        $response = sendMail($_POST['email'], $_POST['subject'], $_POST['message']);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Notification Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .email-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .email-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .email-form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .email-form input, 
        .email-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .email-form button {
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .email-form button:hover {
            background-color: #218838;
        }

        .notification {
            display: none;
            text-align: center;
            margin-top: 10px;
            padding: 10px;
            border-radius: 4px;
        }

        .success {
            background-color: #d4edda;
            color: #155724;
        }

        .error {
            background-color: #f8d7da;
            color: #721c24;
        }

        @media (max-width: 600px) {
            .email-form {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    <div class="email-form">
        <h2>Send Email Notification</h2>
        <form action="" method="post">
            <label for="email">Recipient Email:</label>
            <input type="email" id="email" name="email" placeholder="Enter recipient email" required>
            
            <label for="subject">Subject:</label>
            <input type="text" id="subject" name="subject" placeholder="Enter email subject" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
            
            <button type="submit" name="submit">Send Email</button>
            <br><br>
            <button type="button" onclick="window.location.href='index.php'">BACK</button>

            <?php if (isset($response)) : ?>
                <div class="notification <?= $response == 'success' ? 'success' : 'error'; ?>" style="display: block;">
                    <?= $response == 'success' ? 'Email sent successfully.' : $response; ?>
                </div>
            <?php endif; ?>
        </form>
    </div>

</body>
</html>
