 <header class="header white-bg">
          
               <header class="header white-bg">
         
          <!--logo start-->
          <a href="<?php echo base_url();?>" class="logo" ><img src="<?php echo base_url(); ?>img/logo1.png"/></a>
          <!--logo end-->
                   <div class="top-nav ">
              <ul class="nav pull-right top-menu">
              
              <li class="signup"><a  href="<?php echo base_url();?>enroll/index" >My Papers</a></li>
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                         <?php if($userdatas[0]->stp_profile_pic =='' || $userdatas[0]->stp_profile_pic ==0){ ?> 
                              
                              <img src="<?php echo base_url();?>profiles/nana_profile_pic.jpg" width="25px" alt="">
                              
                             <?php  }else { ?>
                              
                                  <img src="<?php echo base_url();?>profiles/<?php echo $userdatas[0]->stp_profile_pic; ?>" width="25px" alt="">
                                  
                            <?php } ?>      
                          <span class="username"><?php echo $this->session->userdata('stp_fname'); ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="<?php echo base_url();?>students"><i class=" fa fa-home"></i>My Home</a></li>
						  	<li ><a href="<?php echo base_url(); ?>enroll/index" > <i class="fa fa-cloud-upload"></i>My Papers</a></li>
                          
                          <li><a href="<?php echo base_url();?>students/profile"><i class="fa fa-user"></i> My profile</a></li>
                          <li><a href="<?php echo base_url();?>users/logout"><i class="fa fa-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
                 
              </ul>
          </div>
      </header>
      <!--header end-->
      
         
      </header>
      <!--header end-->