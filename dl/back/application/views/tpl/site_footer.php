<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>

 <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-3">
                   
                </div>
                <div class="col-lg-5 col-sm-5">
                    
                </div>
                <div class="col-lg-3 col-sm-3 col-lg-offset-1">
                    <h1>stay connected</h1>
                    <ul class="social-link-footer list-unstyled">
                        <li><a href="https://www.facebook.com/nanatharana" TARGET = "_blank"><i class="fa fa-facebook"></i></a></li>
                                             
                        <li><a href="http://www.linkedin.com/groups/Nanatharana-3838880" TARGET = "_blank"><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="http://www.twitter.com/#!/Nanatharana/" TARGET = "_blank"><i class="fa fa-twitter"></i></a></li>                       
                       
                    </ul>
                </div>
            </div>
			 <p>  <?php echo date('Y'); ?> © SELP (PVT) Ltd. </p>
        </div>
    </footer>
<!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>template/nanatharana/site/js/jquery.js"></script>
    <script src="<?php echo base_url();?>template/nanatharana/site/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="<?php echo base_url();?>template/nanatharana/site/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/nanatharana/site/js/hover-dropdown.js"></script>
    <script defer src="<?php echo base_url();?>template/nanatharana/site/js/jquery.flexslider.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/nanatharana/site/assets/bxslider/jquery.bxslider.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>template/nanatharana/site/js/jquery.parallax-1.1.3.js"></script>

    <script src="<?php echo base_url();?>template/nanatharana/site/js/jquery.easing.min.js"></script>
    <script src="<?php echo base_url();?>template/nanatharana/site/js/link-hover.js"></script>

    <script src="<?php echo base_url();?>template/nanatharana/site/assets/fancybox/source/jquery.fancybox.pack.js"></script>

    <script type="text/javascript" src="<?php echo base_url();?>template/nanatharana/site/assets/revolution_slider/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>template/nanatharana/site/assets/revolution_slider/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url();?>template/nanatharana/site/js/common-scripts.js"></script>

    <script src="<?php echo base_url();?>template/nanatharana/site/js/revulation-slide.js"></script>
<script>

      RevSlide.initRevolutionSlider();

      $(window).load(function() {
          $('[data-zlname = reverse-effect]').mateHover({
              position: 'y-reverse',
              overlayStyle: 'rolling',
              overlayBg: '#fff',
              overlayOpacity: 0.7,
              overlayEasing: 'easeOutCirc',
              rollingPosition: 'top',
              popupEasing: 'easeOutBack',
              popup2Easing: 'easeOutBack'
          });
      });

      $(window).load(function() {
          $('.flexslider').flexslider({
              animation: "slide",
              start: function(slider) {
                  $('body').removeClass('loading');
              }
          });
      });

      //    fancybox
      jQuery(".fancybox").fancybox();



  </script>

  </body>
</html>
