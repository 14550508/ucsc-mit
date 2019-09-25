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
        <h2 class="form-signin-heading">Sign in Now</h2>
        <div class="login-wrap">
		<?php if($errorM !=''){ ?>
		<div class="alert alert-block alert-danger fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
		<?php echo $errorM; ?>
		</div>
		
		<?php } ?>
            <label class="placeholder-text">Username</label> 
            
            <div class="">
                                          
            <input type="text" class="form-control" name="username"  placeholder="" autofocus>
            </div>
            
            <label class="span3"> Password </label>
           <div class="">
                                         
           <div class="span9">
               <input type="password" name="password"  class="form-control" placeholder=""></div>
           </div>
            <label class="checkbox">
               
                <span class="">
                    <a data-toggle="modal" href="#myModal"> How to access? </a>

                </span>
            </label>
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign in</button>
           
           

        </div>

          

      </form>

    </div>

<!-- Modal -->
<form class="form-signin" method="post" action="<?php echo base_url();?>users/requestpss">
          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
               
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">How to access?</h4>
                      </div>
                      <div class="modal-body">
                      <h3>Don't you have username and password?</h3>
                          <p>Please send us an email "dl@nanatharana.com"</p>
                          

                      </div>
                      <div class="modal-footer">
                         
                             </div>
                  </div>
              </div>
              
          </div>
           </form>
          <!-- modal -->
<?php  $this->load->view('tpl/copy_right'); ?>

<?php  $this->load->view('tpl/footer_lr'); ?>
          
  </body>
</html>