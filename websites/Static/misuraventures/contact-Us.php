<?php

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['SERVER_NAME'] =="learn.supporthives.com"){
    $img_path = "https://learn.supporthives.com/mosanalimited/";
} else {
    $img_path = $_SERVER['SERVER_NAME'];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $company_name = $_POST["company_name"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];
    $Admin_email = "vishal@supporthives.com";
    
    
    $mail = new PHPMailer(true);
    $mail->SMTPDebug = 0; 
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'narayan.d.zade@gmail.com';
    $mail->Password = 'ksicwmnarhdsegsz';
    $mail->SMTPSecure = 'tls';  // or 'ssl' for SSL encryption
    $mail->Port = 587;  // or 465 for SSL
    $mail->setFrom("info@misuraventures.com", 'Misura Ventures Limited');
    $mail->addAddress($email, $firstname);
    //$mail->addAddress($Admin_email, "Misura Ventures Limited");
    $mail->AddCC($Admin_email);
    // $mail->addAddress("narayan.z@supporthives.com", "Narayan");
    $mail->Subject = "Contact Form Submission Confirmation";
    $mail->isHTML(true);
    $mail->Body = '
    
    <!DOCTYPE html>
    <html>
    <head>
        <title>Your Email Title</title>
    </head>
    <body>
        <table width="100%" cellspacing="0" cellpadding="0" border="0">
            <tr>
                <td align="center" bgcolor="#f2f2f2" style="padding: 20px 0;">
                    <table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" style="border-collapse: collapse; box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);">
                        <!-- Header -->
                        <tr>
                            <td style="padding: 0px; height: 60px;text-align:center;">
                                <img src="'.$img_path.'/images/hlogo.png" alt="">
                              </td>
                        </tr>
                        <!-- Content -->
                        <tr style="background: url('.$img_path.'/images/Body.png);background-repeat:no-repeat;">
                            <td style="padding: 20px;">
                                <h1 style="font-size: 30px; font-weight: 700; text-align: center;font-family: Arial;">Contact Form Confirmation</p>
                                <p style="font-size: 16px; font-weight: 400px; color: #656565; text-align: center;font-family: Arial;line-height: 158%;">Dear '.$firstname.',<br><br>
                                    This email is to confirm your submission of the contact form.<br>Please allow for 2-3 days for us to respond.<br>In the meantime, why not browse our services.</p>
                                    <table width="100%" cellspacing="0" cellpadding="0" border="1" style="border-collapse: collapse;margin-top:24px;">
                                        <a href="'.$img_path.'/services.php" style="padding: 16px 40px;text-decoration:none;border: 1px solid #201F1D;justify-content: center;align-items: center;color: #201F1D;font-size: 12px;font-weight: 700;text-transform: capitalize;">Explore our services</a>
                                      </table>
                            </td>
                        </tr>
                        <!-----------Footer----------->
                        <tr>
                            <td>
                                <table width="100%" cellspacing="0" cellpadding="" border="0px" style="margin:0px;">                         
                                    <tr style=" background:url('.$img_path.'/images/fbg.png);background-repeat:no-repeat;">
                                        <td style="width:300px;padding-left:40px;text-align:left;padding-top:48px;padding-bottom:48px;"><img src="'.$img_path.'/images/flogo.png" alt=""></td>
                                        <th style="font-size: 16px; font-weight: 400; color: #FFFFFF; text-align:right;padding-right:40px;font-family: Arial;text-transform: capitalize;padding-top:48px;padding-bottom:48px;">
                                            info@misuraventures.com
                                            <p style="color: #9B9B9B;">Misura Ventures LIMITED<br>
                                                7 Patroklou Kokkinou<br>
                                                Flat/Office 21,Strovolos,<br>
                                                2000, Nicosia, Cyprus
                                            </p>
                                        </th>
                                            
                                    </tr>
                                    
                                </table>
                            </td>
                        </tr>
                        <!-- Footer -->
                        
                    </table>
                </td>
            </tr>
        </table>
    </body>
    </html>
    ';
    
        if ($mail->send()) {
            echo '
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script type="text/javascript">
                      $(document).ready(function(){
                          $("#modal-successfully").modal("show");
                      });
                  </script>';
        } else {
            echo '
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
            <script type="text/javascript">
                      $(document).ready(function(){
                          $("#modal-wrong").modal("show");
                      });
                  </script>';
            
        }
        
        
        // Admin Email
        
        $admin_send_mail = new PHPMailer(true);
        $admin_send_mail->SMTPDebug = 0; 
        $admin_send_mail->isSMTP();
        $admin_send_mail->Host = 'smtp.gmail.com';
        $admin_send_mail->SMTPAuth = true;
        $admin_send_mail->Username = 'narayan.d.zade@gmail.com';
        $admin_send_mail->Password = 'ksicwmnarhdsegsz';
        $admin_send_mail->SMTPSecure = 'tls';  // or 'ssl' for SSL encryption
        $admin_send_mail->Port = 587;  // or 465 for SSL
        $admin_send_mail->setFrom("info@misuraventures.com", 'Misura Ventures Limited');
        $admin_send_mail->addAddress($Admin_email, $firstname);
        //$admin_send_mail->addAddress($Admin_email, "Misura Ventures Limited");
        $admin_send_mail->AddCC($Admin_email);
        // $admin_send_mail->addAddress("narayan.z@supporthives.com", "Narayan");
        $admin_send_mail->Subject = "Contact Form Submission Details";
        $admin_send_mail->isHTML(true);
        $admin_send_mail->Body = '
        
        <!DOCTYPE html>
        <html>
        <head>
            <title>Your Email Title</title>
        </head>
        <body>
            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                <tr>
                    <td align="center" bgcolor="#f2f2f2" style="padding: 20px 0;">
                        <table width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#ffffff" style="border-collapse: collapse; box-shadow: 0px 3px 6px rgba(0, 0, 0, 0.1);">
                            <!-- Header -->
                            <tr>
                                <td style="padding: 0px; height: 60px;text-align:center;">
                                    <img src="'.$img_path.'/images/hlogo.png" alt="">
                                  </td>
                            </tr>
                            <!-- Content -->
                            <tr style="background: url('.$img_path.'/images/Body.png);background-repeat:no-repeat;">
                                <td style="padding: 20px;">
                                    <h1 style="font-size: 30px; font-weight: 700; text-align: center;font-family: Arial;">Contact Form Confirmation</h1>
                                    <p style="font-size: 16px; font-weight: 400px; color: #656565; text-align: center;font-family: Arial;line-height: 158%;">
                                        Dear '.$firstname.',<br><br>
                                        First Name = '.$firstname.'<br>
                                        Last Name = '.$lastname.'<br>
                                        Phone = '.$phone .'<br>
                                        Email = '.$email .'<br>
                                        Company Name = '.$company_name.'<br>
                                        Subject = '.$subject .'<br>
                                        Message = '.$message.'
                                    </p>
                                        
                                </td>
                            </tr>
                            <!-----------Footer----------->
                            <tr>
                                <td>
                                    <table width="100%" cellspacing="0" cellpadding="" border="0px" style="margin:0px;">                         
                                        <tr style=" background:url('.$img_path.'/images/fbg.png);background-repeat:no-repeat;">
                                            <td style="width:300px;padding-left:40px;text-align:left;padding-top:48px;padding-bottom:48px;"><img src="'.$img_path.'/images/flogo.png" alt=""></td>
                                            <th style="font-size: 16px; font-weight: 400; color: #FFFFFF; text-align:right;padding-right:40px;font-family: Arial;text-transform: capitalize;padding-top:48px;padding-bottom:48px;">
                                                info@misuraventures.com
                                                <p style="color: #9B9B9B;">Misura Ventures LIMITED<br>
                                                    7 Patroklou Kokkinou<br>
                                                    Flat/Office 21,Strovolos,<br>
                                                    2000, Nicosia, Cyprus
                                                </p>
                                            </th>
                                                
                                        </tr>
                                        
                                    </table>
                                </td>
                            </tr>
                            <!-- Footer -->
                            
                        </table>
                    </td>
                </tr>
            </table>
        </body>
        </html>
    
        ';
        
            if ($admin_send_mail->send()) {
                //var_dump("Admin sent");
            } else {
                //var_dump("Admin fail");
            }
        
    }
