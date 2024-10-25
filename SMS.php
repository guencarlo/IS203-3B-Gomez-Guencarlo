<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Sender</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #74ebd5 0%, #ACB6E5 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .sms-form {
            background-color: #fff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            max-width: 420px;
            width: 100%;
            transition: transform 0.3s ease-in-out;
        }
        .sms-form:hover {
            transform: translateY(-5px);
        }
        .sms-form h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
            font-size: 24px;
        }
        .sms-form label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }
        .sms-form input, 
        .sms-form textarea {
            width: 100%;
            padding: 12px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-sizing: border-box;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }
        .sms-form input:focus, 
        .sms-form textarea:focus {
            border-color: #74ebd5;
            outline: none;
        }
        .sms-form button {
            width: 100%;
            padding: 12px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .sms-form button:hover {
            background-color: #218838;
        }
        .notification {
            display: none;
            text-align: center;
            margin-top: 10px;
            padding: 12px;
            border-radius: 6px;
            font-size: 14px;
        }
        .success {
            background-color: #d4edda;
            color: #155724;
        }
        .error {
            background-color: #f8d7da;
            color: #721c24;
        }
        /* Button for back navigation */
        .back-btn {
            width: 100%;
            padding: 12px;
            margin-top: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .back-btn:hover {
            background-color: #0056b3;
        }
        @media (max-width: 600px) {
            .sms-form {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

    <div class="sms-form">
        <h2>Send SMS</h2>
        <form id="smsForm">
            <label for="to">To:</label>
            <input type="text" id="to" name="to" placeholder="Enter phone number" required>
            
            <label for="message">Message:</label>
            <textarea id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
            
            <button type="submit">Send</button>
        </form>

        <form action="index.php">
            <button class="back-btn" type="submit">BACK</button>
        </form>

        <div class="notification success" id="successMessage">
            SMS sent successfully!
        </div>
        <div class="notification error" id="errorMessage">
            Error sending SMS!
        </div>
    </div>

    <script>
        document.getElementById('smsForm').addEventListener('submit', function(e) {
            e.preventDefault();

            let to = document.getElementById('to').value;
            let message = document.getElementById('message').value;

            let formData = new FormData();
            formData.append('to', to);
            formData.append('message', message);

            fetch('sms2.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                    document.getElementById('successMessage').style.display = 'block';
                    document.getElementById('errorMessage').style.display = 'none';
                } else {
                    document.getElementById('errorMessage').innerText = data.message;
                    document.getElementById('errorMessage').style.display = 'block';
                    document.getElementById('successMessage').style.display = 'none';
                }
            })
            .catch(error => {
                document.getElementById('errorMessage').innerText = "Error sending SMS!";
                document.getElementById('errorMessage').style.display = 'block';
                document.getElementById('successMessage').style.display = 'none';
            });
        });
    </script>

</body>
</html>
