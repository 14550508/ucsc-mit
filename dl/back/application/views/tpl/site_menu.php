<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
 
?>

<!--header start-->
    <header class="header-frontend">
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="fa fa-bars"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php echo base_url(); ?>img/logo.png"/></span></a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url(); ?>">Home</a></li>
                        <li><a href="<?php echo base_url(); ?>aboutUs">About</a></li>
                       
                        
                       <?php if($this->session->userdata('is_logged_in') !== TRUE){ ?>
                        
                        <li class="signin"><a href="<?php echo base_url(); ?>users" >Sign In </a></li>
						<?php } else { ?>
						<li class="signupt"><a href="<?php echo base_url(); ?>enroll/index" >Papers</a></li>
						 <li class="signup"><a href="<?php echo base_url(); ?>students/profile" >My Profile </a></li>
						  <li class="signin"><a href="<?php echo base_url(); ?>users/logout" >Logout</a></li>
						 <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </header>
    <!--header end-->