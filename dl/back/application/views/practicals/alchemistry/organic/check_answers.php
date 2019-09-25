<?php  $this->load->view('tpl/head'); ?>
<link href="<?php echo base_url();?>template/nanatharana/css/practicals/css/or_style.css" rel="stylesheet" type="text/css" />

    



</head>
<body class="">
    <?php //echo $this->session->userdata('userid'); ?>
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
         <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
         

              <div class="row">
                  
                          
                  <div class="col-md-12 ">
                      <section class="panel tasks-widget">
                          <header class="panel-heading">
                              <h3> Your Answers </h3>
							  <a class="btn btn-success right-side" href="<?php echo base_url();?>organic/organicselectquiz">Go Back</a>
                          </header>
                          
                          <div class="panel-body">

                              <div id="groupsall1">
                              <div class="row product-list" id="draggable_quz">
                       <?php foreach ($oqqlist as $oqqlists){                             
                           
                            $oqid = $this->session->userdata('q_id');
                            $user_id = $this->session->userdata('userid');  
                            $this->db->select('organic_user_group.member_id, organic_members.member_image');                           
                            $this->db->join('organic_members', 'organic_user_group.member_id = organic_members.member_id');
                            $this->db->where('organic_user_group.q_id', $oqid);
                            $this->db->where('organic_user_group.group_id', $oqqlists->group_id);
                            $this->db->where('organic_user_group.user_id' , $user_id);		
                            $this->db->group_by('organic_user_group.member_id'); 
                            $query = $this->db->get('organic_user_group');		
                            	
                            $row = $query->row();           
                            $rows = $query->num_rows();	
                            
                            
                            $this->db->select('*');   
                            $this->db->where('q_id', $oqid); 
                            $this->db->where('qno', $oqqlists->group_id); 
                            $query1 = $this->db->get('organic_anwers');
                            $row1 = $query1->row(); 
                            $tmark  =0;  
                        if ($oqqlists->type == 0) { ?>
                             <div class="col-md-3">  
                                 
                                
                                <div class="col-lg-3 group" id="<?php echo $oqqlists->group_id; ?>" >
                                 
                                            <ul>
                               <?php   
                              if($rows >0)
                                  
                                  
                                 { 
                         if($row1->anwer == $row->member_id) {
                             $tmark += $row1->marks;
                             echo "<span class='badge bg-success'>".$row1->marks."</span>";
                              echo  "<li><h3 style='color:green;'><i class='fa fa-check-circle' ></i></h3></li>\n";   
                          }else {
                              echo "<span class='badge bg-warning'>0</span>"; 
                              echo  "<li><h3 style='color:red;'><i class='fa fa-times-circle' ></i></h3></li>\n";   
                              
                          }
                                  
                            
                          echo  "<li><img src='".base_url()."img/organic/".$row->member_image."' rel='".$row->member_id."'></li>\n";  
                            

                                }
                                
                                 ?>
                                                
                                            </ul>
                                  <br/>
                                   <br/>
                                    <br/>
                                     <br/>
                                   <?php echo "<img class='group2' src='".base_url()."img/organic/arrow.png' width='200' height='15' >"; ?> 
                                </div>
                             </div>
                             <?php }
                        
                                 elseif($oqqlists->type == 1)
                            { ?>
                             <div class="col-md-3">  
                                <div class="col-lg-3 group" id="<?php echo $oqqlists->group_id; ?>" >
                                                <div class='title'><?php echo ucwords($oqqlists->group_name) ?></div>
                                                <ul class="g1">
                                                <?php   
                                                        if($rows >0)
                        {
                       
                              if($row1->anwer == $row->member_id) {
                                  $tmark += $row1->marks;
                                   echo "<span class='badge bg-success'>".$row1->marks."</span>";
                              echo  "<li><h3 style='color:green;'><i class='fa fa-check-circle' ></i></h3></li>\n";   
                          }else {
                               echo "<span class='badge bg-warning'>0</span>";
                              echo  "<li><h3 style='color:red;'><i class='fa fa-times-circle' ></i></h3></li>\n";   
                              
                          }
                          echo  "<li><img src='".base_url()."img/organic/".$row->member_image."' rel='".$row->member_id."'></li>\n";  
                            
                        



                         }
                         ?>    
                                                    
                                                    
                                                </ul>
                                 </div>
                             </div>
                       <?php } 
                       elseif(($oqqlists->type == 2) 
                               ) {?>
                                <div class="col-md-3">  
                                    <div class="col-lg-3 group " id="<?php echo $oqqlists->group_id; ?>" >

                                        <ul class="g2">
<?php   
                                                        if($rows >0)
                        {
                        if($row1->anwer == $row->member_id) {
                            $tmark += $row1->marks;
                             echo "<span class='badge bg-success'>".$row1->marks."</span>";
                              echo  "<li><h3 style='color:green;'><i class='fa fa-check-circle' ></i></h3></li>\n";   
                          }else {
                              echo "<span class='badge bg-warning'>0</span>";
                              echo  "<li><h3 style='color:red;'><i class='fa fa-times-circle' ></i></h3></li>\n";   
                              
                          }
                            
                          echo  "<li><img src='".base_url()."img/organic/".$row->member_image."' rel='".$row->member_id."'></li>\n";  
                            
                        



                         }
                         ?>
                                                    </ul>
                                        <br/>
                                   <br/>
                                    <br/>
                                     <br/>
                                   <?php echo "<img class='group2' src='".base_url()."img/organic/arrow1.png' width='200' height='15' >"; ?> 
                                        
                                     </div>
                                </div>
                       <?php } 
                       else
                           { ?>
                          <div class="col-md-3">  
                                <div class="col-lg-3 group1" id="<?php echo $oqqlists->group_id; ?>" >

                              <img src='<?php echo base_url();?>img/organic/<?php echo $oqqlists->group_name ?>'  ><br/>
                                 </div>
                            </div>
                       <?php } ?>
                            
                          
                                
                               
                          
                            
                            
                 <?php } ?>
                          
                        </div>  
                              </div>
                          </div>
                          <ht/>
                           <header class="panel-heading">
                              <h3>&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  
                               
                                </h3>
								<a class="btn btn-success right-side" href="<?php echo base_url();?>organic/organicselectquiz">Go Back</a>
                             
                          </header>
                          
                            </section>   
                              
                          </div>
         
                     
                  </div>

              
              </div>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      </section>

<?php  $this->load->view('tpl/footer'); ?>
   
    
  <script src="<?php echo base_url();?>template/nanatharana/js/organic/jquery-1.8.3.min.js"></script>
           <script src="<?php echo base_url();?>template/nanatharana/js/organic/jquery.livequery.min.js"></script>
     <script src="<?php echo base_url();?>template/nanatharana/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url();?>template/nanatharana/js/organic/jquery-ui-1.9.2.custom.min.js"></script>  
    
    
<script src="<?php echo base_url();?>template/nanatharana/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url();?>template/nanatharana/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>template/nanatharana/js/jquery.sparkline.js" type="text/javascript"></script>
 
   
</body>
</html>