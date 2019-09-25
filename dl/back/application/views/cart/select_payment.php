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
                             <h3> Select Payment Method</h3>
                          </header>
						  <form action="<?php echo base_url(); ?>cart/do_pyament_prossece" method="post">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th> Item Name</th>
                                  <th class="hidden-phone"> Discretion</th>
								   <th> Quantity</th>
                                  <th > Unit Price (LKR)</th>
                                 
								  <th > Total  (LKR)</th>
                                  
                              </tr>
                              </thead>
                              <tbody>
							  <?php 
							  $final_total = 0;
							  foreach ($addItems as $cartItem){ ?>
                              <tr class="item-row">
                                  <td><a href="#"><?= $cartItem->qz_name; ?></a></td>
                                  <td class="hidden-phone"><?= $cartItem->qz_information; ?></td>
                                 
                                  <td ><span class="label label-info label-mini"><?= $cartItem->qty; ?></span></td>
								   <td ><?= $cartItem->unit_price; ?> </td>
								   <td > <span class="label label-info label-mini"><?= $cartItem->total_amount; ?></span></td>
                                 
                              </tr>
                              <?php 
							  $final_total += $cartItem->total_amount;
							  } ?>
							  
							 <?php 
							 
							 if($c_num_rows > 0){
								$discount = $c_codes[0]->percentage;
								
							 ?>
							 
							 <tr>
                                  <td>&nbsp;</td>
                                  <td class="hidden-phone">&nbsp;</td>
                                  <td></td>
								   <td ><h4><strong>Discount: (<?= $discount; ?>%)</strong></h4></td>
                                  <td><h4><span class="label label-danger label-large"> <?= number_format(($final_total)*($discount/100),2); ?></span></h4></td>
								 
                                 
                              </tr>
							 
							 <?php } else {$discount = 0;}?>
							 
							   <tr>
                                  <td>&nbsp;</td>
                                  <td class="hidden-phone">&nbsp;</td>
                                  <td></td>
								   <td ><h4><strong>Invoice Total (LKR):</strong></h4></td>
                                  <td><h4><span class="label label-success label-large"><?= number_format(($final_total) - (($final_total)*($discount/100)),2); ?></span></h4></td>
								 
                                 
                              </tr>
                              </tbody>
                          </table><br/>
						   <div class="panel-body">
						  <div class="form-group">
                                      <label class="col-lg-2 control-label">Select Payment Method:</label>
                                      <div class="col-lg-3">
									   <label class="col-lg-6 control-label">Authorize Code<input type="radio" class="form-control" value="AZC"   checked id="p_type" name="p_type" >
                                     </label>
                                         


									 </div>
									 
									  <div class="col-lg-3">
									   <label class="col-lg-6 control-label">My Credits<input type="radio" class="form-control" value="MCD"   checked id="p_type" name="p_type" >
                                     </label>
                                         


									 </div>
                                  </div>
						    
						    <div class="col-lg-4"> 
						   <button class="btn btn-danger purchase-btn col-lg-8" type="submit" > Pay Now</button>
						   <a href="<?php echo base_url(); ?>cart" class="button-next  btn btn-info"  > Cancel</a>
						  </div>
						  <?php 
						  $userId = $this->session->userdata('user_id');
						  $invoice_no = 'INV'.date('YmdHis').$userId;
						  ?>
						  <input type="hidden" name="invi_no" value="<?= $invoice_no; ?>" >
						  <input type="hidden" name="discount" value="<?= $discount; ?>" >
						  
						  
						   </form>
						
						 
						  
						  </div>
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
