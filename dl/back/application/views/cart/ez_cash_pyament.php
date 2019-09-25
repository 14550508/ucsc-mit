<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
          <section class="wrapper site-min-height">
              
              <!-- page start-->
            <div class="row">
			    <div class="col-lg-2"></div>
                <div class="col-lg-8">
				  
                    <section class="panel">
					  
                        <header class="panel-heading">
                            <h3> eZcash Payment</h3>
                        </header>
						 
						  
						 
						  
						   <?php $invoices[0]->inv_no; ?><br/>
						   <?php  $inv_sum; ?>
								<div class="panel-body">
									<div class="form-group">
                                     <label class="col-lg-3 control-label">Enter your mobile number:</label>
                                        <div class="col-lg-8">
											<small> &nbsp;&nbsp; 077xxxxxxx, &nbsp; 076xxxxxxx, &nbsp; 071xxxxxxx </small>
											<input type="text" name="m_phone" value="" class="form-control" ><br/>
											<a class="btn btn-danger purchase-btn col-lg-12" type="submit" > Get Code</a>
									    </div>
									</div>
										<div class="col-lg-3"> &nbsp; </div>
										<div class="col-lg-3"> 	</div>
								</div>  
						  
						  
						    <div class="panel-body">
								  
								<form action="<?php echo base_url(); ?>cart/ez_cash_prossece" method="post">						 
								  
								   
										<div class="form-group">
											<label class="col-lg-3 control-label">Enter authorize code:</label>
											<div class="col-lg-8">
											<input type="text" name="a_code" value="" class="form-control" ><br/>
											<button class="btn  btn-info purchase-btn col-lg-12" type="submit" > Process </button>
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
