<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
          <section class="wrapper site-min-height">
              
              <!-- page start-->
            <div class="row">
			<br/>
			    <div class="col-lg-2"></div>
                <div class="col-lg-8">
				  
                    <section class="panel">
					  
                        <header class="panel-heading">
                            <h3> Authorize Code Payment Processes</h3>
                        </header>
						 
						  
						 
						  
						   <?php $invoices[0]->inv_no; ?><br/>
						   <?php  $inv_sum; ?>
								
						  
						  
						    <div class="panel-body">
								  <?php $error_m; ?>
								<form action="<?php echo base_url(); ?>cart/az_code_check" method="post">						 
								  <input type="hidden" name="inv_no" value="<?= $invoices[0]->inv_no ?>"   class="form-control" >
								   <input type="hidden" name="tAmount" value="<?= $inv_sum ?>"   class="form-control" >
								   
										<div class="form-group">
											<label class="col-lg-3 control-label">Enter authorize code:</label>
											<div class="col-lg-8">
											<input type="text" name="a_code"   class="form-control" ><br/>
											<button class="btn  btn-info purchase-btn col-lg-12" type="submit" > Continues  </button>
											</div>
										</div>
								 
								</form>
						  
						   
							</div>  
						
						 
					</section>	  	  
				</div>
					 
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
