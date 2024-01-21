<footer class="footer-home">
    <div class="container g-0">
      <div class="footer-wrap">
        <div class="footer-logo-sec">
          <div class="d-none d-sm-none d-md-none d-lg-block">
            <img src="images/footer-logo.svg" class="img-fluid" alt="">
          </div>
          <div class="d-block d-sm-block d-md-block d-lg-none">
            <img src="images/footer-logo-sm.svg" class="img-fluid" alt="">
          </div>
          <p>© 2023 Virtio Enterprises <br class="d-block d-sm-block d-md-block d-lg-none"> All rights
            reserved.<br class="d-block d-sm-block d-md-block d-lg-none">
            Company No. HE 392455. Plataion 43, Domopoli 27, 1st floor, Office 101, Strovolos, 2027, Nicosia, Cyrpus.
          </p>
        </div>
        <div class="footer-Quick-Links-sec">
          <h4>Quick Links</h4>
          <nav>
            <a href="Services">Our Services</a>
            <a href="ContactUs">Contact Us</a>
            <a href="AboutUs">About Us</a>
            <a href="Legals">Legals</a>
          </nav>
        </div>
        <div class="footer-Contact-Details-sec">
          <h4>Contact Details</h4>
          <nav>
            <a href="tel:+357 22 030595"><img src="images/phone-icon-footer.svg" class="img-fluid  " alt=""><span>+357 22
                030595</span></a>
            <a class="mb-0" href="mailto:info@virtioenterprises.com"><img src="images/mail-icon.svg"
                class="img-fluid  " alt=""><span>info@virtioenterprises.com</span></a>
          </nav>
        </div>
      </div>
    </div>
  </footer>

  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/owl.carousel.js"></script>
  <script src="js/app.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: false,
      dots: true,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 1
        },
        1000: {
          items: 1
        }
      }
    })
  </script>
  <script>
    var dropdownItem = document.querySelectorAll('.dropdown-nav-items .nav-item');
    var dropdownBtn = document.querySelectorAll('.service-option-btn .nav-link');

    dropdownItem.forEach((dropdownItemValue) => {
      dropdownItemValue.addEventListener("click", function () {
        var dropdownItemActive = document.querySelector('.dropdown-nav-items .active');
        var dropdownItemActiveData = dropdownItemActive.getAttribute('data-bs-target');
        // console.log(dropdownItemActiveData);

        dropdownBtn.forEach((dropdownBtnValue) => {
            var dropdownBtnData  = dropdownBtnValue.getAttribute('data-bs-target')
            console.log(dropdownBtnData);
            if(dropdownItemActiveData == dropdownBtnData){
              dropdownBtnValue.classList.add('active');
              // console.log(dropdownBtnValue)
            }
            else{
              dropdownBtnValue.classList.remove('active');
            }
        });

      });
    });


    // console.log(a);

  </script>