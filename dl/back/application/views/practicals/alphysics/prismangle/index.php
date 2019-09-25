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
                              <h3> To determine the angle of the given prism</h3>
                          </header>
                          <div class="panel-body">
                               <aside class="profile-nav col-lg-2">
                      
                  </aside>
                  <aside class="profile-nav col-lg-8">
                     

<img src="<?php echo base_url(); ?>img/phypracticals/prism1.png" width="100%"/> 

 <div class="btn-group btn-group-justified">
                                    <div class="col-lg-4">&nbsp;</div>
                                    <div class="col-lg-8">
                                        
                                 <a class="btn btn-success" href="<?php echo base_url();?>practicals/selectprismangle">Start</a>
                                  <a class="btn btn-info" href="<?php echo base_url();?>teachers/profile">Introduction</a>
                                   
                                    </div>
                                  
                              </div>
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
