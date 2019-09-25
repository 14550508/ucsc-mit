 <!--header start-->
      <header class="header white-bg">

        <div class="row">
          <div class="col-md-2">
             <div class="sidebar-toggle-box">
                  <div data-original-title="Toggle Navigation" data-placement="right" class="fa fa-bars tooltips"></div>
            </div>
          
            <a href="<?= base_url()?>" class="logo" ><img src="<?= base_url()?>public/img/logo-active.png" width="40px"></a>

          </div>
        
          <!--logo end-->
          <div class="col-md-5 hidden-xs hidden-sm">
          <div id="mainSearch" > 
             <input type="text"  id="findUsers" class="form-control " size="100" placeholder="Find Teachers or Friends">

          </div> 
                  
          </div>
             

              <div class="col-md-4">    
          <div class="top-nav ">               
              <ul class="nav pull-right top-menu">
                  
                  
                  <li>                    
                  <div id="profileLinkImg">                    
                    <a href="<?= base_url(); ?>wall">  <strong id="home"><i class="fa fa-home"></i></strong>  </a>
                  </div>
                  </li>

                  <li>
                  <div id="profileLinkImg">                    
                    <a href="<?= base_url(); ?><?= $this->session->userdata('username'); ?>">

                             <?php if($profilePic !=="") { ?>                               
                                  <img src="<?= base_url();?>uploads/profile_pic/<?= $profilePic; ?>" alt=""  width="30px" />
                              <?php } else { ?>
                                  <img src="<?= base_url();?>uploads/profile_pic/empty.png" alt=""  width="30px" />

                              <?php } ?>

                    </a>
                  </div>               
                   
                  </li> 
                  <!-- user login dropdown start-->
                  <li class="dropdown">
                      
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                           
                           <strong id="lock"><i class="fa fa-unlock-alt"></i>  <b class="caret"></b>  </strong>
              
                         
                      </a>
                     
                      <ul class="dropdown-menu extended logout">
                          <div class="log-arrow-up"></div>                         
                         
                          <li><a href="#" data-toggle="modal" data-target="#changePasswordModal"  id="studentsSignup" ><i class="fa fa-key"></i> Change Password</a></li>
                         
                          <li><a href="<?= base_url(); ?>usersAuth/logout"><i class="fa fa-power-off"></i> Log Out</a></li>
                      </ul>
                      
                  </li>
                
              </ul>
          </div>
          </div>
          <div class="col-md-1">   </div>
        </div> <!-- row --> 
      </header>
      <!--header end-->
