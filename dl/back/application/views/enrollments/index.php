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
                              <h3>ප්‍රශ්න පත්‍ර / Paper List </h3>
                          </header>
                          
                    </section>
				
				
                  
	<?php 
	if($enroll_rows != 0){
	
	foreach ($quiz_enrolls as $quiz_enroll)
	{?>
				  
				  <section>	
				  <form action="<?php echo base_url(); ?>enroll/confirmation" method="post" >
                 
                      <section class="panel">
                          <header class="panel-heading">
                             <h4> <?= $quiz_enroll->qz_name; ?></h4>
                             
                          </header>
                          <div class="panel-body" style="display: block;">
						  <div class="col-lg-4">
						  <img src="<?php echo base_url();?>img/<?= $quiz_enroll->qz_into_image; ?>" alt="" width="100%">
						  </div>
						   <div class="col-lg-6">
                            <?= $quiz_enroll->qz_information; ?><br/><br/>
							<strong>Enrolled Date: </strong>  <span class="badge bg-info"> <?= $quiz_enroll->enroll_date; ?></span><br/><br/>
							  <div id="countdown<?php echo $quiz_enroll->qz_id; ?>"> </div> 
							
							
							
							<script>
								// set the date we're counting down to
							var target_date<?php echo $quiz_enroll->qz_id; ?> = new Date("<?php echo $quiz_enroll->end_date;  ?>").getTime();
							 
							// variables for time units
							var days, hours, minutes, seconds;
							 
							// get tag element

							var countdown<?php echo $quiz_enroll->qz_id; ?> = document.getElementById('countdown<?php echo $quiz_enroll->qz_id; ?>');
							 
							// update the tag with id "countdown" every 1 second
								setInterval(function () {
							 
								// find the amount of "seconds" between now and target
								var current_date = new Date().getTime();
								var seconds_left = (target_date<?php echo $quiz_enroll->qz_id; ?> - current_date) / 1000;
							 
								// do some time calculations
								days = parseInt(seconds_left / 86400).toFixed(0);
								seconds_left = seconds_left % 86400;
								 
								hours = parseInt(seconds_left / 3600).toFixed(0)  ;
								seconds_left = seconds_left % 3600;
							   
								minutes = parseInt(seconds_left / 60).toFixed(0);
								seconds = parseInt(seconds_left % 60).toFixed(0);
								 
								// format countdown string + set tag value
								 countdown<?php echo $quiz_enroll->qz_id;?>.innerHTML = '<strong>End Date:</strong> <span class="badge badge-sm label-success   days<?php echo $quiz_enroll->qz_id; ?> ">' + days + ' <b>Days </b></span> <span class=" badge badge-sm label-primary hours<?php echo $quiz_enroll->qz_id; ?>">' + hours + ' </span> <b>:</b><span class=" badge badge-sm label-warning minutes<?php echo $quiz_enroll->qz_id; ?>">'
								+ minutes + ' </span> <b>: </b><span class=" badge badge-sm label-danger seconds<?php echo $quiz_enroll->qz_id; ?>">'+ seconds + ' </span>';  
							 
							}, 1000);
							</script> <br/>
							<strong>Attempts Allowed :</strong> <span class="badge bg-primary"> 
   
							<?php 

								if($quiz_enroll->attempts_allowed == 0){
								 echo 'Unlimited';
								}
								
								else {
									echo $quiz_enroll->attempts_allowed; 
							
									}
									
							?> 
							
							</span> <br/>
							<strong>Total Points:<strong><span class="pro-price">  <?= $quiz_enroll->total_points; ?> </span>
							</div>
							<div class="col-lg-2">
							<?php 
							if($quiz_enroll->attempts == 0)
							{
							?>
                            <input type="submit" class="btn btn-info col-lg-11" value="Start" >
							<input type="hidden" name="attempt" value="0" >
							<?php 
							} 
							else 
							{
							  if(($quiz_enroll->attempts_allowed - $quiz_enroll->attempts) == 0){
							  
							  echo '<small><br/><br/>Your number of attempt is over for this quiz</small>';
							     
							  }else {
							?>
							
							
							<input type="hidden" name="attempt" value="<?= $quiz_enroll->attempts; ?>" >
							 <input type="submit" class="btn btn-danger col-lg-11" value="Attempt Again" >
							 
							 
							<?php 
									if($quiz_enroll->attempts_allowed == 0){
									
										 echo '<small>Unlimited attempt available</small>';
										 
										}
										else {
										
										echo '<small><br/><br/>ඔබට පිළිතුරු සැපයිය හැකි අවස්ථාවන් / You have another <span class="badge bg-warning">'.($quiz_enroll->attempts_allowed - $quiz_enroll->attempts).'</span> attempt(s)</small>';
										
										}
									 
									}
									
									}
							?>
							</div>
                          </div>
                      </section>
                 
				  <input type="hidden" name="qz_id" value="<?= $quiz_enroll->qz_id; ?>">
				  <input type="hidden" name="qz_name" value=" <?= $quiz_enroll->qz_name; ?>">
				  <input type="hidden" name="allow_attempt" value=" <?= $quiz_enroll->attempts_allowed; ?>">
				  </form>
                 
                  
            
                         
                </section>
				 
	<?php
	} 
	}else {
	
	
	?>
	 <section class="panel">
                          <header class="panel-heading">
                              <h3>Can't find any enrollment </h3>
							   <a href="<?php echo base_url(); ?>quiz" class="button-next  btn btn-info col-lg-3"  > Back</a></br></br>
                          </header>
                         
                    </section>
					
					<?php } ?>
	</div>  
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
  <script src="<?php echo base_url();?>template/nanatharana/js/common-scripts.js"></script>
   <script src="<?php echo base_url();?>template/nanatharana/js/advanced-form-components.js"></script>
   <script class="include" type="text/javascript" src="<?php echo base_url();?>template/nanatharana/js/jquery.dcjqaccordion.2.7.js"></script>
         
  </body>
</html>