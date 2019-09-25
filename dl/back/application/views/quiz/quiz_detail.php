<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
     
     
      
        
             
        
         
  

     <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <div class="col-md-3 hidden-phone">
                     
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
					  <form action="<?php echo base_url(); ?>cart/addItems" method ="post" >
                          <div class="panel-body">
                              <div class="col-md-6">
                                  <div class="pro-img-details">
                                      <img src="<?php echo base_url(); ?>img/<?= $quiz_details[0]->qz_into_image; ?>" alt=""/>
                                  </div>
                                 
                              </div>
                              <div class="col-md-6">
                                  <h4 class="pro-d-title">
                                      
                                          <?= $quiz_details[0]->qz_name; ?>
                                      
                                  </h4>
                                  <p>
                                      <?= $quiz_details[0]->qz_information; ?>
                                  </p>
                                
                                  <div class="m-bot15"> <strong>Price : </strong>   <span class="pro-price">Rs. <?= $quiz_details[0]->qz_price; ?></span></div>
                                  <input type="hidden" name="qty" value="1">
								   <input type="hidden" name="qz_id" value="<?= $quiz_details[0]->qz_id; ?>">
                                  <p>
                                      <button class="btn btn-round btn-danger" type="submit">Enroll</button>
                                  </p>
                              </div>
                          </div>
						  </form>
                      </section>

                      <section class="panel">
                          <header class="panel-heading tab-bg-dark-navy-blue">
                              <ul class="nav nav-tabs ">
                                  
                                  <li class="active">
                                      <a data-toggle="tab" href="#description">
                                          Description
                                      </a>
                                  </li>
								  <li >
                                      <a data-toggle="tab" href="#reviews">
                                          Reviews
                                      </a>
                                  </li>

                              </ul>
                          </header>
                          <div class="panel-body">
                              <div class="tab-content tasi-tab">
                                  <div id="description" class="tab-pane active">
                                     
                                      <p><?= $quiz_details[0]->qz_long_text; ?></p>
                                  </div>
								  
								  
                                  <div id="reviews" class="tab-pane"">
                                     
                                     
                                     
                                  </div>
                              </div>
                          </div>
                      </section>

               
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
