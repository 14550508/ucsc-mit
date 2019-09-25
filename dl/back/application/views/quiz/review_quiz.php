<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
     
     <?php 
		$userId = $this->session->userdata('user_id');
		
		$this->db->select('*');
		$this->db->where('qz_id', $qz_id);
		$query1 = $this->db->get("nana_quiz");  				
		$query1->result();
		$qz_rows = $query1->num_rows();
		$qz_row = $query1->row();
		
		
		$this->db->select('*');
		$this->db->where('qz_id', $qz_id);
		$query2 = $this->db->get("nana_quiz_question");  				
		$query2->result();
		$qq_rows = $query2->num_rows();
		
		$this->db->select('*');
		$this->db->where('qz_id', $qz_id);
		$this->db->where('u_id', $userId);
		$query5 = $this->db->get("quiz_enroll");  				
		$query5->result();
		$qe_row = $query5->row();
	 
	 ?>
      
          <section class="wrapper site-min-height">
              
              <!-- page start-->
              <div class="row">
			                    <div class="col-lg-2"></div>
                  <div class="col-lg-8" id="default">
                      
					  
					  

    <?php if($qq_rows > 0) 
	{
		$this->db->select('*');
		$this->db->where('qz_id', $qz_id);
		$this->db->where('up_id', $userId);
		$this->db->where('qz_attempt', $qe_row->attempts);
		$queryp = $this->db->get("nana_point_history");  				
		$queryp->result();
		$prow = $queryp->row();
	
	?>  
                      
					  
					  
        <section class="panel">
            <header class="panel-heading">
			<div class="panel-body">
			<div class="col-lg-12">
                <h3> <?= $qz_row->qz_name; ?> Summary Report</h3>  
				</div>
				<div class="col-lg-8">
				<?php if( $qz_row->time != 0){ ?>
			Time: <?= $qz_row->time; ?>	Mints 	 <br/> 
				<?php } ?>		
				Attempt: <?= $qe_row->attempts; ?><br/> 
				
			    Corrections :  <?= $prow->corrections; ?> / <?= $prow->num_quetions; ?><br/> 
				
				<?php if($qe_row->attempts == 1){ ?>
				Total  Points :  <?= $prow->points; ?>
				<?php } else { ?>
				
				Points must be add only first attempt !
				<?php } ?>
				</div>
				<div class="col-lg-4">
				<?php if($qz_row->attempts_allowed > $qe_row->attempts or $qz_row->attempts_allowed == 0){?>
				 <form class="form-horizontal" id="default" method="post" action="<?php echo base_url();?>enroll/confirmation">  
				 <input type="hidden" name="qz_id" value="<?= $qz_id; ?>" >
				  <input type="hidden" name="qz_name" value="<?= $qz_row->qz_name; ?>" >
				 <button  title="Save" href="" class="btn btn-info col-lg-12" id="Start Quiz" > Start Again</button>
				 </form>
				 
				
				 <?php }  else {
				 
				 echo 'Your all attempts are over';
				 
				 }?>
				  <a  href="<?php echo base_url();?>students/index" class="btn btn-danger col-lg-12" id="Back_home" > Back to Home</a>
				 </div>
				
				</div>
			
            </header>
                              
        </section>
                     
                      
        
                           <!-- Question start --> 
			
			
		<?php
		$qno = 0;
		foreach ($query2->result() as $rowQQ )
		{ 
		$qno += 1;
		?>
						   
						   
			<?php
			
				  
			
				//Questions from question bank for quiz		   
				$this->db->select('*');
				$this->db->where('q_id', $rowQQ->q_id);
				$query3 = $this->db->get("nana_questions_bank");  				
				$query3->result();
				$qs_rows = $query3->num_rows();
				
				 
						   
			?>
						   
				
				<?php if($qs_rows > 0 ){
				foreach ($query3->result() as $rowQS )
				{ ?>		   
                       

					<fieldset title="Step1" class="step" id="default-step-0">
					   <section class="panel">

                            <div class="panel-body">
                               
                                <div class="col-lg-12" >
								
								<input name="q_id[]" type="hidden" value="<?= $rowQS->q_id; ?>">
                                    <div class="activity terques"> <span> <?= $qno; ?></span> </div>   
                                    <p> <?= $rowQS->questiontext; ?></p>
                                </div> 
								
								<?php 
								//Questions answer
									$this->db->select('*');
									$this->db->where('q_id', $rowQS->q_id);
									if($qz_row->shuffle_questions_aswers == 1){
									$this->db->order_by('answer_order', 'RANDOM');
									}
									$query4 = $this->db->get("nana_question_answers");  				
									$query4->result();
								
									$qa_rows = $query4->num_rows();
										
									$numb = 0;
									
									$this->db->select('*');
									$this->db->where('q_id', $rowQS->q_id);
									$this->db->where('u_id', $userId);
									$this->db->where('qz_id', $qz_id);
									$this->db->where('attempts ', $qe_row->attempts);
									$queryre = $this->db->get("nana_user_answers");
									$num_rowsre = $queryre->num_rows();
									$rowsre = $queryre->row();
									
									
									if($num_rowsre >0) {
									
									$rowfra = $rowsre->fraction;
									
									}else {
									
									$rowfra ='';
									
									}
									
								?>
								
							
								<div class="radios col-lg-12">
								 <?php if($rowfra == 1) {?>
								<div class="alert alert-success fade in">
                                 
                             
                                  <strong>Well done!</strong> Your answer is correct.
                              </div>
							  <?php }
							  
							  else { ?>
							  <div class="alert alert-block alert-danger fade in">
                                  
                                  <strong>Opps! </strong>Your answer is incorrect.
                              </div>
							  
							  <?php } ?>
									
                                <?php foreach ($query4->result() as $rowQA ) { 	$numb = ++$numb; ?>
							   
                                        <table class="table table-striped table-hover">
										<tbody>
										<tr>
										<td width="2%"> <?= $numb; ?></td>
										<td>
										
										<?php if($num_rowsre > 0 &&  $rowQA->answer_order == $rowsre->user_answer) {?>
										
													<?php 
													if($rowsre->fraction == 1) 
													{ ?>
												
															<label class="qz_answer" for="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>">
															  <input checked  type="radio" name="qa_<?= $rowQS->q_id; ?>" id="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>" class="gceal" value="<?= $rowQA->answer_order; ?>"   />
															  <?= $rowQA->answer; ?>
															  &nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span>
															</label>
													<?php 
													} 
													else 
													{ ?>
													
															<label class="qz_answer" for="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>">
															  <input checked  type="radio" name="qa_<?= $rowQS->q_id; ?>" id="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>" class="gceal" value="<?= $rowQA->answer_order; ?>"   />
															  <?= $rowQA->answer; ?>
															  &nbsp;&nbsp;<span class="badge bg-important"><i class="fa fa-times"></i></span>
															</label>
													
													<?php 
													} ?>
                                              
                                          <?php } 
										  
										  else {?>
										  
											   <?php  if($rowQA->fraction){ ?>
												 <label class="qz_answer" for="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>">
												  <input  type="radio" name="qa_<?= $rowQS->q_id; ?>" id="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>" class="gceal" value="<?= $rowQA->answer_order; ?>"   />
												  <?= $rowQA->answer; ?>
												 &nbsp;&nbsp;<span class="badge bg-success"><i class="fa fa-check"></i></span>
												</label>
												<?php } else{ ?>
												
												<label class="qz_answer" for="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>">
												  <input  type="radio" name="qa_<?= $rowQS->q_id; ?>" id="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>" class="gceal" value="<?= $rowQA->answer_order; ?>"   />
												  <?= $rowQA->answer; ?>
												 
												</label>
												
												<?php } ?>
										  <?php } ?>   
                                        
										</td>
										</tr>
										</tbody>
										</table>
										
								<?php } ?>
								Feedback:<?= $rowQA->feedback; ?>
								</div>
								
                            </div> 
                        
                                

                        </section> 

				<?php
				} 
				
				} else {} ?>			
                           
        <?php
		} ?>
		<div class="col-lg-4"> </div>
		<div class="col-lg-8">
		<input name="qz_id" type="hidden" value="<?= $qz_id; ?>">
		<input name="attempt" type="hidden" value="<?= $qe_row->attempts; ?>">
		<input name="noq" type="hidden" value="<?= $qq_rows; ?>">
		
		
		
			</div>
       
		 
    
	<?php 
	} 
	else{ ?>  
	
	
		 <section class="panel">
		 
            <header class="panel-heading">
                <h3> Sorry this quiz is empty</h3>
            </header>
                              
        </section>
				 
	
	<?php 
	
	} 
	
	?>
	
	<section class="panel">
            <header class="panel-heading">
			<div class="panel-body">
			<div class="col-lg-12">
                <h3> <?= $qz_row->qz_name; ?> Summery Report</h3>  
			</div>
				
				<div class="col-lg-8">
				<?php if( $qz_row->time != 0){ ?>
			Time: <?= $qz_row->time; ?>	Mints 	 <br/> 
				<?php } ?>		
				Attempt: <?= $qe_row->attempts; ?><br/> 
				
			    Corrections :  <?= $prow->corrections; ?> / <?= $prow->num_quetions; ?><br/> 
				Total  Points :  <?= $prow->points; ?>
				</div>
				<div class="col-lg-4">
				<?php if($qz_row->attempts_allowed > $qe_row->attempts or $qz_row->attempts_allowed == 0){?>
				  <form class="form-horizontal" id="default" method="post" action="<?php echo base_url();?>enroll/confirmation">  
				 <input type="hidden" name="qz_id" value="<?= $qz_id; ?>" >
				  <input type="hidden" name="qz_name" value="<?= $qz_row->qz_name; ?>" >
				 <button  title="Save" href="" class="btn btn-info col-lg-12" id="Start Quiz" > Start Again</button>
				 </form>
							
				 <?php } else {
				 
				 echo 'Your all attempts are over';
				 
				 } ?>
				 <a  href="<?php echo base_url();?>students/index" class="btn btn-danger col-lg-12" > Back to Home</a>
				 </div>
				
				</div>
			
            </header>
                              
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
