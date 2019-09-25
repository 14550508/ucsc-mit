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
                             
                              <li><a href="<?php echo base_url();?>students/todoList"> <i class="fa fa-bars"></i> To do list </a></li>
                              <li><a href="<?php echo base_url();?>students/progressTracker"> <i class="fa fa-signal"></i> Progress Tracker </a></li>
                               <li class="active"><a href="<?php echo base_url();?>students/editProfile"> <i class="fa fa-edit"></i> Edit profile</a></li>
                          </ul>

                      </section>
                  </aside>
                    <aside class="profile-info col-lg-9">
                      <section class="panel">
                        
                          <div class="panel-body bio-graph-info">
						  <?php if($successM !=''){ ?>
		<div class="alert alert-block alert-success fade in">
                                  <button data-dismiss="alert" class="close close-sm" type="button">
                                      <i class="fa fa-times"></i>
                                  </button>
		<?php echo $successM; ?>
		</div>
		
		<?php } ?>
						  
                              <h1> Profile Info</h1>
                              <form class="form-horizontal" role="form" action="<?php echo base_url();?>students/profileEdit" method="post" enctype="multipart/form-data">
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">About Me</label>
                                      <div class="col-lg-10">
                                          <textarea name="stp_aboutus" id="stp_aboutus"  class="form-control" cols="30" rows="4"><?php echo $userdatas[0]->stp_aboutus; ?> </textarea>
                                      </div>
                                  </div>
								  <?php if ($this->session->userdata('user_type') != 1){ ?>
								       <div class="form-group">
									  <label class="col-lg-2 control-label">Title</label>
                                          <div class="col-lg-6">
                                              <select class="form-control"  name="tp_title">      
                                                   <option value="<?php echo $userdatas[0]->tp_title; ?>"> <?php echo $userdatas[0]->tp_title; ?> </option>
                                                  <option value="Mr">Mr </option>
                                                  <option value="Ms">Ms </option>
                                                  <option value="Dr">Dr </option>
								                </select>
								           </div>
										   </div>
								  <?php } ?>
								  
                                  
								   <div class="form-group">
                                      <label  class="col-lg-2 control-label">Middle Name</label>
                                      <div class="col-lg-6">
                                          <input type="text" class="form-control" value="<?php echo $userdatas[0]->stp_mname; ?>" id="m-name" name="stp_mname" placeholder=" ">
                                      </div>
                                  </div>
                                  
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">School</label>
                                      <div class="col-lg-6">
                                          <input type="text" value="<?php echo $userdatas[0]->st_school_name; ?>" name="st_school_name" class="form-control" id="c-name" placeholder=" ">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Birthday</label>
                                      <div class="col-lg-6">
                                          <input type="date" name="stp_dob" value="<?php echo $userdatas[0]->stp_dob; ?>" class="form-control" id="b-day" placeholder=" ">
                                      </div>
                                  </div>
								  
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Occupation</label>
                                      <div class="col-lg-6">
                                          <input type="text" name="tp_job_title" value="<?php echo $userdatas[0]->tp_job_title; ?>" class="form-control" id="occupation" placeholder=" ">
                                      </div>
                                  </div>
								  
								   <div class="form-group">
                                      <label  class="col-lg-2 control-label">Working Place</label>
                                      <div class="col-lg-6">
                                          <input type="text" name="tp_working_place" value="<?php echo $userdatas[0]->tp_working_place; ?>" class="form-control" id="occupation" placeholder=" ">
                                      </div>
                                  </div>
								  
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Email</label>
                                      <div class="col-lg-6">
                                          <input type="text" disabled  name="email" value="<?php echo $users[0]->email; ?>" class="form-control" id="email" placeholder=" ">
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Mobile</label>
                                      <div class="col-lg-6">
                                          <input type="text"  name="stp_mobile" value="<?php echo $userdatas[0]->stp_mobile; ?>" class="form-control" id="mobile" placeholder=" ">
                                      </div>
                                  </div>
								   <div class="form-group">
                                      <label  class="col-lg-2 control-label">Telephone</label>
                                      <div class="col-lg-6">
                                          <input type="text"  name="stp_telephone" value="<?php echo $userdatas[0]->stp_telephone; ?>" class="form-control" id="mobile" placeholder=" ">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Street Add1</label>
                                      <div class="col-lg-6">
                                          <input type="text"  name="stp_street_add1" value="<?php echo $userdatas[0]->stp_street_add1; ?>" class="form-control" id="mobile" placeholder=" ">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Street Add2</label>
                                      <div class="col-lg-6">
                                          <input type="text"  name="stp_street_add2" value="<?php echo $userdatas[0]->stp_street_add2; ?>" class="form-control" id="mobile" placeholder=" ">
                                      </div>
                                  </div>
								  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Town/ City</label>
                                      <div class="col-lg-6">
                                          <input type="text"  name="stp_town" value="<?php echo $userdatas[0]->stp_town; ?>" class="form-control" id="mobile" placeholder=" ">
                                      </div>
                                  </div>
								   <div class="form-group">
                                      <label  class="col-lg-2 control-label">District</label>
                                      <div class="col-lg-6">
                                          <input type="text"  name="stp_district" value="<?php echo $userdatas[0]->stp_district; ?>" class="form-control" id="mobile" placeholder=" ">
                                      </div>
                                  </div>
								   <div class="form-group">
                                      <label  class="col-lg-2 control-label">Country</label>
                                      <div class="col-lg-6">
                                          <input type="text"  name="stp_country" value="<?php echo $userdatas[0]->stp_country; ?>" class="form-control" id="mobile" placeholder=" ">
                                      </div>
                                  </div>
								  <?php if ($this->session->userdata('user_type') != 1){ ?> 
								   <div class="form-group">
                                      <label  class="col-lg-2 control-label">NIC No</label>
                                      <div class="col-lg-6">
                                          <input type="text"  name="stp_NIC" value="<?php echo $userdatas[0]->stp_NIC; ?>" class="form-control" id="mobile" placeholder=" ">
                                      </div>
                                  </div>
								  <?php } ?>
								   <?php if ($this->session->userdata('user_type') == 3){ ?> 
								   <div class="form-group">
                                      <label  class="col-lg-2 control-label">p_parent_type</label>
                                      <div class="col-lg-6">
                                          <input type="text"  name="p_parent_type" value="<?php echo $userdatas[0]->p_parent_type; ?>" class="form-control" id="mobile" placeholder=" ">
                                      </div>
                                  </div>
								  <?php } ?>
                                  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Gender</label>
                                      <div class="col-lg-6">
									  
									  <?php if ($userdatas[0]->stp_gender == 1){ ?>
                                          <label class="label_radio" for="radio-09">
                                                  <input name="stp_gender" id="radio-09" class="boy" value="1" type="radio"  checked /> <i class="fa fa-male"> </i> 
                                              </label> &nbsp;&nbsp;&nbsp;&nbsp;
                                              <label class="label_radio" for="radio-10">
                                                  <input name="stp_gender" id="radio-10" class="girl" value="2" type="radio" /> <i class="fa fa-female"> </i> 
                                              </label>
                                              
                                           <?php } else { ?>   
                                              <label class="label_radio" for="radio-09">
                                                  <input name="stp_gender" id="radio-09" class="boy" value="1" type="radio"   /> <h3><i class="fa fa-male"> </i> </h3>
                                              </label>
                                              <label class="label_radio" for="radio-10">
                                                  <input name="stp_gender" id="radio-10" class="girl" value="2" checked type="radio" /> <h3><i class="fa fa-female"> </i> </h3>
                                              </label>
                                              <?php } ?>
                                      </div>
                                  </div>
								<?php if ($this->session->userdata('user_type') != 1){ ?>  
								   <div class="form-group">
                                      <label  class="col-lg-2 control-label">Relationship</label>
                                      <div class="col-lg-6">
                                          <input type="text"  name="stp_telephone" value="<?php echo $userdatas[0]->stp_relationship; ?>" class="form-control" id="mobile" placeholder=" ">
                                      </div>
                                  </div>
								<?php } ?>
								<div class="form-group">
                                          <label  class="col-lg-2 control-label">Change Avatar</label>
                                          <div class="col-lg-6">
										  <?php if($userdatas[0]->stp_profile_pic !="" || $userdatas[0]->stp_profile_pic !=0){?>
										  <img src="<?php echo base_url();?>profiles/<?php echo $userdatas[0]->stp_profile_pic; ?>" width="100" alt="">
                                            <?php } ?>  
											  <input type="file" name="stp_profile_pic" maxsize="500" class="file-pos" id="stp_profile_pic">
                                          </div>
                                      </div>
                                  <div class="form-group">
                                      <div class="col-lg-offset-2 col-lg-10">
                                          <button type="submit" class="btn btn-success">Save</button>
                                          <a href="<?php echo base_url();?>students" class="btn btn-default">Cancel</a>
                                      </div>
                                  </div>
                              </form>
                          </div>
                      </section>
                      <section>
                          <div class="panel panel-primary">
                              <div class="panel-heading"> Sets New Password & Name</div>
                              <div class="panel-body">
                                  <form class="form-horizontal" role="form" action="<?php echo base_url();?>students/newPassword" method="post" >
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Current Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" required name="oldPassword" class="form-control" id="c-pwd" placeholder=" ">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">New Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" name="newPassword" class="form-control" id="n-pwd" placeholder=" ">
                                          </div>
                                      </div>
                                      <div class="form-group">
                                          <label  class="col-lg-2 control-label">Re-type New Password</label>
                                          <div class="col-lg-6">
                                              <input type="password" name="confirmPassword" class="form-control" id="rt-pwd" placeholder=" ">
                                          </div>
                                      </div>
									  <div class="form-group">
                                      <label  class="col-lg-2 control-label">First Name</label>
                                      <div class="col-lg-6">
                                          <input type="text" required class="form-control" value="<?php echo $users[0]->stp_fname; ?>" id="f-name" name="stp_fname" placeholder=" ">
                                      </div>
                                  </div>
								  
								  <div class="form-group">
                                      <label  class="col-lg-2 control-label">Last Name</label>
                                      <div class="col-lg-6">
                                          <input type="text" required class="form-control" value="<?php echo $users[0]->stp_lname; ?>" id="l-name" name="stp_lname" placeholder=" ">
                                      </div>
                                  </div>

                                      

                                      <div class="form-group">
                                          <div class="col-lg-offset-2 col-lg-10">
                                              <button type="submit" class="btn btn-info">Save</button>
                                              <a href="<?php echo base_url();?>students" class="btn btn-default">Cancel</a>
                                          </div>
                                      </div>
                                  </form>
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