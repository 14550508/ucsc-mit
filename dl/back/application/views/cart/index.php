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
                             <h3> Confirm Payment </h3>
                          </header>
						  
						   <?php if($cart_rows > 0){ ?>
						  <form action="<?php echo base_url(); ?>cart/select_payment" method="post">
                          <table class="table table-striped table-advance table-hover">
                              <thead>
                              <tr>
                                  <th> Item Name</th>
                                  <th class="hidden-phone"> Discretion</th>
								   <th> Quantity</th>
                                  <th > Unit Price</th>
                                 
								 
								  <th > Total </th>
								   <th >  </th>
                                  
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
                                 <td>
                                      
                                      <a class="btn btn-danger btn-xs delbutton" id="<?= $cartItem->ct_id; ?>"><i class="fa fa-trash-o "></i></a>
                                  </td>
                              </tr>
                              <?php 
							  $final_total += $cartItem->total_amount;
							  } ?>
							  
							 
							   <tr>
                                  <td>&nbsp;</td>
                                  <td class="hidden-phone">&nbsp;</td>
                                  <td></td>
								   <td ><h4><strong>Invoice Total:</strong></h4></td>
                                  <td><h4><span class="label label-success label-large"><?= number_format($final_total,2); ?></span></h4></td>
								 
                                 <td></td>
                              </tr>
                              </tbody>
                          </table><br/>
						   <div class="panel-body">
						    <div class="col-lg-6">
						  <div class="form-group">
                                      <label class="col-lg-4 control-label">Do you have a coupon code :</label>
                                      <div class="col-lg-6">
									  <input type="text" class="form-control" autocomplete="off" value="" id="c_code" name="c_code" placeholder="Enter your coupon here">
										
									 
									  <div id="response"> </div>
                                          
                                      
									 
									  </div>
                                  </div>
						     </div>
													    
						    <div class="col-lg-6"> 
						   <button class="btn btn-danger purchase-btn col-lg-8" type="submit" > Confirm</button>
						   <a href="<?php echo base_url(); ?>quiz" class="button-next  btn btn-info"  > Enroll another one</a>
						  </div>
						   </form>
						
						 
						  
						  </div>
						  </div>
						 
                      </section>
                  </div>
              </div>
              <!-- page end-->
			  <?php } else { ?>
						 <div class="panel-body">
						 <h4>Your cart is empty! </h4>
						  <a href="<?php echo base_url(); ?>quiz" class="button-next  btn btn-info col-lg-3"  > Back</a>
						 </div>
						 
						 <?php } ?>
          </section>
      </section>


<?php  $this->load->view('tpl/footer'); ?>
     <?php  $this->load->view('tpl/js/main_js'); ?>
     <?php  $this->load->view('tpl/js/check_swich_js'); ?>
     <script src="<?php echo base_url();?>template/nanatharana/js/form-component.js"></script>
  <script src="<?php echo base_url();?>template/nanatharana/js/jquery.stepy.js"></script>
   <script src="<?php echo base_url();?>template/nanatharana/js/advanced-form-components.js"></script>
      <script>
		$(":text[name='c_code']").blur(function(){
		
			var code = $('#c_code').val();
			if(code !=""){
			
			var info = 'code=' + code;
			$('#error_empty').hide();
			$('#check').show();
			$.ajax({
		   type: "GET",
		   url: "<?php echo base_url(); ?>cart/check_code",
		   data: info,
		   dataType: "html",  
					success:function(response){
		   
               $('#check').hide();
			   $('#response').show();
			   $('#response').html(response);
			   
              
   }
 });
			
			
			
			}
			
			else {
			  $('#error_empty').show();
			 $('#response').hide();
			  $('#check').hide();
			}
		     
		});
	  
	  </script>  
	  
	   <script>
$(function() {
    
$(".delbutton").bind('click',function(){
    
    
    

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Sure you want to delete this item code?"))
		  {

 $.ajax({
   type: "GET",
   url: "<?php echo base_url(); ?>cart/delete_item",
   data: info,
   dataType: "html",  
            success:function(response){
   
               
              
   }
 });
$(this).parents('.item-row').remove();
location.reload();
 }

return false;

});

});
		 
		 
		 </script>
  </body>
</html>
