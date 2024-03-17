<?php

ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception; 

require '/home/globalbp/public_html/PHPMailer/src/Exception.php';
require '/home/globalbp/public_html/PHPMailer/src/PHPMailer.php';
require '/home/globalbp/public_html/PHPMailer/src/SMTP.php';


    if(isset($_POST["send"])) {
        $name = $_POST["fullName"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $message = $_POST["message"];
        
        // Form validation
        if(!empty($name) && !empty($email) && !empty($phone) && !empty($message)){

            // reCAPTCHA validation
            if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])) {

                // Google secret API
                $secretAPIkey = '6LclwbsZAAAAAAZLy3qxgBE4DmjbMeIoP_6CKtTn';

                // reCAPTCHA response verification
                $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secretAPIkey.'&response='.$_POST['g-recaptcha-response']);

                // Decode JSON data
                $response = json_decode($verifyResponse);
                    if($response->success){
							
                      	$host = 'mail.authsmtp.com'; 
                        $username = 'ac76141';  
                        $password= 'then:myron:brute:ho';
                        $port = '465';
                      
                        // Instantiation and passing `true` enables exceptions
                        $mail = new PHPMailer(true);

                        try {
                        
                            //Server settings
                            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
                            $mail->isSMTP();                                            // Send using SMTP
                            $mail->Host       = $host;                  // Set the SMTP server to send through
                            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                            $mail->Username   = $username;                     // SMTP username
                            $mail->Password   = $password;                               // SMTP password
                            $mail->SMTPSecure = 'ssl';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
                            $mail->Port       = $port;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

                            //Recipients
                            $mail->setFrom('business@globalbpcs.com');
                            #$mail->addAddress('business@bussolpro.com');     // Add a recipient
                              $mail->addAddress('business@globalbpcs.com');
                            //$mail->addAddress('gopal@supporthives.com');               // Name is optional
                            //$mail->addReplyTo('info@example.com', 'Information');
                            //$mail->addCC('cc@example.com');
                            //$mail->addBCC('bcc@example.com');

                            // Attachments
                            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

                            // Content
                            $mail->isHTML(true);                                  // Set email format to HTML
                            $mail->Subject = 'Contact us request from '.$name;
                            $mail->Body    = 
                                                '<table>
                                                    <tbody>
                                                        <tr>
                                                            <td>Name         :</td><td>'.$name .'</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email        :</td><td>'.$email .'</td>
                                                        </tr>
                                                        
                                                        <tr>
                                                            <td>Phone        :</td><td>'.$phone .'</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Maessage     :</td><td>'.$message .'</td>
                                                        </tr>
                                                    </tbody>
                                                </tabel>';

                            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            $mail->send();
                           //echo 'Message has been sent';
                        } catch (Exception $e) {
                            //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                       }

                        $response = array(
                            "status" => "alert-success",
                            "message" => "Your message has been sent."
                        );
                    } else {
                        $response = array(
                            "status" => "alert-danger",
                            "message" => "Robot verification failed, please try again."
                        );
                    }       
            } else{ 
                $response = array(
                    "status" => "alert-danger",
                    "message" => "Plese check on the reCAPTCHA box."
                );
            } 
        }  else{ 
            $response = array(
                "status" => "alert-danger",
                "message" => "All the fields are required."
            );
        }
    }  

?>