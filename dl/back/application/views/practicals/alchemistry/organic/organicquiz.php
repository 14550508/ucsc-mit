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
                  
                          
                  <div class="col-md-8 col-sm-6 col-xs-6">
                      <section class="panel tasks-widget">
                          <header class="panel-heading">
                              <h3>Filling the Blanks &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  
                                  <a class="btn btn-info right-side" href="<?php echo base_url();?>organic/checkAnswers">Submit all and Finish</a>
                                  <a class="btn btn-danger right-side" href="<?php echo base_url();?>organic/restAnswers">Start Again</a>
                                <a class="btn btn-success right-side" href="<?php echo base_url();?>organic/organicselectquiz">Cancel</a></h3>
                                
                          </header>
                          
                          <div class="panel-body">
                              <div id="groupsall">
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
                              
                        if ($oqqlists->type == 0) { ?>
                             <div class="col-md-3">  
                                <div class="col-lg-3 group" id="<?php echo $oqqlists->group_id; ?>" >
                                 
                                            <ul>
                               <?php   
                              if($rows >0)
                                  
                                  
                                 {                       
                            
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
                                    <div class="col-lg-3 group" id="<?php echo $oqqlists->group_id; ?>" >

                                        <ul class="g2">
<?php   
                                                        if($rows >0)
                        {
                       
                            
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
                                  <a class="btn btn-info right-side" href="<?php echo base_url();?>organic/checkAnswers">Submit all and Finish</a>
                                  <a class="btn btn-danger right-side" href="<?php echo base_url();?>organic/restAnswers">Start Again</a>
                                <a class="btn btn-success right-side" href="<?php echo base_url();?>organic/organicselectquiz">Cancel</a></h3>
                                
                          </header>
                          
                            </section>   
                              
                          </div>
                  
                  <div class="col-md-4 col-sm-6 col-xs-6">
                      <section class="panel tasks-widget">
                          <header class="panel-heading">
                              <h3> Answer List </h3>
                          </header>
                          
                          <div class="panel-body">
                       
                        <div class="row product-list">
                            
                               
                        
                                          
                            <div class="col-lg-12" id="public">
                                             
                                  <div >
                                    <?php foreach ($oqalist as $oqalists)
                                        { ?>
                                             
                                         <div class="col-lg-6 draggable_ans" id="mem<?php echo $oqalists->member_id; ?>" >
                                           
                                             <img src='<?php echo base_url();?>img/organic/<?php echo $oqalists->member_image ?>' rel='<?php echo $oqalists->year; ?>'>
                                               <div id='added<?php echo $group->group_id; ?>' class='add' style='display:none;' ><img src='<?php echo base_url(); ?>img/organic/green.jpg' width='25' height='25'></div>
			<div id='removed<?php echo $group->group_id; ?>' class='remove' style='display:none;' ><img src='<?php echo base_url(); ?>img/organic/red.jpg' width='25' height='25'></div> 
                                         </div>
                                           

                                   <?php } ?>
                                 </div>    
                                             
                                             
                            </div>
                                     
                              
                                 
                        </div> 
                              
                          </div>
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
 
    <script>
        
  $(function() {	
	
		// Initiate draggable for public and groups
		var $gallery = $(".draggable_ans, .group");
		$( "img", $gallery ).live("mouseenter", function(){
			 var $this = $(this);
			  if(!$this.is(':data(draggable)')) {
			    $this.draggable({
			     	helper: "clone",
					containment: $( "#demo-frame" ).length ? "#demo-frame" : "document", 
					cursor: "move"
			    });
			  }
		});
		
		
		// Initiate Droppable for groups
		// Adding members into groups
		// Removing members from groups
		// Shift members one group to another
		
		$(".group").livequery(function(){
			var casePublic = false;
			$(this).droppable({
				activeClass: "ui-state-highlight",
				drop: function( event, ui ) {
				
					var m_id = $(ui.draggable).attr('rel');
					if(!m_id)
						{
							casePublic = true;
							var m_id = $(ui.draggable).attr("id");
							m_id = parseInt(m_id.substring(3));
						}					
					var g_id = $(this).attr('id');
					dropPublic(m_id, g_id, casePublic);
					//$("#mem"+m_id).hide();
					//$( "<li></li>" ).html( ui.draggable ).appendTo( this );
				}
			});
		});
                
             
           
          
		
		// Add or shift members from groups
		function dropPublic(m_id, g_id, caseFrom, ques_id) 
			{
			
				$.ajax({
					type:"post",                                        
					url:"<?php echo base_url();?>organic/addAnswers",
                                        data: {m_id: m_id, g_id: g_id},
                                        datatype: "html",
					
                                        
					success:function(data){					
						
							$("#groupsall").html(data);
                                                        $("#added"+g_id).animate({"opacity" : "10" },10);
							$("#added"+g_id).show();
							$("#added"+g_id).animate({"margin-top": "-50px"}, 450);
							$("#added"+g_id).animate({"margin-top": "0px","opacity" : "0" }, 450);
                                                                                                            
							
					}
				});
			} 
		// Remove memebers from groups
		// It will restore into public groups or non grouped members
		function removeMember(g_id, m_id)
			{
				$.ajax({
					type:"post",                                        
					url:"<?php echo base_url();?>organic/removeAnswers",
                                        data: {m_id: m_id, g_id: g_id},
                                        datatype: "html",
					success:function(data){
						
                                                $("#public").html(data);
                                                $("#removed"+g_id).animate({"opacity" : "10" },10);
						$("#removed"+g_id).show();
						$("#removed"+g_id).animate({"margin-top": "-50px"}, 450);
						$("#removed"+g_id).animate({"margin-top": "0px","opacity" : "0" }, 450);
					}
			});
		}	
		
	});
        
        $("img .group2").draggable('disable');
    </script> 
</body>
</html>