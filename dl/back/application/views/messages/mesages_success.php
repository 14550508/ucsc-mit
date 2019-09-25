
                
 
<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container" class="sidebar-closed">
<?php 
if($this->session->userdata('is_logged_in') == TRUE )
		{
$this->load->view('tpl/student_menu1'); 
}

else {

$this->load->view('tpl/student_menu1'); 
}

?>


    <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
              <section class="panel">
           <div class="panel-body">
		 
                          
        <div class="col-md-8">
                
			 <div class="alert alert-success"><?php echo  $message; ?></div>   
			
        </div>
		        <div class="col-md-4">
		
		</div>
   	</section>	
      
        </div>
		</div>
	</section>	
	</section>	
	</section>	
		
         
     <?php  $this->load->view('tpl/footer'); ?>
     <?php  $this->load->view('tpl/js/main_js'); ?>
     <?php  $this->load->view('tpl/js/check_swich_js'); ?>
     <script src="<?php echo base_url();?>template/nanatharana/js/form-component.js"></script>
  <script src="<?php echo base_url();?>template/nanatharana/js/jquery.stepy.js"></script>
   <script src="<?php echo base_url();?>template/nanatharana/js/advanced-form-components.js"></script>
     <script type="text/javascript">

          $(document).ready(function() {

              $(function(){
                  $('select').customSelect();
              });
          });


      </script>    
  </body>
</html>
 
 
 
				
                
