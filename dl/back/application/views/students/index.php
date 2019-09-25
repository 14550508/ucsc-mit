<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container">
     <?php $this->load->view('tpl/student_menu'); ?>

      <?php $this->load->view('tpl/ads_bar');
$userId = $this->session->userdata('user_id');	  
	  	$this->db->select('*');
							$this->db->where('u_id', $userId);
							$this->db->group_by('attempts');
							$querytemp = $this->db->get("nana_user_temp_answers");  				
							$temp_answer_row = $querytemp->num_rows();
							
							$this->db->select('*');
							$this->db->where('u_id', $userId);
							$this->db->group_by('inv_no');
							$queryinv = $this->db->get("nana_invoice");  				
							$inv_row = $queryinv->num_rows();
							
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
				
				 $this->db->select('*');
				$this->db->where('u_id', $userId);
				$query4 = $this->db->get("quiz_enroll");  				
				$query4->result();
				$eq_rows = $query4->num_rows();
	  
	  
	  ?>


   <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!--state overview start-->
              <div class="row state-overview">
                  <div class="col-lg-3 col-sm-6">
                      <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-star"></i>
                          </div>
                          <div class="value">
                              <h1 class="count">
                                  0
                              </h1>
                              <p>Points</p>
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
                          <div class="panel-body">
                              <a href="<?php echo base_url();?>students/profile" class="task-thumb">
                                   <?php if($userdatas[0]->stp_profile_pic =='' || $userdatas[0]->stp_profile_pic ==0){ ?> 
                              
                              <img src="<?php echo base_url();?>profiles/nana_profile_pic.jpg" width="75px" alt="">
                              
                             <?php  }else { ?>
                              
                                  <img src="<?php echo base_url();?>profiles/<?php echo $userdatas[0]->stp_profile_pic; ?>" width="75px"  alt="">
                                  
                            <?php } ?>      
                              </a>
                              <a href="<?php echo base_url();?>students/profile"> <div class="task-thumb-details">
                                 <h1><?php echo $users[0]->stp_fname; ?> <?php echo $users[0]->stp_lname; ?></h1>
                                  <p><?php echo $userdatas[0]->st_school_name; ?></p>
                              </div></a>
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
                                <tr>
                                  
								  <td>
                                       <a href="<?php echo base_url();?>enroll/index" > <i class=" fa fa-tasks"></i></a>
                                    </td>
                                    <td><a href="<?php echo base_url();?>enroll/index" >My Papers</a></td>
                                    <td><span class="badge bg-primary"> <?= $eq_rows; ?></span></td>
                                </tr>
                                
								
								
                                   
								
								<tr>
                                    <td>
                                       <a href="<?php echo base_url();?>students/profile" > <i class="fa fa-user"></i>
                                    </a></td>
                                    <td><a href="<?php echo base_url();?>students/profile" >My Profile </a></td>
                                    <td> </td>
                                </tr>
                                
                               
                              </tbody>
                          </table>
                      </section>
                      <!--user info table end-->
                  </div>
				  
				  <?php 
					
							$this->db->select('*');
							$this->db->where('up_id', $userId);
							$this->db->where('points >', 0 );
							
							$this->db->order_by('points', 'DESC');
							$this->db->limit('5');
							$queryph = $this->db->get("nana_point_history");  				
							$phnum_row = $queryph->num_rows();
							
						
							
				  
				  ?>
                  <div class="col-lg-8">
                      <!--work progress start-->
                      <section class="panel">
                          <div class="panel-body progress-panel">
                              <div class="task-progress">
                                  <h1>Top 5 Quizzes</h1>
                                  
                              </div>
                              
                          </div>
                          <table class="table table-hover personal-task">
                              <tbody>
					<?php if($phnum_row > 0){ 
					$num = 0;
					
					
					?>
							  <?php foreach($queryph->result() as $phrows)  { $num +=1; ?>
							  
							  
                              <tr>
                                  <td><?= $num; ?></td>
                                  <td>
                                      <?= $phrows->reason; ?>
                                  </td>
                                  <td>
                                      <span class="badge bg-important"> <?= number_format(($phrows->corrections/ $phrows->num_quetions)*100, 0); ?>%</span>
                                  </td>
                                  <td>
                                    <div class="badge bg-primary"> <?= $phrows->points; ?> P</div>
                                  </td>
                              </tr>
                             <?php } 
							 
							 
							 ?>
							 
					<?php } else {?>
					 <tr>
                                  <td >No Results!</td>
                                  <td ></td>
								  <td ></td>
								  <td ></td>
                     </tr>
					
					
					<?php } ?>
                              </tbody>
                          </table>
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

countUp(<?= $point; ?>);

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