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
                              <h3> A/L Physics Practicals </h3>
                          </header>
                          <div class="panel-body">
                               <aside class="profile-nav col-lg-2">
                      
                  </aside>
                  <aside class="profile-nav col-lg-4">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="<?php echo base_url(); ?>practicals/prismangle">
                                  <img src="<?php echo base_url(); ?>img/def.png" alt="">
                              </a>
                              
                              
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="<?php echo base_url(); ?>practicals/prismangle"> <h4>To determine the angle of the given prism </h4></a></li>
                              
                          </ul>

                      </section>
                  </aside>
                  
                   <aside class="profile-nav col-lg-4">
                      <section class="panel">
                          <div class="user-heading round">
                              <a href="<?php echo base_url(); ?>practicals/electronics">
                                  <img src="<?php echo base_url(); ?>img/cmz.png" alt="">
                              </a>
                             
                              
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="<?php echo base_url(); ?>practicals/electronics"> <h4>Electronics Practicals </h4></a></li>
                              
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
