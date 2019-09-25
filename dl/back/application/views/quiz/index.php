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
                              <h3>Quiz Category List</h3>
                          </header>
                          </section>
						  
						  </div>
                               
				  <?php foreach ($quiz_cats as $quiz_cat) {?>
				   <div class="col-lg-4">
				  <section class="panel">
				   <div class="panel-body">
				  <form action="<?php echo base_url(); ?>quiz/quiz_list" method="post" >
                  
                      <section class="panel">
                          <div class="user-heading round" style="background:<?=$quiz_cat->bgColor; ?>">
                              
                                  <img src="<?php echo base_url(); ?>img/<?=$quiz_cat->image; ?>" width="100%" alt="">
                               
							  
                              
                              
                         

                         <div class="nana_cat_name">
                           <strong style="color:#fff; font-size:17px;"><?= $quiz_cat->qz_cat_name; ?><strong>
							  
                         </div>    
                          
						<button class="nbtn btn-nana_cat col-lg-12 col-sm-12">Take a look</button>
                      </section>
                 
				  <input type="hidden" name="qz_cat_id" value="<?= $quiz_cat->qz_cat_id; ?>">
				  </form>
				   </div>   
				    </section>
					</div>
                  <?php } ?>
                  
            
                         
                             
              
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
