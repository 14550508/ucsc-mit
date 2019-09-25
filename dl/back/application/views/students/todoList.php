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
							   <?php if($userdatas[0]->stp_profile_pic !="" || $userdatas[0]->stp_profile_pic !=0){?>
                                 <img src="<?php echo base_url();?>profiles/<?php echo $userdatas[0]->stp_profile_pic; ?>" alt="">
								 <?php }  
								 else {?>
								 <img src="<?php echo base_url();?>img/blankprofile.jpg" alt="">
								 <?php } ?>
                              </a>
                              <h1><?php echo $users[0]->stp_fname; ?> <?php echo $users[0]->stp_lname; ?></h1>
                              <p><?php echo $users[0]->email; ?></p>
                          </div>

                          <ul class="nav nav-pills nav-stacked">
                              <li ><a href="<?php echo base_url();?>students/profile"> <i class="fa fa-user"></i> Profile</a></li>
                              <li><a href="<?php echo base_url();?>students/recentActivity"> <i class="fa fa-calendar"></i> Recent Activity <span class="label label-danger pull-right r-activity">9</span></a></li>
                             
                              <li class="active"><a href="<?php echo base_url();?>students/todoList"> <i class="fa fa-bars"></i> To do list </a></li>
                              <li><a href="<?php echo base_url();?>students/progressTracker"> <i class="fa fa-signal"></i> Progress Tracker </a></li>
                               <li ><a href="<?php echo base_url();?>students/editProfile"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
				  <aside class="profile-nav col-lg-9">
                 <section class="panel tasks-widget">
                          <header class="panel-heading">
                              Todo list
                          </header>
                          <div class="panel-body">

                              <div class="task-content">

                                  <ul class="task-list">
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Flatlab is Modern Dashboard</span>
                                              <span class="badge badge-sm label-success">2 Days</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Fully Responsive & Bootstrap 3.0.2 Compatible</span>
                                              <span class="badge badge-sm label-danger">Done</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Daily Standup Meeting</span>
                                              <span class="badge badge-sm label-warning">Company</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Write well documentation for this theme</span>
                                              <span class="badge badge-sm label-primary">3 Days</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">We have a plan to include more features in future update</span>
                                              <span class="badge badge-sm label-info">Tomorrow</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Don't be hesitate to purchase this Dashbord</span>
                                              <span class="badge badge-sm label-inverse">Now</span>
                                              <div class="pull-right">
                                                  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Code compile and upload</span>
                                              <span class="badge badge-sm label-success">2 Days</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      <li>
                                          <div class="task-checkbox">
                                              <input type="checkbox" class="list-child" value=""  />
                                          </div>
                                          <div class="task-title">
                                              <span class="task-title-sp">Tell your friends to buy this dashboad</span>
                                              <span class="badge badge-sm label-danger">Now</span>
                                              <div class="pull-right hidden-phone">
                                                  <button class="btn btn-success btn-xs"><i class=" fa fa-check"></i></button>
                                                  <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                                  <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                                              </div>
                                          </div>
                                      </li>
                                      
                                  </ul>
                              </div>

                              <div class=" add-task-row">
                                  <a class="btn btn-success btn-sm pull-left" href="#">Add New Tasks</a>
                                  <a class="btn btn-default btn-sm pull-right" href="#">See All Tasks</a>
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
	   <script src="<?php echo base_url();?>template/nanatharana/js/common-scripts.js"></script>
    <script src="<?php echo base_url();?>template/nanatharana/js/tasks.js" type="text/javascript"></script>




    <script>
      jQuery(document).ready(function() {
          TaskList.initTaskWidget();
      });

      $(function() {
          $( "#sortable" ).sortable();
          $( "#sortable" ).disableSelection();
      });

    </script>
      <script src="<?php echo base_url();?>template/nanatharana/assets/jquery-knob/js/jquery.knob.js"></script>
        <script>

      //knob
      $(".knob").knob();

  </script>
  </body>
</html>