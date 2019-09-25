<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
     
     
      
        
             
        
         
  

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-md-3">
                     
                      <section class="panel">
                          <header class="panel-heading">
                              Sponsored
                          </header>
                          <div class="panel-body">
                              </div>
                      </section>
                     
                  </div>
                  <div class="col-md-9">
                      <section class="panel">
                          <div class="panel-body">
                              
                             Main Advertisement Banner

                             
                          </div>
                      </section>

                      <div class="row product-list">
					   <?php foreach ($quiz_lists as $quiz_list) {?>
					   <form action="<?php echo base_url(); ?>quiz/quiz_detail" method="post" >
					   <input type="hidden" name="qz_id" value="<?= $quiz_list->qz_id; ?>">
                          <div class="col-md-4">
                              <section class="panel">
                                  <div class="pro-img-box">
                                      <img src="<?php echo base_url(); ?>img/<?= $quiz_list->qz_into_image; ?>" alt=""/>
                                      <button class="adtocart">
                                          <i class="fa fa-shopping-cart"></i>
                                      </button>
                                  </div>

                                  <div class="panel-body text-center">
                                      <h4>
                                          
                                              <?= $quiz_list->qz_name; ?>
                                         
                                      </h4>
                                      
                                      <p class="price">Rs. <?= $quiz_list->qz_price; ?></p>
                                  </div>
                              </section>
                          </div>
						  </form>
                          <?php }?>
                      </div>
                  </div>
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->

     
	
              
            


<?php  $this->load->view('tpl/footer'); ?>
     <?php  $this->load->view('tpl/js/main_js'); ?>
     <?php  $this->load->view('tpl/js/check_swich_js'); ?>
     <script src="<?php echo base_url();?>template/nanatharana/js/form-component.js"></script>
  <script src="<?php echo base_url();?>template/nanatharana/js/jquery.stepy.js"></script>
   <script src="<?php echo base_url();?>template/nanatharana/js/advanced-form-components.js"></script>
     <script type="text/javascript">

          $(document).ready(function() {

              $(function(){
                  $('select').customSelect();
              });
          });


      </script>    
  </body>
</html>