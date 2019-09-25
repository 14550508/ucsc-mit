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
                  <?php $this->load->view('quiz/quizMenu'); ?>
               </div>
            </section>
            <div id="quizzes">
               <section class="panel">
                  <div class="panel-heading">
                     <div class="row">
                        <div class="col-md-6">    
                           <span style="font-size: 18px; font-weight: 500"><i class="fa fa-check-square"> </i> My result</span> 
                        </div>
                        <div class="col-md-6">
                           <span class="pull-right">
                              <div class="input-group ">                                              
                                 <input type="text" id="myQuiz" class="form-control">
                                 <span class="input-group-btn">
                                 <button type="button" class="btn btn-white"><i class="fa fa-search"></i></button>
                                 </span>
                              </div>
                           </span>
                        </div>
                     </div>
                  </div>
                  <div class="panel-body">
                     <div id="mqdLoad">
                        <div id="loader-icon" style="display: none;"><img src="<?= base_url();?>public/img/loader.gif"> 
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
