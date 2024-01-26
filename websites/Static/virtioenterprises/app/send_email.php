<?php
// Programmer: Narayan Zade
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = array(
        'secret' => "0x7a67FcbC37Bd8ccdcA2491107abFBE1b48D5F176",
        'response' => $_POST['h-captcha-response']
    );

    $verify = curl_init();
    curl_setopt($verify, CURLOPT_URL, "https://hcaptcha.com/siteverify");
    curl_setopt($verify, CURLOPT_POST, true);
    curl_setopt($verify, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($verify, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($verify);
    $responseData = json_decode($response);

    if (!$responseData->success) {
        echo 5;
    } else {
        
        $full_name = isset($_POST['full_name']) ? $_POST['full_name'] : 'N/A';
        $email = isset($_POST['email']) ? $_POST['email'] : 'N/A';
        $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : 'N/A';
        $company_name = isset($_POST['company_name']) ? $_POST['company_name'] : 'N/A';
        $additional_information = isset($_POST['additional_information']) ? $_POST['additional_information'] : 'N/A';
    
        // PHPMailer configuration
        $mail = new PHPMailer(true);
        try {
            
            $acknowledgment = file_get_contents('acknowledgment.php');
            $acknowledgment = str_replace('{fullname}', $full_name, $acknowledgment);
            $mail->SMTPDebug = 0;
            $mail->isSMTP(true);
            $mail->Host = '194.60.201.83';
            $mail->SMTPAuth = true;
            $mail->Username = 'support@art2cartdevs.com';
            $mail->Password = '7EYS{_MjHueS';
            $mail->SMTPSecure = false;
            $mail->SMTPAutoTLS = false;
            $mail->Port = 587;
            $mail->setFrom('narayan.z@supporthives.com', 'Narayan');
            $mail->addAddress($email, $full_name);
            $mail->addAddress('narayan.z@supporthives.com', 'Narayan');
            $mail->isHTML(true);
            $mail->Subject = "Contact Form Submission Confirmation";
            $mail->Body = $acknowledgment;
            $mail->send();
            
            $adminemail = file_get_contents('adminemail.php');
            $adminemail = str_replace('{fullname}', $full_name, $adminemail);
            $adminemail = str_replace('{email}', $email, $adminemail);
            $adminemail = str_replace('{phone}', $phone_number, $adminemail);
            $adminemail = str_replace('{company}', $company_name, $adminemail);
            $adminemail = str_replace('{message}', $additional_information, $adminemail);
            $mail->SMTPDebug = 0;
            $mail->isSMTP(true);
            $mail->Host = '194.60.201.83';
            $mail->SMTPAuth = true;
            $mail->Username = 'support@art2cartdevs.com';
            $mail->Password = '7EYS{_MjHueS';
            $mail->SMTPSecure = false;
            $mail->SMTPAutoTLS = false;
            $mail->Port = 587;
            $mail->setFrom('narayan.z@supporthives.com', 'Narayan');
            $mail->addAddress('narayan.z@supporthives.com', 'Narayan');
            $mail->isHTML(true);
            $mail->Subject = "Contact Form Submission Confirmation";
            $mail->Body = $adminemail;
            $mail->send();

            // Email sent successfully
            echo 1;
        } catch (Exception $e) {
            // Email failed to send
            echo 0;
        }
    }
} else {
    echo 0;
}
?>

