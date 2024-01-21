<?php
    include("header.php");
?>

    <!-- error -->
    <div class="error-sec">
        <div class="d-none d-sm-none d-md-none d-lg-block">
            <video loop autoplay muted class="w-100">
                <source src="images/error-video.mp4" type="video/mp4">
           </video>
        </div>
        <div class="d-block d-sm-block d-md-block d-lg-none">
            <video loop autoplay muted class="w-100">
                <source src="images/error-video-sm.mp4" type="video/mp4">
           </video>
        </div>
        <div class="container  g-0">
            <div class="error-container">
                <div class="error-content">
                    <h1>500</h1>
                    <h2>Page not Found</h2>
                    <p>The page you have requested could not be found. 
                        Don’t worry and return back to the homepage.</p>
                    <a href="index" class="primary-btn">Return Home</a>
                </div>
            </div>
           
        </div>
    </div>
    <!-- error end -->
    
  <!--Footer-->
  <?php
    include("footer.php");
  ?>
 
</body>

</html>