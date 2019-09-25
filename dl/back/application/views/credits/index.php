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
                             <h3> My Credits History </h3>
                          </header>
						  </section>
						  <section class="panel" id="no-more-tables">
						   <header class="panel-heading">
						   <h4> Top Up Credits </h4>
						    </header>
                           <div id="response"> </div>     
						   <?php if($cd_rows > 0){ ?>
						 
                           <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                              <tr>
							 <th > Add Date </th>
                              <th>Credit</th>
								<th > Method </th>
								
								<th > Exp Date </th>
								
                                  
                              </tr>
                              </thead>
                              <tbody>
							  <?php 
							  $final_total = 0;
							  foreach ($credits as $credit){ ?>
                              <tr class="item-row">
							   <td data-title="Total"> <span class="label label-success label-mini"><?= $credit->add_date; ?></span></td>
							  <td data-title="Inv #"><a href="#"><?= $credit->credit; ?></a></td>
                                  <td data-title="Name"><a href="#"><?= $credit->reason; ?></a></td>
                                  
                                 
                                 
								  
								  
								   <td data-title="Type"><span class="label label-info label-mini"><?= $credit->exp_date; ?></span></td>
								  
                               
                              </tr>
                              <?php 
							 
							  } ?>
							  
							 
							   
                              </tbody>
                          </table><br/>
						  
						    <div class="panel-body">
						 <a href="<?php echo base_url(); ?>invoices/top_up" class="button-next  btn btn-info col-lg-3"  > Top Up</a> 
						 </div>
						  
						 
                      </section>
                 
            
              <!-- page end-->
			  <?php } else { ?>
						 <div class="panel-body">
						 <h4>No credits found! </h4>
						  <a href="<?php echo base_url(); ?>quiz" class="button-next  btn btn-info col-lg-3"  > Back</a>
						 </div>
						 
						 <?php } ?>
						 
						 
				<?php // user points ?>


						 <section class="panel" id="no-more-tables">
						   <header class="panel-heading">
						   <h4> Used Credits </h4>
						    </header>
                           <div id="response"> </div>     
						   <?php if($ucd_rows > 0){ ?>
						 
                           <table class="table table-bordered table-striped table-condensed cf">
                                      <thead class="cf">
                              <tr>
							 <th > Used Date </th>
							 <th > Transaction # </th>
                              <th>Credit</th>
								<th > Type </th>
								
								
								
                                  
                              </tr>
                              </thead>
                              <tbody>
							  <?php 
							  $final_total = 0;
							  foreach ($ucredits as $ucredit){ ?>
                              <tr class="item-row">
							   <td data-title="Total"> <span class="label label-success label-mini"><?= $ucredit->date; ?></span></td>
							  <td data-title="Inv #"><a href="#"><?= $ucredit->inv_id; ?></a></td>
                                  <td data-title="Name"><a href="#"><?= $ucredit->amount; ?></a></td>
                                  
                                 
                                 
								  
								  
								   <td data-title="Type"><span class="label label-info label-mini"><?= $ucredit->type; ?></span></td>
								  
                               
                              </tr>
                              <?php 
							 
							  } ?>
							  
							 
							   
                              </tbody>
                          </table>
						  <br/>
						  
						   
						 
						 
                      </section>
                  
              <!-- page end-->
			  <?php } else { ?>
						 <div class="panel-body">
						 <h4>No credits found! </h4>
						  <a href="<?php echo base_url(); ?>students" class="button-next  btn btn-info col-lg-3"  > Back</a>
						 </div>
						 
						 <?php } ?>
						 <div class="panel-body">
						
						  <a href="<?php echo base_url(); ?>students" class="button-next  btn btn-success  col-lg-3"  > Back to Home</a>
						 </div>
			 </div>				
							 </div>				
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
 if(confirm("Sure you want to delete this item credit ?"))
		  {

 $.ajax({
   type: "GET",
   url: "<?php echo base_url(); ?>credits/delete_credit",
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
