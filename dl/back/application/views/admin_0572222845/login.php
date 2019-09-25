<?php  $this->load->view('tpl/head'); ?>
 <link href="<?php echo base_url();?>template/nanatharana/css/soon.css" rel="stylesheet">
<body class="cs-bg">
<section id="header">
    <div class="container">
        
         <header>
                <!-- HEADLINE -->
                <a class="logo floatless" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png"/></a>

              
            </header>
    </div>
</section>
    <div class="container">
	
	
        <form class="form-signin" method="post" action="<?php echo base_url();?>admin_0572222845/checkLogin">
        <h2 class="form-signin-heading">Administrator Sign In</h2>
        <div class="login-wrap">
		<?php if($errorM !=''){ ?>
		<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
		<?php echo $errorM; ?>
		</div>
		
		<?php } ?>
            <label class="placeholder-text">Email</label> 
            
            <div class="">
                                          
            <input type="text" class="form-control" name="username"  placeholder="" autofocus>
            </div>
            
            <label class="span3"> Password </label>
           <div class="">
                                         
           <div class="span9">
               <input type="password" name="password"  class="form-control" placeholder=""></div>
           </div>
            
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
           
           

        </div>

          

      </form>

    </div>


<?php  $this->load->view('tpl/copy_right'); ?>

<?php  $this->load->view('tpl/footer_lr'); ?>
          
  </body>
</html>
