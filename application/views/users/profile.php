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
                                   <?php  if($userData[0]->cover_pic =="" || $userData[0]->cover_pic == 0){  ?>
                                      <img src="<?=base_url() ?>uploads/caver_pic/nana_def_cover.jpg" height="320px" alt="">
                                    <?php } else{?>
                                    <img src="<?=base_url() ?>uploads/caver_pic/<?= $userData[0]->cover_pic; ?>" height="340px" alt="">

                                     <?php } ?>
                                </div>
                                <div class="fb-name">
                                    <h2><a href="#"><?= $userData[0]->stp_fname; ?> <?= $userData[0]->stp_lname; ?></a></h2>
                                </div>
                            </div>
                            <div class="panel-body">
                          
                                <div class="profile-thumb" id="profile-thumb">
                                <div id="profielPicimage">   

                              <?php if($userData[0]->stp_profile_pic !=="" || $userData[0]->stp_profile_pic == '0') { ?>                               
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
                                
                                <?php  
                               
                                $this->load->view('users/profileMenu'); 
                                ?>

                            </div>
                      </section>
                       <?php if($userData[0]->user_type == 1) { ?>
                      <section class="panel">
                          <div class="weather-bg">
                              <div class="panel-body">
                                  <div class="row">
                                      <div class="col-xs-6">
                                        <i class="fa fa-trophy"></i> Rank
                                          
                                      </div>
                                      <div class="col-xs-6">
                                          <div class="degree">
                                              <?= $rank; ?>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <footer class="weather-category">
                              <ul>
                                  <li class="active">
                                      <h5>Points</h5>
                                      <?= $points; ?>
                                  </li>
                                  <li>
                                      <h5>Quizzes</h5>
                                     <?= $Tquiz; ?>
                                  </li>
                                  <li>
                                      <h5>Followes</h5>
                                      <?= $Tfollowers; ?>
                                  </li>
                              </ul>
                          </footer>
                      </section>

                      <?php } ?>

                  <div id="profileBody">
                        <?php if($userData[0]->u_id == $this->session->userdata('user_id')) { ?> 
                      <section class="panel profile-info">

                        <div class="alert alert-success alert-dismissable" id="alert-success" style="display: none;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                             
                             </div>


                        <div class="alert alert-warning alert-dismissable" id="alert-warning" style="display: none;">
                          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                              <div id="WmsgImgUp"> </div>
                             </div>
                      <form method="post" id="uploadImageForm">
                            <div id="textInputView">
                                <textarea class="form-control input-lg p-text-area" rows="2" id="postText" placeholder="Do you have any questions ?"></textarea>
                            </div> 

                            <div id="imageUploadView" style="display: none;">
                              <div class="fileupload fileupload-new" data-provides="fileupload" style="padding: 15px">
                                    <div class="fileupload-new thumbnail"  id="oldImage" style="width: 100px; height: 75px">
                                          <img src="<?= base_url(); ?>public/img/default.png" alt="" />
                                    </div>
                                    <div>
                                      <span class="btn btn-white btn-file"> 
                                        <input type="file" id="file" name="file" class="default" />
                                      </span>
                                        <a  id="delete" class="btn btn-danger " style="display: none;" ><i class="fa fa-trash"></i> Delete</a>
                                        <input type="hidden" id="uploadfile" name="uploadfile" />
                                    </div>
                               </div>
                            </div>

                            <div class="" style="width: 200px; padding: 10px;">
                              <div class="progress"  style="display: none" >
                                <div class="progress-bar" id="progressbar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 20%">
                                </div>
                              </div>                                                
                            </div>    
                               
                            <footer class="panel-footer">                            
                              <div class="row">
                                  <div class="col-md-3">
                                    <ul class="nav nav-pills">
                                      <li>
                                        <a id="textInput">
                                          <i class="fa fa-text-width" title="Text"></i>
                                        </a>
                                      </li>
                                      <li>
                                        <a id="imageUpload">
                                          <i class="fa fa-camera" title="Picture"></i>
                                        </a>
                                      </li>
                                    </ul>                                 
                                  </div>

                                  <div class="col-md-9">
                                    <div class="form-inline pull-right">
                                      <div class="form-group"> 
                                       
                                       <!--  <input type="" id="quizCatList" class="form-control select2" name=""> -->
                                          <button type="button" class="btn btn-success" id="postSubmit">
                                           Post 
                                          </button>
                                      </div> 
                                    </div>
                                  </div>
                              </div>
                            </footer>
                          </form>
                        </section>
                        <?php  } ?>
                    </div>

                    

                        <div id="posts"></div>
                          <div id="loader-icon" style="display: none;"><img src="<?= base_url();?>public/img/loader.gif"> </div>
                        <div id="postsload"></div>
                          
             

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

