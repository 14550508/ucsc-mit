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

        
       
          
           <section class="panel form-signin">
                  <h2 class="form-signin-heading">Sign Up</h2>
                         
                          <div class="panel-body">
                             
                                  
                                      <form class="form-signin" id="signup" method="post" action="<?php echo base_url();?>users/registrationPro">
        <div class="">
            <div class="form-group">
				<label class="col-lg-12" >First Name</label> 
					<div class="col-lg-12">
					<input type="text" name="stp_fname" required class="form-control"  >
				
				</div>
			</div>
			
			<div class="form-group">
				<label class="col-lg-12">Last Name</label> 
					<div class="col-lg-12">
					<input type="text" name="stp_lname" required class="form-control"  >
					</div>
			 </div> 
			  
			  <div class="form-group">
					<label class="col-lg-12">Your Email</label> 
					  <div class="col-lg-12">
					  <input type="email" class="form-control" required  name="email" >
				
					</div>
			</div>
			<div class="form-group">
            <label class="col-lg-12">Password</label> 
				<div class="col-lg-12">
				<input type="password" name="password" required class="form-control">
				</div>
			</div>
			<div class="form-group">
            <label class="col-lg-12">Re-type Password</label> 
				<div class="col-lg-12">
				<input type="password" name="cpassword" required class="form-control">
				</div>
			</div>
			
			<div class="form-group">
<label class="col-lg-12 control-label" id="captchaOperation"></label>
<div class="col-lg-12">
<input type="text" class="form-control" name="captcha">
</div>
<small class="help-block col-lg-offset-3 col-lg-9" style="display: none;"></small>


</div>
	
			<div class="form-group">
            <label class="checkbox"></label>
			<div class="col-lg-12">
                <input type="checkbox" name="agree" value="agree this condition"> <a data-toggle="modal" href="#myModal">I agree to the Terms of Service</a>
            </div>
			
			
			</div>
			
				<div class="col-lg-12">&nbsp;</div>	
			
			<div class="form-group">
			<div class="col-lg-12">
            <input type="hidden" name="user_type" class="form-control" value="1"  >
            <button class="btn btn-lg btn-login btn-block" type="submit">Sign Up </button>
			
			
            <div class="registration">
                Already Registered.
                <a class="" href="<?php echo base_url();?>users">
                    Login
                </a>
            </div>
			</div>

        </div>

      </form>
                                 
                                 
                                  </div>
                                 

                          </div>
                      </section>
          
          
          
          
         

    </div>
 

<?php  $this->load->view('tpl/copy_right'); ?>
      
      <!-- Modal -->

          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
               
              <div class="modal-dialog">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                          <h4 class="modal-title">Terms of Service and Privacy Policy</h4>
                      </div>
                      <div class="modal-body">
                          <p>Terms of Service and Privacy Policy</p>
                         

                      </div>
                      <div class="modal-footer">
                         
                                     </div>
                  </div>
              </div>
              
          </div>
         
          <!-- modal -->
 

<?php  $this->load->view('tpl/footer_lr'); ?>

<script type="text/javascript">
$(document).ready(function() {
    // Generate a simple captcha
    function randomNumber(min, max) {
        return Math.floor(Math.random() * (max - min + 1) + min);
    };
    $('#captchaOperation').html([randomNumber(1, 10), '+', randomNumber(1, 20), '='].join(' '));

    $('#signup').formValidation({
        message: 'This value is not valid',
        icon: {
            valid: 'glyphicon fa fa-check',
            invalid: 'glyphicon fa fa-times-circle',
            validating: 'glyphicon fa fa-refresh'
        },
		live: 'disabled',
        fields: {
            stp_fname: {
                validators: {
                    notEmpty: {
                        message: 'The first name is required'
                    }
                }
            },
			
            stp_lname: {
                validators: {
                    notEmpty: {
                        message: 'The last name is required'
                    }
                }
            },
            
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The input is not a valid email address'
                    },
					 regexp: {
                            regexp: '^[^@\\s]+@([^@\\s]+\\.)+[^@\\s]+$',
                            message: 'The value is not a valid email address'
                        },
					remote: {
                        type: 'POST',
                        url: '<?= base_url();?>registration/check_email',
                        message: 'The email address you entered is already in use',
                        //delay: 1000
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'The password is required'
                    },
                    identical: {
                        field: 'cpassword',
                        message: 'The password and its confirm are not the same'
                    },
					 stringLength: {
                        min: 5,
                        max: 30,
                        message: 'The password must be more than 6 and less than 30 characters long'
                    },
                }
            },
			
			 cpassword: {
                validators: {
                    notEmpty: {
                        message: 'The confirm password is required'
                    },
                    identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
					 
                }
            },
           
            captcha: {
                validators: {
                    callback: {
                        message: 'Wrong answer',
                        callback: function(value, validator, $field) {
                            var items = $('#captchaOperation').html().split(' '), sum = parseInt(items[0]) + parseInt(items[2]);
                            return value == sum;
                        }
                    }
                }
            },
            agree: {
                validators: {
                    notEmpty: {
                        message: 'You must agree with the terms and conditions'
                    }
                }
            }
        }
    });
});
</script>

  </body>
</html>
