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
                              <h3>Practical 01 &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;  
                                  <a class="btn btn-info right-side" href="<?php echo base_url();?>practicals/checkAnswers">Submit all and Finish</a>
                                  <a class="btn btn-danger right-side" href="<?php echo base_url();?>practicals/restAnswers">Start Again</a>
                                <a class="btn btn-success right-side" href="<?php echo base_url();?>practicals/organicselectquiz">Cancel</a></h3>
                                
                          </header>
                          
                          <div class="panel-body">
                              <div id="groupsall">
                              <div class="row product-list" id="draggable_quz">
     <div class="col-md-3">  
                                <div class="col-lg-3 group" id="1" >
								
								
								</div>
								
     </div>
	 
	 <div class="col-md-3">  
                                <div class="col-lg-3 group" id="2" >
								
								
								</div>
								
     </div>
                          
                        </div>  
                              </div>
                          </div>
                          <ht/>
                          
                          
                            </section>   
                              
                          </div>
                  
                  <div class="col-md-4 col-sm-6 col-xs-6">
                      <section class="panel tasks-widget">
                          <header class="panel-heading">
                              <h3> Tools List </h3>
                          </header>
                          
                          <div class="panel-body">
                       
                        <div class="row product-list">
                            
                               
                        
                                          
                            <div class="col-lg-12" id="public">
                                             
                                  <div >
								  
								  <div class="col-lg-6 draggable_ans" id="R1" >
                                           
                                             <img src='<?php echo base_url();?>img/phypracticals/electornic/R/R1.png' rel='R1'>
                                               
                                         </div>
										 
										 <div class="col-lg-6 draggable_ans" id="R2" >
                                           
                                             <img src='<?php echo base_url();?>img/phypracticals/electornic/R/R2.png' rel='R2'>
                                               
                                         </div>
										 
										 <div class="col-lg-6 draggable_ans" id="R3" >
                                           
                                             <img src='<?php echo base_url();?>img/phypracticals/electornic/R/R3.png' rel='R3'>
                                               
                                         </div>
										 
										 <div class="col-lg-6 draggable_ans" id="R4" >
                                           
                                             <img src='<?php echo base_url();?>img/phypracticals/electornic/R/R4.png' rel='R4'>
                                               
                                         </div>
										 <div class="col-lg-6 draggable_ans" id="R5" >
                                           
                                             <img src='<?php echo base_url();?>img/phypracticals/electornic/R/R5.png' rel='R5'>
                                               
                                         </div>
										  <div class="col-lg-6 draggable_ans" id="R5" >
                                           
                                             <img src='<?php echo base_url();?>img/phypracticals/electornic/v.png' rel='R5'>
                                               
                                         </div>
										 <div class="col-lg-6 draggable_ans" id="R5" >
                                           
                                             <img src='<?php echo base_url();?>img/phypracticals/electornic/A.png' rel='R5'>
                                               
                                         </div>
                                    
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
					url:"<?php echo base_url();?>practicals/addAnswers",
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
					url:"<?php echo base_url();?>practicals/removeAnswers",
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