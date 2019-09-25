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
                          <div class="user-heading round">
                              <a href="#">
                                  <img src="<?php echo base_url();?>profiles/<?php echo $userdatas[0]->stp_profile_pic; ?>" alt="">
                              </a>
                              <h1><?php echo $users[0]->stp_fname; ?> <?php echo $users[0]->stp_lname; ?></h1>
                              <p><?php echo $users[0]->email; ?></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li class="active"><a href="<?php echo base_url();?>students/profile"> <i class="fa fa-user"></i> Profile</a></li>
                                   <li><a href="<?php echo base_url();?>students/recentActivity"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
                              
                              <li><a href="<?php echo base_url();?>students/todoList"> <i class="fa fa-bars"></i> To do list </a></li>
                              <li><a href="<?php echo base_url();?>students/progressTracker"> <i class="fa fa-signal"></i> Progress Tracker </a></li>
                               <li><a href="<?php echo base_url();?>students/editProfile"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                  <aside class="profile-info col-lg-9">
                      
                      <section class="panel">
                          <div class="bio-graph-heading">
                              Aliquam ac magna metus. Nam sed arcu non tellus fringilla fringilla ut vel ispum. Aliquam ac magna metus.
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
                      <section>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="35" data-fgColor="#e06b7d" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="red">Envato Website</h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="63" data-fgColor="#4CC5CD" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="terques">ThemeForest CMS </h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="75" data-fgColor="#96be4b" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="green">VectorLab Portfolio</h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-lg-6">
                                  <div class="panel">
                                      <div class="panel-body">
                                          <div class="bio-chart">
                                              <input class="knob" data-width="100" data-height="100" data-displayPrevious=true  data-thickness=".2" value="50" data-fgColor="#cba4db" data-bgColor="#e8e8e8">
                                          </div>
                                          <div class="bio-desk">
                                              <h4 class="purple">Adobe Muse Template</h4>
                                              <p>Started : 15 July</p>
                                              <p>Deadline : 15 August</p>
                                          </div>
                                      </div>
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