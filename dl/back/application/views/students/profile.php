<?php  $this->load->view('tpl/head'); ?>
 
<body class="">
    
 <section id="container">
     <?php $this->load->view('tpl/student_menu'); ?>

      <?php $this->load->view('tpl/ads_bar'); ?>

      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <!-- page start-->
              <div class="row">
                  <aside class="profile-nav col-lg-3">
                      <section class="panel">
                          <div class="user-heading round" style="background:<?= $userdatas[0]->bgColor;?>">
                              <a href="#">
                              <?php if($userdatas[0]->stp_profile_pic =='' || $userdatas[0]->stp_profile_pic ==0){ ?> 
                              
                              <img src="<?php echo base_url();?>profiles/nana_profile_pic.jpg" alt="">
                              
                             <?php  }else { ?>
                              
                                  <img src="<?php echo base_url();?>profiles/<?php echo $userdatas[0]->stp_profile_pic; ?>" alt="">
                                  
                            <?php } ?>      
                              </a>
                              <h1><?php echo $users[0]->stp_fname; ?> <?php echo $users[0]->stp_lname; ?></h1>
                              <p><?php echo $userdatas[0]->st_school_name; ?></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
						  <li><a href="<?php echo base_url();?>students/index"> <i class="fa fa-home"></i> My Home</a></li>
                              <li class="active"><a href="<?php echo base_url();?>students/profile"> <i class="fa fa-user"></i> My Profile</a></li>
                                  
                            
                               <li><a href="<?php echo base_url();?>students/editProfile"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      
                      <section class="panel">
                          <div class="bio-graph-heading">
                              <?php echo $userdatas[0]->stp_aboutus; ?>
                          </div>
                          <div class="panel-body bio-graph-info">
                              <h1>Bio Graph</h1>
                              <div class="row">
                                  <div class="bio-row">
                                      <p><span>School </span>: <?php echo $userdatas[0]->st_school_name; ?></p>
                                  </div>
								  <div class="bio-row">
                                      <p><span>Town </span>: <?php echo $userdatas[0]->stp_town; ?></p>
                                  </div>
                                  
								  
                                  <div class="bio-row">
                                      <p><span>Birthday</span>: <?php echo $userdatas[0]->stp_dob; ?></p>
                                  </div>                                  
                                 
                                  
                                  
								  <div class="bio-row">
                                      <p><span>Country </span>: <?php echo $userdatas[0]->stp_country; ?></p>
                                  </div>
								  
								  
                              </div>
                          </div>
                      </section>
                 
                  </aside>
              </div>

              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
      
      <?php $this->load->view('tpl/online_friends'); ?>  
      
<?php  $this->load->view('tpl/footer'); ?>
      <?php  $this->load->view('tpl/js/main_js'); ?>
      <script src="<?php echo base_url();?>template/nanatharana/assets/jquery-knob/js/jquery.knob.js"></script>
        <script>

      //knob
      $(".knob").knob();

  </script>
  </body>
</html>