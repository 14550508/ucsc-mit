<?php  $this->load->view('tpl/head'); ?>
<script>
function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text/html", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text/html");
    ev.target.appendChild(document.getElementById(data));
}
</script>
</head>
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php $this->load->view('tpl/student_menu'); ?>
         <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
         
 <!-- page start-->
    <div class="row">
                  <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              <h3>Select Organic Quiz</h3>
                          </header>
                          </section>
						  
						  </div>
                               
				   <?php foreach ($oqlist as $oqlists){ ?>
				    
					<div class="col-lg-4">
				  <section class="panel">
				   <div class="panel-body">
				 
				  
				   <form method="post" action="<?php echo base_url();?>organic/organicquiz" >
                  
                   
                          
                              
                                  <img src="<?php echo base_url(); ?>img/<?= $oqlists->image; ?>" width="100%" alt="">
                               
							  
                              
                              
                         

                         <div class="nana_cat_name">
                           <strong style="color:#fff; font-size:17px;"><?php echo $oqlists->year; ?><strong>
							  
                         </div>    
                          
						<button class="nbtn btn-nana_cat col-lg-12 col-sm-12">Take a Look</button>
                    
                 
						<input type="hidden" name="organicquizid" value="<?php echo $oqlists->id; ?>">
						
				  </form>
				     
				    </div>
						
					</section>
				</div>
                  <?php } ?>
                  
            
                         
             
              </div>   
              <!-- page end-->
             
          </section>
		    
      </section>
      <!--main content end-->
 </section>

<?php  $this->load->view('tpl/footer'); ?>
     <?php  $this->load->view('tpl/js/main_js'); ?>
     <?php  $this->load->view('tpl/js/check_swich_js'); ?>
        
     <script src="<?php echo base_url();?>template/nanatharana/js/tasks.js" type="text/javascript"></script>




    <script>
      jQuery(document).ready(function() {
          TaskList.initTaskWidget();
      });

      $(function() {
          $( "#sortable" ).sortable();
          $( "#sortable" ).disableSelection();
      });

    </script>
</body>
</html>