<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
        <section class="wrapper site-min-height">
              
              <!-- page start-->
            <div class="row">
			<div class="col-lg-3"> &nbsp; </div>
					<div class="col-lg-6">
                     
				 <section class="panel">
                          <header class="panel-heading">
                            
                            <h3>Confirmation Message </h3>
							
                          </header>
							<div class="panel-body" style="display: block;">
							
							
							<?php 
								$userId = $this->session->userdata('user_id');
								$this->db->select('*');
								$this->db->where('u_id', $userId);
								$this->db->where('qz_id', $qz_id);
								$query = $this->db->get("nana_user_temp_answers");
								$num_rows = $query->num_rows();
							
							if($num_rows > 0) {
							
								$this->db->select('*');
								$this->db->where('u_id', $userId);
								$this->db->where('qz_id', $qz_id);
								$query2 = $this->db->get("quiz_enroll");
								$row = $query2->row();
							?>
							
							<h4>Summary of your previous attempts (<?= $row->attempts; ?>)</h4><br/><br/>
							
							
							<form action="<?php echo base_url(); ?>quiz/save_answers" method="post" >
							
								<input type="submit" class="btn btn-info col-lg-6" value="Continue the last attempt" >
								<input type="hidden" name="qz_id" value="<?= $qz_id; ?>" >
								<input type="hidden" name="attempt" value="<?= $row->attempts; ?>" >
								
							
							
							<a href="<?php echo base_url(); ?>enroll/index" class="btn btn-danger col-lg-6" >Cancel</a>
								</form>
							
							
							
							<?php } 
							
							else { ?>
							<p>Are you sure do you want start   "<?= $qz_name; ?>" quiz?</p><br/><br/>
							<form action="<?php echo base_url(); ?>quiz/add_attempt" method="post" >
							
								<input type="submit" class="btn btn-info col-lg-6" value="Yes" >
								<input type="hidden" name="qz_id" value="<?= $qz_id; ?>" >
							
							
							<a href="<?php echo base_url(); ?>enroll/index" class="btn btn-danger col-lg-6" >No</a>
								</form>
								<?php } ?>
								<div class=""><br/>&nbsp;</div>
								<div class=""><br/>&nbsp;</div>
								<div class=""><br/>&nbsp;</div>
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
  <script src="<?php echo base_url();?>template/nanatharana/js/common-scripts.js"></script>
   <script src="<?php echo base_url();?>template/nanatharana/js/advanced-form-components.js"></script>
   <script class="include" type="text/javascript" src="<?php echo base_url();?>template/nanatharana/js/jquery.dcjqaccordion.2.7.js"></script>
         
  </body>
</html>
