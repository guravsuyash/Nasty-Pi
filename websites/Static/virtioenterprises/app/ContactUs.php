<?php include("header.php"); ?>
  <!-- contant start -->
  <div class="contant-top-sec">
    <div class="d-none d-sm-none d-md-none d-lg-block">
      <img src="images/contant-top-img.png" class="img-fluid w-100" alt="">
    </div>
    <div class="d-block d-sm-block d-md-block d-lg-none">
      <img src="images/contant-top-img-sm.png" class="img-fluid w-100" alt="">
    </div>
    <div class="contact-top-content">
      <h1>contact us</h1>
      <p>Connect with Virtioent Erprises to transform possibilities into realities. Our dedicated team awaits to understand your
        needs and guide you toward business excellence. Reach out today.</p>
    </div>
  </div>
  <div class="contact-details-sec">
    <div class="container g-0">
      <div class="contact-details-wrap">
        <div class="contact-details-items">
          <div class="contact-details-items-wrap">
            <div class="d-none d-sm-none d-md-none d-lg-block">
              <img src="images/email-address-icon.png" class="img-fluid top-img" alt="">
            </div>
            <div class="d-block d-sm-block d-md-block d-lg-none">
              <img src="images/email-address-icon-sm.svg" class="img-fluid top-img" alt="">
            </div>
            <h6>Email Address</h6>
            <img src="images/line-contact.svg" class="img-fluid" alt="">
            <a href="#">info@virtioenterprises.com</a>
          </div>
          <div class="contact-details-items-wrap">
            <div class="d-none d-sm-none d-md-none d-lg-block">
              <img src="images/corp-icon.svg" class="img-fluid top-img" alt="">
            </div>
            <div class="d-block d-sm-block d-md-block d-lg-none">
              <img src="images/corp-icon-sm.svg" class="img-fluid top-img" alt="">
            </div>
            <h6>Corp Address</h6>
            <img src="images/line-contact.svg" class="img-fluid" alt="">
            <a href="#">Plataion 43, Domopoli 27, 1st floor, Office 101, Strovolos, 2027, Nicosia, Cyrpus.</a>
          </div>
          <div class="contact-details-items-wrap">
            <div class="d-none d-sm-none d-md-none d-lg-block">
              <img src="images/phone-icon.svg" class="img-fluid top-img" alt="">
            </div>
            <div class="d-block d-sm-block d-md-block d-lg-none">
              <img src="images/phone-icon-sm.svg" class="img-fluid top-img" alt="">
            </div>
          
            <h6>Phone Number</h6>
            <img src="images/line-contact.svg" class="img-fluid" alt="">
            <a href="#">+357 22 030595</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="contact-form-wrap">
    <div class="container g-0">
      <div class="contact-main-form">
          <h3>fill out the form</h3>
          <form action="send_email.php" method="post" class="common-form">
            <div class="form-flex">
                <div class="form-group">
                    <input type="text" name="full_name" placeholder="Full Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="Email Address" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone_number" placeholder="Phone Number" class="form-control" required>
                </div>
                <div class="form-group">
                    <input type="text" name="company_name" placeholder="Company Name" class="form-control" required>
                </div>
                <div class="form-group">
                    <textarea name="additional_information" class="form-control" placeholder="Additional Information" required></textarea>
                </div>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="agree_terms" name="agree_terms" >
                <label class="form-check-label" for="agree_terms">
                    By checking this box you agree with the <a href="#">Terms and Conditions</a> and <a href="#">Privacy Policy</a>
                </label>
            </div>
            <div class="btn-wrap">
                <script src="https://js.hcaptcha.com/1/api.js" async defer></script>
                <div class="h-captcha" data-sitekey="0196bf4f-926d-43bf-952e-a33af3990bb3"></div>
                <button type="submit" class="primary-btn">Submit your message</button>
            </div>
            <div class="want-wrap">
                <p>Want to contact us directly? Email us at <a href="#">info@virtioenterprises.com</a></p>
            </div>
        </form>
      </div>
    </div>
  </div>

  <!-- message-submitted -->
  
<!-- Modal -->
<div class="modal fade contact-popups" id="message-submitted" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <img src="images/check-img.svg" class="img-fluid" alt="">
        <h5>Message submitted!</h5>
        <p>Great news! Your message has been successfully sent. We're excited to connect with you and will be in touch very soon.</p>
        <a class="primary-btn" data-bs-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>
<div class="modal fade contact-popups" id="error-Occurred" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-body">
        <img src="images/error-img.svg" class="img-fluid" alt="">
        <h5>An Error !</h5>
        <p>Apologies; an unexpected error occurred. Retry later or reach us through alternative means. Thank you for your understanding.</p>
        <a class="primary-btn" data-bs-dismiss="modal">Close</a>
      </div>
    </div>
  </div>
</div>

  <?php
    include("footer.php");
  ?>


<script>
 $(document).ready(function() {
      
    $(".common-form").submit(function(event) {
        event.preventDefault();

        if (!$('#agree_terms').prop('checked')) {
            Toastify({
                text: "Please agree to the Terms and Conditions before submitting.",
                duration: 3000,
                gravity: "top",
                backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)"
            }).showToast();

            $('.form-check-input').css('border-color', 'red');
            setTimeout(function() {
                $('.form-check-input').css('border-color', 'none');
            }, 2000);
        } else {
            $('.form-check-input').css('border-color', '');

            $.ajax({
                type: "POST",
                url: "send_email.php",
                data: $(this).serialize(),
                beforeSend: function() {
                    Swal.fire({
                        title: "Please Wait...",
                        imageUrl: "https://www.boasnotas.com/img/loading2.gif",
                        imageWidth: 100,
                        imageHeight: 100,
                        showConfirmButton: false,
                        closeOnClickOutside: false,
                        allowOutsideClick: false
                    });
                },
                success: function(response) {
                    Swal.close();
                    if (response == 1) {
                        $('#message-submitted').modal('show');
                       Toastify({
                            text: "Please Wait.....",
                            gravity: "top", // Position at the bottom
                            position: "center", // Centered horizontally
                            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)"
                        }).showToast();
                        setTimeout(function() {
                           window.location.href = 'Contact-Success'; 
                        }, 1000);
                    } else if (response == 5) {
                        Toastify({
                            text: "Please complete the Captcha verification.",
                            duration: 3000,
                            gravity: "top",
                            backgroundColor: "linear-gradient(to right, #ff5f6d, #ffc371)"
                        }).showToast();

                        $('.h-captcha').css('border', '1px solid red');
                        setTimeout(function() {
                            $('.h-captcha').css('border', 'none');
                        }, 2000);
                    } else {
                        $('#error-Occurred').modal('show');
                    }
                },
                error: function() {
                    Swal.close();
                    $('#error-Occurred').modal('show');
                },
                complete: function() {
                    Swal.close();
                    setTimeout(function() {
                        $('#message-submitted').modal('hide');
                        $('#error-Occurred').modal('hide');
                    }, 5000);
                }
            });
        }
    });
});

</script>



</body>

</html>