<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
          <section class="wrapper site-min-height">
              
              <!-- page start-->
              <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3> Practicals </h3>
                          </header>
                          <div class="panel-body">
                               <aside class="profile-nav col-lg-2">
                      
                  </aside>
                  <aside class="profile-nav col-lg-4">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="<?php echo base_url(); ?>practicals/phypracticals">
                                  <img src="<?php echo base_url(); ?>img/def.png" alt="">
                              </a>
                              
                              
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="<?php echo base_url(); ?>practicals/phypracticals"> <h4>A/L Physics Practicals </h4></a></li>
                              
                          </ul>

                      </section>
                  </aside>
                  
                   <aside class="profile-nav col-lg-4">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="<?php echo base_url(); ?>practicals/chepracticals">
                                  <img src="<?php echo base_url(); ?>img/cmz.png" alt="">
                              </a>
                             
                              
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="<?php echo base_url(); ?>practicals/chepracticals"> <h4>A/L Chemistry Practicals </h4></a></li>
                              
                          </ul>

                      </section>
                  </aside>
            
                          </div>   
                              </section>
              </div>
              <!-- page end-->
          </section>
      </section>


<?php  $this->load->view('tpl/footer'); ?>
     <?php  $this->load->view('tpl/js/main_js'); ?>
     <?php  $this->load->view('tpl/js/check_swich_js'); ?>
     <script src="<?php echo base_url();?>template/nanatharana/js/form-component.js"></script>
  <script src="<?php echo base_url();?>template/nanatharana/js/jquery.stepy.js"></script>
   <script src="<?php echo base_url();?>template/nanatharana/js/advanced-form-components.js"></script>
         
  </body>
</html>