?>


































<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Misura Ventures Limited</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="icon" type="image/x-icon" href="images/fav.svg">
</head>

<body>
    <Header>
        <div class="desktop-nav d-none d-sm-none d-md-none d-lg-block">
            <div class="container mosanaLimited-container g-0">
                <div class="row align-items-center">
                    <div class="col-4">
                        <a href="index.php">
                            <img src="images/logo.svg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="col-8">
                        <div class="text-end">
                            <a data-bs-toggle="collapse" href="#desktop-nav-btn" role="button" aria-expanded="false"
                                aria-controls="collapseExample"
                                class="nav-open-btn d-flex align-items-center justify-content-end">
                                Menu <img src="images/hamburger.svg" class="img-fluid ms-3" alt="">
                            </a>
                        </div>
                        <div class="collapse" id="desktop-nav-btn">
                            <nav>
                                <a href="our-story.php">Our Story</a>
                                <a href="services.php" >Services</a>
                                <a href="contact-Us.php" class="active">Contact Us</a>
                                
                                <a data-bs-toggle="collapse" href="#desktop-nav-btn" role="button" aria-expanded="false"
                                    aria-controls="collapseExample"
                                    class="nav-close-btn d-flex align-items-center justify-content-end">CLOSE <img
                                        src="images/cross-icon.svg" class="img-fluid ms-3" alt=""></a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-nav d-block d-sm-block d-md-block d-lg-none">
            <div class="container g-5">
                <div class="row g-5 align-items-center">
                    <div class="col-8">
                        <a href="index.php">
                            <img src="images/mb-logo.svg" class="img-fluid" alt="">
                        </a>
                    </div>
                    <div class="col-4">
                        <a data-bs-toggle="modal" data-bs-target="#mobile-btn"
                            class="mb-nav-btn d-flex align-items-center justify-content-end">
                            Menu <img src="images/hamburger.svg" class="img-fluid ms-3" alt="">
                        </a>

                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="mobile-btn" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-fullscreen">
                    <div class="modal-content">
                        <div class="modal-header">
                            <div class="container g-5">
                                <div class="row align-items-center">
                                    <div class="col-8">
                                        <a href="index.php">
                                            <img src="images/mb-logo.svg" class="img-fluid" alt="">
                                        </a>
                                    </div>
                                    <div class="col-4">
                                        <a data-bs-toggle="modal" data-bs-target="#mobile-btn"
                                            class="mb-nav-btn d-flex align-items-center justify-content-end">
                                            CLOSE <img src="images/cross-icon.svg" class="img-fluid ms-3" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-body">
                            <nav>
                                <a href="our-story.php">Our Story</a>
                                <a href="services.php">Services</a>
                                <a href="contact-Us.php" class="active">Contact us</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- mobile modal -->

    </Header>

    <section class="term-condition-top-sec">
        <div class="d-none d-sm-none d-md-none d-lg-block">
            <img src="images/contact-line.png" class="img-fluid w-100" alt="">
        </div>
        <div class="d-block d-sm-block d-md-block d-lg-none">
            <img src="images/contact-line-sm.png" class="img-fluid w-100" alt="">
        </div>
        <div class="term-condition-content">
            <h6>contact us</h6>
            <h5>We’re here to assist</h5>
        </div>
    </section>
    <section class="contact-sec">
    
        <div class="contact-sec-wrap">
          <div class="container g-0 mosanaLimited-container">
            <div class="contact-flex">
              <div class="contact-bottom-content">
                <div class="contact-content-details-sec">
                  <h6>Contact Details</h6>
                  <address>Misura Ventures Limited<br>  KokkinouFlat/Office 21,Strovolos, <br> 2000, Nicosia, Cyprus</address>
                  <a href="mailto:info@misuraventures.com" class="mailto">info@misuraventures.com</a> <br>
                  <a href="tel:+357 22 009547">+357 22 009547</a>
                </div>
                <div class="d-none d-sm-none d-md-none d-lg-block">
                  <img src="images/contact-main-img.png" class="img-fluid" alt="">
                </div>
                <div class="d-block d-sm-block d-md-block d-lg-none">
                  <img src="images/contact-main-img-sm.png" class="img-fluid" alt="">
                </div>
              </div>
              <div class="contact-form-wrap">
                <h6>Let’s connect</h6>
                <form enctype="multipart/form-data" class="common-form" method="post" id="contact_form" onsubmit="return check_agree(this);">
                  <div class="form-flex">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="First Name" name="firstname" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Last Name" name="lastname" required>
                  </div>
                  <div class="form-group">
                    <input type="email" class="form-control" placeholder="Email Address" name="email" required>
                  </div>
                  <div class="form-group">
                    <input type="number" class="form-control" placeholder="Phone Number" name="phone" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Company Name" name="company_name" required>
                  </div>
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Subject" name="subject" required>
                  </div>
                  <textarea placeholder="Additional Information" class="form-control" name="message" required></textarea>   
                  </div>
                  <div class="container g-0 checkbox-wrap">
                    <div class="row g-0 align-items-center">
                      <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" name="terms">
                          <label class="form-check-label" for="flexCheckDefault">
                            I Agree To The <a href="terms-Conditions.php">Terms & Conditions</a> & <a href="privacy-Policy.php">Privacy Policy.</a>
                          </label>
                        </div>
                      </div>
                      <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-start text-lg-end">
                        
                        <!--site key = 6Lfs7BopAAAAACgykyn6IRNAyY7n8JHWEn0KkoU- -->
                        <!--secret key = 6Lfs7BopAAAAAK14KXawI3qQvyC0Vl4hjeD85A84 -->
                        
                        <script src='https://www.google.com/recaptcha/api.js' async defer></script>
                        <div id="recaptcha" class="g-recaptcha" data-sitekey="6Lfs7BopAAAAACgykyn6IRNAyY7n8JHWEn0KkoU-"></div>

                        
                      </div>
                    </div>
    
                  </div>
                  <div class="secondary-btn text-center">
                    <button class="common-btn" type="submit"><span>Submit Your Message</span></button>
                  </div>
                </form>
              </div>
            </div>
    
          </div>
        </div>
      </section>

      
