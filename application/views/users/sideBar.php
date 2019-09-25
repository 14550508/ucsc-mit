 <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                   
                  <li>
                      <a href="<?= base_url(); ?><?= $this->session->userdata('username'); ?>">
                      <?php if($profilePic !=="") { ?>                               
                                  <img src="<?= base_url();?>uploads/profile_pic/<?= $profilePic; ?>" alt=""  width="16px" /> 
                              <?php } else { ?>

                                 <i class="fa fa-user"></i>

                              <?php } ?>
                         
                          <span> <?= $this->session->userdata('fname'); ?> <?= $this->session->userdata('lname'); ?> </span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" title="" class="loadNotifi">
                          <i class="fa fa-bell-o"></i>
                          <span>Notifications</span>
                      </a>
                      <ul class="sub">
                         <div id="notification">
                           
                           
                         </div>
                          
                      </ul>
                  </li> 

                  <li class="sub-menu">
                      <a href="javascript:;" title="" class="loadRequestNotifi">
                          <i class="fa fa-rss"></i>
                          <span>Follower Requests</span>
                      </a>
                      <ul class="sub">
                          <div id="requestList">
                            
                            
                          </div>
                         
                          
                      </ul>
                  </li>    

            <?php if($userData[0]->u_id == $this->session->userdata('user_id') && $userData[0]->user_type == 1) { ?>
                   <li class="sub-menu">
                      <a href="javascript:;" title="" class="">
                          <i class="fa fa-question"></i>
                          <span>Quizzes</span>
                      </a>
                      <ul class="sub">
                           <li>
                              <a href="<?= base_url(); ?>quizzes/student/find/<?= $userData[0]->username; ?>">Find Quizzes</a>
                           </li>
                           <li>
                              <a href="<?= base_url(); ?>quizzes/student/enrolled/<?= $userData[0]->username; ?>">Enrolled Quizzes</a>
                           </li>

                           <li>
                              <a href="<?= base_url(); ?>quizzes/student/pending/<?= $userData[0]->username; ?>">Pending Quizzes</a>
                           </li>

                           <li>
                              <a href="<?= base_url(); ?>quizzes/student/completed/<?= $userData[0]->username; ?>">Completed Quizzes</a>
                           </li>
                      </ul>
                  </li> 

             <?php } ?>        
             
             <?php if($userData[0]->u_id == $this->session->userdata('user_id') && $userData[0]->user_type == 2) { ?>
                   <li class="sub-menu">
                      <a href="javascript:;" title="" class="">
                          <i class="fa fa-question"></i>
                          <span>Quizzes</span>
                      </a>
                      <ul class="sub">
                           <li>
                              <a href="<?= base_url(); ?>quizzes/teacher/list/<?= $userData[0]->username; ?>">My Quizzes</a>
                           </li>
                           <li>
                              <a href="<?= base_url(); ?>quizzes/student/enrolled/<?= $userData[0]->username; ?>">Enrolled Quizzes</a>
                           </li>

                           <li>
                              <a href="<?= base_url(); ?>quizzes/student/pending/<?= $userData[0]->username; ?>">Pending Quizzes</a>
                           </li>

                           <li>
                              <a href="<?= base_url(); ?>quizzes/student/completed/<?= $userData[0]->username; ?>">Completed Quizzes</a>
                           </li>
                      </ul>
                  </li> 

             <?php } ?>        

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->