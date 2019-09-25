   <section id="main-content">

            <section class="wrapper site-min-height">
                <!-- page start-->
                <div class="row">
                    <div class="col-md-8">
                        <section class="panel">
                              
                            <div class="cover-photo">
                             <div id="cover-photo">
                                 <?php if( $userData[0]->u_id  == $this->session->userdata('user_id')){ ?>
                                    <div id="caverUpdate" style="display: show;">
                                         <div id="caverUploadModalView"> <i class="fa fa-camera"> </i><span class="cavertext"> Change Caver Picture</span> </div>
                                      </div>
                                    <?php } ?>
                              </div>
                                <div class="fb-timeline-img" >
                                   <?php  if($userData[0]->cover_pic ==""){  ?>
                                      <img src="<?=base_url() ?>uploads/caver_pic/nana_def_cover.jpg" height="320px" alt="">
                                    <?php } else{?>
                                    <img src="<?=base_url() ?>uploads/caver_pic/<?= $userData[0]->cover_pic; ?>" height="340px" alt="">

                                     <?php } ?>
                                </div>
                                <div class="fb-name">
                                    <h2> <a><?= $userData[0]->stp_fname; ?> <?= $userData[0]->stp_lname; ?></a></h2>
                                </div>
                            </div>
                            <div class="panel-body">
                          
                                <div class="profile-thumb" id="profile-thumb">
                                <div id="profielPicimage">   

                              <?php if($userData[0]->stp_profile_pic !=="") { ?>                               
                                  <img src="<?= base_url();?>uploads/profile_pic/<?= $userData[0]->stp_profile_pic; ?>" alt="" />
                              <?php } else { ?>
                                  <img src="<?= base_url();?>uploads/profile_pic/empty.png" alt="" />

                              <?php } ?>

                                </div>
                                    
                                    <?php if( $userData[0]->u_id  == $this->session->userdata('user_id')){ ?>
                                    <div id="profileUpdate" style="display: show;">
                                         <div id="uploadModalView"> <i class="fa fa-camera"> </i> Change Profile Picture</div>
                                      </div>
                                    <?php } ?>

                                </div>

                              <!--   user menu -->

                               <?php $this->load->view('users/profileMenu'); ?>
                            </div>
                        </section>

                    
                     

                        <div id="about">
                        <div id="loader-icon" style="display: none;"><img src="<?= base_url();?>public/img/loader.gif"> </div>
                          <section class="panel">
                          <?php if($userData[0]->u_id == $this->session->userdata('user_id') && $userData[0]->user_type == 1) { ?>
                          <div class="bio-graph-heading" style="font-size: 60px;">
                             <i class="fa fa-trophy"> Rank</i>  <?= $rank; ?>
                          </div>

                          <?php } ?>
                          <header class="panel-heading">
                             <h4><strong> Overview </strong></h4>
                            <?php if($userData[0]->u_id == $this->session->userdata('user_id')) { ?> 
                              <span class="pull-right" style="margin-top: -35px">
                               <a id="overviewEdit" class="btn btn-default"><i class="fa fa-pencil"> </i></a>
                               <span id="overviewSaveBtn" style="display: none;">
                                 <a id="overviewSave" class="btn btn-success"><i class="fa fa-save"> </i></a>
                               </span>
                             </span>
                             <?php } ?>
                             
                          </header>
                          <div class="panel-body bio-graph-info">
                            
                              <div class="row" id="overview">
                                  <div class="bio-row">
                                    <p><span><strong>First Name </strong></span>: 
                                      <span id="overviewLable" > <?= $userData[0]->stp_fname; ?> </span>                               
                                      <input type="hidden" class="" id="stp_fname" value="<?= $userData[0]->stp_fname; ?>">
                                    </p>
                                  </div>

                                  <div class="bio-row">
                                    <p><span><strong>Last Name </strong></span>:
                                      <span id="overviewLable" > <?= $userData[0]->stp_lname; ?> </span>
                                      <input type="hidden" class="" id="stp_lname" value="<?= $userData[0]->stp_lname; ?>">
                                    </p>
                                  </div>

                                  <div class="bio-row">
                                      <p><span><strong>Middle Name </strong> </span>:                                       
                                       <span id="overviewLable" > <?= $userData[0]->stp_mname; ?> </span>
                                       <input type="hidden" class="" id="stp_mname" value="<?= $userData[0]->stp_mname; ?>">
                                      </p>
                                  </div>

                                  <div class="bio-row">
                                      <p><span><strong>Birthday </strong></span>:                                       
                                       <span id="overviewLable" > <?= $userData[0]->stp_dob; ?> </span>
                                       <input type="hidden" class="datepicker" id="stp_dob" value="<?= $userData[0]->stp_dob; ?>">
                                      </p>                                      
                                  </div>

                                  <div class="bio-row">
                                      <p><span><strong>Gender </strong></span>:                                       
                                       <span id="overviewLable" > <?php echo  $userData[0]->stp_gender == 1 ?  'Male' : 'Female' ?> </span>

                                       <span id="stp_gender_span" style="display: none;">
                                        <select id="stp_gender" class="select2" style="width: 165px; margin-bottom: -5px;" >
                                          <option value="<?= $userData[0]->stp_gender; ?>"><?php echo  $userData[0]->stp_gender == 1 ?  'Male' : 'Female' ?></option>

                                         <?php echo  $userData[0]->stp_gender == 1 ?  '<option value="0"> Female</option> ' : '<option value="1">Male</option>'  ?>
                                          
                                                                                  
                                       </select> 
                                         

                                       </span>
                                       
                                      </p>  
                                   
                                  </div>


                                  <div class="bio-row">                                     
                                       <p><span><strong>Email </strong></span>:                                       
                                         <span id="overviewLable" > <?= $userData[0]->email; ?> </span>
                                         <input type="hidden" class="" disabled="disabled" id="email" value="<?= $userData[0]->email; ?>">
                                      </p>
                                  </div>
                                 <?php  if($userData[0]->u_id == $this->session->userdata('user_id')) { ?>
                                    <div class="bio-row">
                                         <p><span><strong>Mobile </strong></span>:                                       
                                         <span id="overviewLable" > <?= $userData[0]->stp_mobile; ?> </span>
                                         <input type="hidden" class="" id="stp_mobile" value="<?= $userData[0]->stp_mobile; ?>">
                                         </p>                                       
                                    </div>
                                    <div class="bio-row">
                                         <p><span><strong>Phone </strong></span>:                                       
                                         <span id="overviewLable" > <?= $userData[0]->stp_telephone; ?> </span>
                                         <input type="hidden" class="" id="stp_telephone" value="<?= $userData[0]->stp_telephone; ?>">
                                         </p>   
                                        
                                    </div>
                                  <?php } ?>
                              </div>
                             
                          </div>
                      </section> 

                       <section class="panel">
                         
                          <header class="panel-heading">
                           <h4><strong> Education </strong></h4>
                             <?php if($userData[0]->u_id == $this->session->userdata('user_id')) { ?> 
                               <span class="pull-right" style="margin-top: -35px">
                               <a id="educationEdit" class="btn btn-default"><i class="fa fa-pencil"> </i></a>
                               <span id="educationSaveBtn" style="display: none;">
                                 <a id="educationSave" class="btn btn-success"><i class="fa fa-save"> </i></a>
                               </span>
                               </span>
                            <?php } ?>
                          </header>
                          <div class="panel-body bio-graph-info">
                            
                             
                             
                               <div class="row" id="education">
                                  <div class="bio-row">
                                    <p><span><strong>High School </strong></span>:                                       
                                      <span id="educationLable" > <?= $userData[0]->stp_school_name; ?> </span>
                                      <input type="hidden" class="" id="stp_school_name" value="<?= $userData[0]->stp_school_name; ?>">
                                    </p>   
                                  </div>
                                  <div class="bio-row">
                                    <p><span><strong>College </strong></span>:                                       
                                      <span id="educationLable" > <?= $userData[0]->stp_college; ?> </span>
                                      <input type="hidden" class="" id="stp_college" value="<?= $userData[0]->stp_college; ?>">
                                    </p>  
                                  </div>
                                 <!--  <div class="bio-row">
                                    <p><span><strong>Next Exam </strong></span>:                                       
                                      <span id="educationLable" > <?= $userData[0]->s_next_exam; ?> </span>
                                      <input type="hidden" class="" id="s_next_exam" value="<?= $userData[0]->s_next_exam; ?>">
                                    </p>  
                                  </div>        -->                         
                              </div>
                          </div>
                      </section> 


                       <section class="panel">
                         
                          <header class="panel-heading">
                             <h4><strong>Location </strong></h4>
                            <?php if($userData[0]->u_id == $this->session->userdata('user_id')) { ?> 
                             <span class="pull-right" style="margin-top: -35px">
                               <a id="locationEdit" class="btn btn-default"><i class="fa fa-pencil"> </i></a>
                                <span id="locationSaveBtn" style="display: none;">
                                 <a id="locationSave" class="btn btn-success"><i class="fa fa-save"> </i></a>
                               </span>
                             </span>
                             <?php } ?>
                              
                          </header>
                          <div class="panel-body bio-graph-info">
                            
                             
                             
                               <div class="row" id="location">
                                  <div class="bio-row" id="location">
                                     
                                       <p><span><strong>Country </strong></span>:                                       
                                         <span id="locationLable" > <?= $countryName; ?> </span>
                                         <span id="cunteryLoad" style="display: none;">
                                           
                                              <input type="text" value="" id="stp_country" style="width: 150px" >
                                         </span>
                                        
                                      </p>

                                  </div>
                                  <div class="bio-row">
                                      
                                      <p><span><strong>State </strong></span>:                                       
                                         <span id="locationLable" > <?= $stateName; ?> </span>
                                         <span id="stateLoad" style="display: none;">                                           
                                              <input type="text" value="" id="stp_state" style="width: 150px" >
                                         </span>
                                        
                                      </p>
                                  </div>
                                  <div class="bio-row">
                                     <p><span><strong>Town </strong></span>:                                       
                                         <span id="locationLable" > <?= $townName; ?> </span>
                                         <span id="townLoad" style="display: none;">                                           
                                              <input type="text" value="" id="stp_town" style="width: 150px" >
                                         </span>
                                        
                                      </p>
                                  </div>                                
                              </div>
                          </div>
                      </section> 


                        </div>
                         
                      
                          
             

                    </div>

                    <div class="col-md-3">
                    <div class="panel">
                                      
                        <div class="panel-heading"> <strong>Sponsored </strong>   <span class="pull-right" style="font-size: 14px;"><a href="">Create Ad</a></span></div>

                          <div class="panel-body">       

                           
                      </div>
     

                    </div>
                      
                       
                    </div>
                </div>
                <!-- page end-->
            </section>
   </section>

