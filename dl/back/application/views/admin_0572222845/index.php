<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container">
     <?php $this->load->view('admin_0572222845/admin_menu'); ?>

      <?php $this->load->view('tpl/ads_bar');
$userId = $this->session->userdata('user_id');	
  
							$this->db->select('*');
							$querytemp = $this->db->get("nana_question_answers_new");  				
							$new_answer_row = $querytemp->num_rows();
							
							$this->db->select('*');
							$querynqz= $this->db->get("nana_questions_bank_new");  				
							$nqz_row = $querynqz->num_rows();
							
							$this->db->select('*');
							$this->db->where('u_id', $userId);
							
							$querycart = $this->db->get("nana_scart");  				
							$cart_row = $querycart->num_rows();
							
							$this->db->select('*');
							$queryqzl = $this->db->get("nana_quiz");  				
							$qzls = $queryqzl->result();
							
							$this->db->select('*');
				$this->db->where('u_id', $userId);
				$query7 = $this->db->get("nana_my_credits");  				
				$query7->result();
				$cd_rows = $query7->row();	
				$cd_nrows = $query7->num_rows();
				if($cd_nrows > 0){
				$credits = $cd_rows->credits;
				
				}else {
				$credits = 0;
				}
	  
	  
	  ?>


   <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-user"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  0
                              </h1>
                              <p>Users</p>
                          </div>
                      </section>
                  </div>
				    <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol yellow">
                              <i class="fa fa-trophy"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count3">
                                  0
                              </h1>
                              <p>Rank</p>
                          </div>
                      </section>
                  </div>
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol red">
                              <i class="fa fa-puzzle-piece"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count2">
                                  0
                              </h1>
                              <p>Activities</p>
                          </div>
                      </section>
                  </div>
                
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol blue">
                              <i class="fa  fa-money"></i>
                          </div>
                          <div class="value">
                              <h1 class=" count4">
                                  0
                              </h1>
                              <p>Credits</p>
                          </div>
                      </section>
                  </div>
              </div>
              <!--state overview end-->

        
              <div class="row">
                  <div class="col-lg-4">
                      <!--user info table start-->
                      <section class="panel">
                         
                          <table class="table table-hover personal-task">
                              <tbody>
                                <tr>
                                  
								  <td>
                                       <a href="<?php echo base_url();?>admin_0572222845/update_quiz_question" > <i class=" fa fa-cloud-upload"></i></a>
                                    </td>
                                    <td><a href="<?php echo base_url();?>admin_0572222845/update_quiz_question" >New Questions </a></td>
                                    <td><span class="badge bg-primary"> <?= $nqz_row ; ?></span></td>
                                </tr>
								
								 <tr>
                                  
								  <td>
                                       <a href="<?php echo base_url();?>admin_0572222845/update_quiz_question" > <i class=" fa fa-cloud-upload"></i></a>
                                    </td>
                                    <td><a href="<?php echo base_url();?>admin_0572222845/update_quiz_question" >New Answers </a></td>
                                    <td><span class="badge bg-primary"> <?= $new_answer_row ; ?></span></td>
                                </tr>
                                
                                
                               
                              </tbody>
                          </table>
                      </section>
                      <!--user info table end-->
                  </div>
				  
				  <?php 
					
							$this->db->select('*');
							$queryu = $this->db->get("nana_users");  				
							$users_row = $queryu->num_rows();
							
						
							
				  
				  ?>
                  <div class="col-lg-8">
                      <!--work progress start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                              <div class="task-progress">
                                  <h1>Top 5 Quizzes</h1>
                                  
                              </div>
                              
                          </div>
                        
                      </section>
                      <!--work progress end-->
					  
					  
                  </div>
				 
				 
				
					  
					   
				
				  
              </div>
       
             

          </section>
      </section>
	  <?php 
	  $userId = $this->session->userdata('user_id');
				$this->db->select('*');
				$this->db->where('u_id', $userId);
				$query3 = $this->db->get("nana_points");  				
				$p_row = $query3->row();
					$num_rowp = $query3->num_rows();
				if($num_rowp > 0){
				   $point = $p_row->points;
				}else {
				$point =0;
				
				}
	  $this->db->select('*');
				$this->db->where('u_id', $userId);
				$query4 = $this->db->get("quiz_enroll");  				
				$query4->result();
				$eq_rows = $query4->num_rows();
				
		$this->db->select('*');
				 $this->db->order_by("points","desc");
				$queryrk = $this->db->get("nana_points");  				
				$rk_row = $queryrk->row();
				$queryrk->result();
				$rk_rows = $queryrk->num_rows();
			if($rk_rows > 0) 
			{
				$rank = 0;
			   foreach ($queryrk->result() as $rank_list){
					$rank += 1;
			     
			     if($rank_list->u_id == $userId)
				 
				 {
				 
					$myrank = $rank;
				 
				 }
				 else 
				 
				 {
				  
					$myrank='NaN';
				 
				 }
			   }
			
			}	
			else 
			{
			
			  $myrank='NaN';
			
			}
		
	  ?>
	  
      <!--main content end-->
<?php $this->load->view('tpl/online_friends'); ?>  
      
<?php  $this->load->view('tpl/footer'); ?>
      
   <?php  $this->load->view('tpl/js/main_js'); ?>
   
    <!--script for this page-->
    <script src="<?php echo base_url();?>template/nanatharana/js/sparkline-chart.js"></script>
    <script src="<?php echo base_url();?>template/nanatharana/js/easy-pie-chart.js"></script>
   
    <script src="<?php echo base_url();?>template/nanatharana/js/jquery.customSelect.min.js" ></script>
        <script>

        //owl carousel

      $(document).ready(function() {
          $("#owl-demo").owlCarousel({
              navigation : true,
              slideSpeed : 300,
              paginationSpeed : 500,
              singleItem : true,
			  autoPlay:true

          });
      });

      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

	  
function countUp(count)
{

    var div_by = 25,
        speed = Math.round(count / div_by),
        $display = $('.count'),
        run_count = 1,
        int_speed = 24;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

countUp(<?= $users_row; ?>);

function countUp2(count)
{
    var div_by = 25,
        speed = Math.round(count / div_by),
        $display = $('.count2'),
        run_count = 1,
        int_speed = 24;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

countUp2(<?= $eq_rows; ?>);

function countUp3(count)
{
    var div_by = 25,
        speed = Math.round(count / div_by),
        $display = $('.count3'),
        run_count = 1,
        int_speed = 24;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

countUp3(<?= $myrank; ?>);

function countUp4(count)
{
    var div_by = 25,
        speed = Math.round(count / div_by),
        $display = $('.count4'),
        run_count = 1,
        int_speed = 24;

    var int = setInterval(function() {
        if(run_count < div_by){
            $display.text(speed * run_count);
            run_count++;
        } else if(parseInt($display.text()) < count) {
            var curr_count = parseInt($display.text()) + 1;
            $display.text(curr_count);
        } else {
            clearInterval(int);
        }
    }, int_speed);
}

countUp4(<?= $credits; ?>);
	  
	  
  </script>
  </body>
</html>