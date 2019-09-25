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
                              <h3> Select a prism shape</h3>
                          </header>
                          <div class="panel-body">
                              
                  <aside class="profile-nav col-lg-4">
                     

<section class="panel">
<form action="findprismangle" method="post" id="selectprism">
 <div class="user-heading round">
<input type="image"  src="<?php echo base_url(); ?>img/phypracticals/prism.png"  />
 </div>
<input type="hidden" name="prism" id="prism" value="prism" />

<input type="hidden" name="l" id="prism" value="7" />
<input type="hidden" name="r" id="prism" value="79" />
</form>
 </section>


                  </aside>
                              
                               <aside class="profile-nav col-lg-4">
                     
 <section class="panel">
<form action="findprismangle" method="post" id="selectprism">
 <div class="user-heading round">
<input type="image"  src="<?php echo base_url(); ?>img/phypracticals/prism01.png"  />
 </div>
<input type="hidden" name="prism" id="prism" value="prism01" />
<input type="hidden" name="l" id="prism" value="5" />
<input type="hidden" name="r" id="prism" value="81" />
</form>
 </section>
 
                  </aside>
                              
                               <aside class="profile-nav col-lg-4">
                     

<section class="panel">
<form action="findprismangle" method="post" id="selectprism">
 <div class="user-heading round">
<input type="image"  src="<?php echo base_url(); ?>img/phypracticals/prism02.png"  />
 </div>
<input type="hidden" name="prism" id="prism" value="prism02" />
<input type="hidden" name="l" id="prism" value="10" />
<input type="hidden" name="r" id="prism" value="75" />
</form>
 </section>

 
                  </aside>
                   <div class="col-lg-8">
                                        
                                 <a class="btn btn-success" href="<?php echo base_url();?>practicals/prismangle">Back</a>
                                
                                   
                                    </div>
                  
            
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