<!-- Modal -->
<div class="modal fade common-modal" id="modal-successfully" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-success-sec">
            <img src="images/successfully-icon.svg" class="img-fluid" alt="">
            <h6>your message has been <br>
                successfully submitted</h6>
                <p>Your message has been successfully submitted. We appreciate
                    your inquiry and will be in touch shortly. Thank you for contacting us.</p>
            <div class="secondary-btn">
                <a href="#" class="common-btn"  data-bs-dismiss="modal"><span>Close</span></a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade common-modal" id="modal-wrong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-success-sec">
            <img src="images/wrong-icon.svg" class="img-fluid" alt="">
            <h6>Something went wrong</h6>
                <p> We apologise, but there was an error processing your message. Please try again later or contact us through alternative means. Thank you for your understanding.</p>
            <div class="secondary-btn">
                <a href="#" class="common-btn"  data-bs-dismiss="modal"><span>Close</span></a>
            </div>
        </div>
      </div>
    </div>
  </div>
    <footer>
        <div class="container mosanaLimited-container g-5 g-lg-0">
            <div class="row g-0 footer-top-sec">
                <div class="col-12 col-sm-12 col-md-12 col-lg-7">
                    <div class="contact-detials-sec">
                        <h4>Contact Details</h4>
                        <div class="row g-0 g-md-3">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <address>Misura Ventures Limited 7 Patroklou <br>
                                    KokkinouFlat/Office 21,Strovolos, <br>
                                    2000, Nicosia, Cyprus
                                </address>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                                <a href="#">Company No. HE 392453</a> <br>
                                <a href="mailto:info@misuraventures.com">info@misuraventures.com</a><br>
                                <a href="tel:+357 22 009547">+357 22 009547</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-5">
                    <div class="footer-right-sec">
                        <a href="index.php">
                            <img src="images/footer-logo.svg" class="img-fluid" alt="">
                        </a>
                        <p>© 2024 Misura Ventures Limited. <br>
                            All rights reserved</p>
                    </div>

                </div>
            </div>
            <div class="footer-bottom">
                <nav>
                    <a href="our-story.php">About Us</a>
                    <a href="services.php">Services </a>
                    <a href="contact-Us.php">Contact Us</a>
                </nav>
                <nav>
                    <a href="cookie-Policy.php">Cookies Policy </a>
                    <a href="privacy-Policy.php">Privacy Policy</a>
                    <a href="terms-Conditions.php">Terms And Conditions</a>
                </nav>
            </div>
        </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script>

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <script>
        function check_agree(form) {
            var response = grecaptcha.getResponse();
           
            if (form.terms.checked && response) {
                return true;
            
            } else if (!form.terms.checked) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please accept terms and conditions'
                })
            } else if (response.length == 0) {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Please select Captcha'
                })
                return false;
            }
            return false;
        }
    </script>

</body>

</html>