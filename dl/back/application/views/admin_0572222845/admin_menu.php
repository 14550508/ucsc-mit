 <header class="header white-bg">
          
               <header class="header white-bg">
         
          <!--logo start-->
          <a href="<?php echo base_url();?>" class="logo" ><img src="<?php echo base_url(); ?>img/logo.png"/></a>
          <!--logo end-->
                   <div class="top-nav ">
              <ul class="nav pull-right top-menu">
                  <li>
                      <input type="text" class="form-control search" placeholder="Search">
                  </li>
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                          
                          <span class="username"><?php echo $this->session->userdata('stp_fname'); ?></span>
                          <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>
                          <li><a href="<?php echo base_url();?>students"><i class=" fa fa-home"></i>Home</a></li>
                          <li><a href="<?php echo base_url();?>students/profile"><i class="fa fa-cog"></i> Profile</a></li>
                          <li><a href="<?php echo base_url();?>billing"><i class="fa fa-bell-o"></i> Billing</a></li>
                          <li><a href="<?php echo base_url();?>users/logout"><i class="fa fa-key"></i> Log Out</a></li>
                      </ul>
                  </li>
                  <!-- user login dropdown end -->
                  <li class="sb-toggle-right">
                      <i class="fa  fa-align-right"></i>
                  </li>
              </ul>
          </div>
      </header>
      <!--header end-->
      
         
      </header>
      <!--header end-->