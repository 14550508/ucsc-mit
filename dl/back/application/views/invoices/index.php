<?php  $this->load->view('tpl/head'); ?>
  <link href="<?php echo base_url();?>template/nanatharana/css/table-responsive.css" rel="stylesheet" />
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
          <section class="wrapper site-min-height">
              
              <!-- page start-->
                <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                             <h3> My Invoices </h3>
                          </header>
						  </section>
						  <section class="panel" id="no-more-tables">
                           <div id="response"> </div>     
						   <?php if($inv_rows > 0){ ?>
						 
                           <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                              <tr>
							  <th> INV #</th>
                              <th> Item Name</th>
								<th > Total </th>
								<th > Payment Type </th>
								<th > Payment Status </th>
								<th >  </th>
                                  
                              </tr>
                              </thead>
                              <tbody>
							  <?php 
							  $final_total = 0;
							  foreach ($invoices as $invoice){ ?>
                              <tr class="item-row">
							  <td data-title="Inv #"><a href="#"><?= $invoice->inv_no; ?></a></td>
                                  <td data-title="Name"><a href="#"><?= $invoice->qz_name; ?></a></td>
                                  
                                 
                                 
								  
								   <td data-title="Total"> <span class="label label-success label-mini"><?= $invoice->final_total; ?></span></td>
								   <td data-title="Type"><span class="label label-info label-mini"><?= $invoice->payment_type; ?></span></td>
								   <td data-title="Status"><?php 
									if($invoice->payment_status ==0){
									
									echo '<span class="label label-danger label-mini">Unpaid</span>';
									}else {
									
									echo '<span class="label label-success label-mini">Paid</span>';
									
									}
								    ?></td>
                                 <td data-title="Action">
                                  <?php  if($invoice->payment_status ==0){ ?>  
								  <form action="<?php echo base_url();?>invoices/pay_now" method="post">
                                      
									  <input type="hidden" name="inv_no" value="<?= $invoice->inv_no; ?>">
									  <input type="hidden" name="tAmount" value="<?= $invoice->final_total; ?>">
									  <button type="submit"  class="btn btn-success  btn-xs" >Pay Now</button>
									  <a class="btn btn-danger btn-xs delbutton" title="Delete" id="<?= $invoice->inv_no; ?>"><i class="fa fa-trash-o "></i></a>
								</form>
                                  <?php } ?>
								  </td>
                              </tr>
                              <?php 
							 
							  } ?>
							  
							 
							   
                              </tbody>
                          </table><br/>
						   
						  </div>
						 
                      </section>
                  </div>
              </div>
              <!-- page end-->
			  <?php } else { ?>
						 <div class="panel-body">
						 <h4>No invoices found! </h4>
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
 if(confirm("Sure you want to delete this item invoice ?"))
		  {

 $.ajax({
   type: "GET",
   url: "<?php echo base_url(); ?>invoices/delete_invoice",
   data: info,
   dataType: "html",  
            success:function(response){
   
            $('#response').html(response);
              
   }
 });
 
$(this).parents('.item-row').remove();

 }

return false;

});

});
		 
		 
		 </script>
  </body>
</html>
