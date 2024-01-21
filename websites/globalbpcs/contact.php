<!DOCTYPE html>
<html lang="en">
<head>
  <title>Global BPCS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/3.5.1/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="css/mob.css" />
  <script src="https://use.fontawesome.com/4dfd7a977f.js"></script>
<!-- Start Alexa Certify Javascript -->

<script type="text/javascript">

_atrk_opts = { atrk_acct:"3ljbv1FYxz20cv", domain:"globalbpcs.com",dynamic: true};

(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://certify-js.alexametrics.com/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();

</script>

<noscript><img src="https://certify.alexametrics.com/atrk.gif?account=3ljbv1FYxz20cv" style="display:none" height="1" width="1" alt="" /></noscript>

<!-- End Alexa Certify Javascript --> 
</head>
<body>

  <div class="nav">
    <div class="container">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.html">
              <img src="images/logo.png" alt="logo" class="img-responsive" />
            </a>
          </div>
          <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="index.html"> <i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
              <li><a href="about.html"> <span class="question"><i class="fa fa-question" aria-hidden="true"></i></span> About us</a></li>
              <li><a href="services.html"> <span class="question"><i class="fa fa-info" aria-hidden="true"></i></span> Services</a></li>
              <li>
                  <a href="contact.php" class="contact-btn">  
                    <span>
                      <span>
                        <i class="fa fa-paper-plane" aria-hidden="true"></i> Contact
                      </span>
                    </span>
                  </a>                
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </div>



  <main id="privacy-policy" class="main-wrapper contact">
    <div class="container">

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <h1 class="contact-mob">Contact</h1>
          <p class="f-18 m-b-20 lighblue m-t-b-30 contact-mob-text">
            If you would like to know more about the ways in which GlobalBPCS can support your SME then please get in touch using the contact form below. 

          </p>

          <table class="contact-address-table">            
            <tbody>
              <tr>
                <td> 
                  <i class="fa fa-home" aria-hidden="true"></i>
                </td>
                <td>
                  <p class="f-18 m-b-20">
                    59 Zlota street,<br>
                    office 653,<br>
                    Warsaw 00-120, Poland
                  </p>
                </td>
              </tr>          
            </tbody>
          </table>
  
        </div>
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

          
<?php 
ini_set('display_errors', 1); 
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
include('scripts/email.php');
          
          ?>

                                <!-- Error messages -->
                                <?php if(!empty($response)) {?>
                                <div class="form-group col-12 text-center">
                                <div class="alert text-center <?php echo $response['status']; ?>">
                                    <?php echo $response['message']; ?>
                                </div>
                                </div>
                                <?php }?>
                            <form name="contact-form" id="contactForm" method="post">
            <div class="row">
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="form-group">
                  <label for="fullname">Full name</label>
                <div class="bpcs-btn">
                  <input type="text" class="form-control" name="fullName" id="fullname" value=""required / />
                </div>
                </div>
              </div>
              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <div class="bpcs-btn">
                    <input type="text" class="form-control" name="phone" id="phone" value="" required //>
                  </div>
                </div>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <div class="form-group">
                  <label for="phone">Email</label>
                  <div class="bpcs-btn">
                    <input type="text" class="form-control" name="email" id="email" value="" required / />
                  </div>
                </div>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <div class="form-group">
                  <label for="phone">Message</label>
                <div class="bpcs-btn bpcs-textarea-btn">                  
                  <textarea class="form-control" rows="6" name="message" id="comment"></textarea>
                </div>
                </div>
                <div class="col-md-12">
                                        <div class="form-group">
                                            <!-- Google reCAPTCHA block -->
                                            <div class="g-recaptcha" data-recaptcha data-sitekey="6LclwbsZAAAAAOQAit9aHccOsvHrvHYqZ3kStHo_"></div>
                                          
                                          </div>
              </div>
              <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                <input type="submit" name="send" class="btn btn-default submit" value="Send Message" onclick="return verify_terms();">
                <!--<button type="submit" class="btn btn-default submit">
                  <i class="fa fa-paper-plane" aria-hidden="true"></i> 
                  Send Message
                </button>    -->            
              </div>
            </div>
          </form>

        </div>
      </div>

    </div>
  </main>

  <footer>
    <div class="container">
       <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <a href="#" class="footer-logo">
              <img src="images/footerlogo.png" alt="" class="img-responsive" />
            </a>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
              <h3 class="footer-heading">About</h3>
              <p class="footer-para">Offering support to <br /> SME's operating in the <br /> e-commerce sphere</p>
            <a href="privacy-policy.html" >Privacy Policy</a>


              <h3 class="footer-heading">Contact</h3>
              <p class="footer-para">
                <a href="mailto:info@globalpbcs.com">info@globalpbcs.com</a>
              </p>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

            <h3 class="footer-heading">Registered Address</h3>
            <p class="footer-para">
              59 Zlota street, <br>office 653, <br>Warsaw 00-120, Poland
            </p>

            <h3 class="footer-heading">Incorporation</h3>
            <p class="footer-para">
              Incorporated in Poland under <br />
              Company number : 0000810160
            </p>

          </div>
       </div> 
    </div>
    <!-- Global site tag (gtag.js) - Google Analytics -->

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-174953139-1"></script>

<script>

  window.dataLayer = window.dataLayer || [];

  function gtag(){dataLayer.push(arguments);}

  gtag('js', new Date());

  gtag('config', 'UA-174953139-1');

</script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script>
			
            function verify_terms()
            {
               if (grecaptcha.getResponse() == "")
               {
                 alert('Please fill up the captcha');
                 return false;
               }else{
                 return true;
               }
            }
      </script>
    
  </footer>
 
  
  

</body>
</html>
