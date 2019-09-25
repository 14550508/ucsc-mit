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
	
	
        <form class="form-signin" method="post" action="<?php echo base_url();?>users/checkLogin">
        <h2 class="form-signin-heading">Sign in now</h2>
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
            <label class="checkbox">
                <input type="checkbox" value="remember-me"> Remember me
                <span class="pull-right">
                    <a data-toggle="modal" href="#myModal"> Forgot Password?</a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
           
            <div class="registration">
                Don't have an account yet?
                <a class="" href="registration">
                    Create an account
                </a>
            </div>

        </div>

          

      </form>
	  
	  
	  
	   <form class="form-signin" method="post"  action="<?php echo base_url();?>users/updatepassword">
                      <br/>
                          <b> Enter your new password.</b>
                         <div class="form-group">
                            
                            <div class="col-lg-5">
                                <input type="text" class="form-control1" placeholder="" name="password" />
                                <input type="hidden" required name="pkey" value="<?php echo $key; ?>" autocomplete="off" class="form-control placeholder-no-fix">
<br/>
                            </div>
                        
                          
<div class="col-lg-3">
  <button type="submit" class="btn btn-blue6" name="signup" value="Update">Update</button>
</div>
  
  </div>
                       
                       
                      
                  </form>
	  
	  
	  
	  
	  

    </div>


<?php  $this->load->view('tpl/copy_right'); ?>

<?php  $this->load->view('tpl/footer_lr'); ?>
          
  </body>
</html>
