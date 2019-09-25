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
                  <div class="col-lg-8">
                      
					  
					  

    <?php if($qq_rows > 0) 
	{
	?>  
                      
					  
					  
        <section class="panel">
            <header class="panel-heading">
                <h3> <?= $qz_row->qz_name; ?></h3>  
				
				<?php if( $qz_row->time != 0){ ?>
			Time: <?= $qz_row->time; ?>	Mints 	 .::. Attempt: <?= $qe_row->attempts; ?>
				<?php } ?>		
            </header>
                              
        </section>
                     
                      
        <form class="form-horizontal" id="default" method="post" action="">  
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
									$querytp = $this->db->get("nana_user_temp_answers");
									$num_rowstp = $querytp->num_rows();
									$rowstp = $querytp->row();
								?>
								
							
								<div class="radios col-lg-12">
									<div> <label class="col-lg-4 control-label"><h5>Choose your answer?</h5></label></div>
                                <?php foreach ($query4->result() as $rowQA ) { 	$numb = ++$numb; ?>
							
                                        <table class="table table-striped table-hover">
										<tbody>
										<tr>
										<td width="2%"> <?= $numb; ?></td>
										<td>
										
										<?php if($num_rowstp > 0 &&  $rowQA->answer_order == $rowstp->user_answer) {?>
										
                                            <label class="qz_answer" for="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>">
                                              <input checked  type="radio" name="qa_<?= $rowQS->q_id; ?>" id="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>" class="gceal" value="<?= $rowQA->answer_order; ?>"   />
											  <?= $rowQA->answer; ?>
											  
                                            </label>
                                              
                                          <?php } else {?>
										  
											 <label class="qz_answer" for="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>">
                                              <input  type="radio" name="qa_<?= $rowQS->q_id; ?>" id="radio-<?= $rowQA->q_id; ?><?= $rowQA->answer_order; ?>" class="gceal" value="<?= $rowQA->answer_order; ?>"   />
											  <?= $rowQA->answer; ?>
											  
                                            </label>
										  
										  <?php } ?>   
                                        
										</td>
										</tr>
										</tbody>
										</table>
								<?php } ?>
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
		
		
			
        <div  class="navbar navbar-default navbar-fixed-bottom " role="navigation">
		<br/>
        <div class="col-xs-4">
		<a  title="Save"  class="btn btn-info" id="save_answers" > Save</a>
		</div>
		   <div class="col-xs-8">
		 <a  title="Submit" class="btn btn-danger" id="submit_answers"> Submit and finish</a>
			
		</div>
		 <a href="#" class="go-top">
                  <i class="fa fa-angle-up"></i>
              </a>
		<br/>
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
    <script src="<?php echo base_url();?>template/nanatharana/js/bootbox.min.js"></script>
   <script src="<?php echo base_url();?>template/nanatharana/js/bootbox.js"></script>
       <script>
		
		
		$('#save_answers').click(function(e) {
			e.preventDefault();
			$('#default').attr('action', 'save_answers');
			$('#default').submit();
		});
	   
	   
	   </script>  
	   <script>
        $(document).on("click", "#submit_answers", function(e) {
            bootbox.confirm("You are about to submit all and finish this attempt, Once you finish the attempt you will no longer be able to change your answer/ ඔබ මෙම අවස්ථාවේදී සපයා ඇති පිළිතුරු නැවත වෙනස් කල නොහැකි බවත් මෙම ප්‍රශ්න පත්‍රයට ඔබට පිළිතුරු සැපයිය හැකි අවස්ථාවන්ගෙන් අවස්ථාවක් අඩු වනු ඇති බවටත් දන්වා සිටිමු.", function(result) {
  
  if(result == true){
	 $('#default').attr('action', 'submit_answers');
			$('#default').submit();
	}else {
	
	
	}
}); 
	


        });
    </script>
  </body>
</html>