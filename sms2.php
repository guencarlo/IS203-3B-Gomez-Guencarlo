<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'twilio-php-main\src\Twilio\autoload.php';

    $sid = "AC0945d50499e470cca43af49848a49478"; // Your Account SID
    $token = "921ba0b0322f2b2fac119a6218cbb7e7"; // Your Auth Token
    $client = new Twilio\Rest\Client($sid, $token);

    $to = $_POST['to'];
    $message = $_POST['message'];

    try {
        $client->messages->create(
            $to, // Recipient's phone number
            [
                'from' => '+12676897354', // Twilio phone number
                'body' => $message
            ]
        );
        echo json_encode(["status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
}
?>
