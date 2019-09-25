   <section id="main-content">

            <section class="wrapper site-min-height">
                <!-- page start-->
                <div class="row">
                    <div class="col-md-8">
                           <section class="panel">
                              
                            <div class="cover-photo">
                             <div id="cover-photo">
                                 <?php if( $quizData[0]->createBy  == $this->session->userdata('user_id')){ ?>
                                    <div id="caverUpdate" style="display: show;">
                                         <div id="caverUploadModalView"> <i class="fa fa-camera"> </i><span class="cavertext"> Change Caver Picture</span> </div>
                                      </div>
                                    <?php } ?>
                              </div>
                                <div class="fb-timeline-img" >
                                   <?php  if($quizData[0]->qz_cover_pic ==""){  ?>
                                      <img src="<?=base_url() ?>uploads/caver_pic/nana_def_cover.jpg" height="320px" alt="">
                                    <?php } else{?>
                                    <img src="<?=base_url() ?>uploads/caver_pic/<?= $quizData[0]->qz_cover_pic; ?>" height="340px" alt="">

                                     <?php } ?>
                                </div>
                                <div class="fb-name">
                                    <h2> <a><?= $quizData[0]->qz_name; ?> </a></h2>
                                </div>
                            </div>
                            <div class="panel-body">
                          
                                <div class="profile-thumb" id="profile-thumb">
                                <div id="profielPicimage">   

                              <?php if($quizData[0]->qz_into_image !=="") { ?>                               
                                  <img src="<?= base_url();?>uploads/profile_pic/<?= $quizData[0]->qz_into_image; ?>" alt="" />
                              <?php } else { ?>
                                  <img src="<?= base_url();?>uploads/profile_pic/empty.png" alt="" />

                              <?php } ?>

                                </div>
                                    
                                    <?php if( $quizData[0]->createBy  == $this->session->userdata('user_id')){ ?>
                                    <div id="profileUpdate" style="display: show;">
                                         <div id="uploadModalView"> <i class="fa fa-camera"> </i> Change Profile Picture</div>
                                      </div>
                                    <?php } ?>

                                </div>

                              <!--   quiz menu -->

                               <?php $this->load->view('quiz/quizMenu'); ?>
                            </div>
                        </section>
                    
                     

                        <div id="about">
                        <div id="loader-icon" style="display: none;"><img src="<?= base_url();?>public/img/loader.gif"> </div>
                          <section class="panel">
                          <div class="bio-graph-heading">
                              <?php
                               if($quizData[0]->qz_information !=""){
                                  echo $quizData[0]->qz_information; 
                               }
                              else{
                                      echo '';
                              }

                               ?>
                          </div>
                          <header class="panel-heading">
                             <h4> Overview </h4>
                            <?php if($quizData[0]->createBy == $this->session->userdata('user_id')) { ?> 
                              <span class="pull-right" style="margin-top: -35px">
                               <a id="overviewEdit" class="btn btn-info"><i class="fa fa-pencil"> </i></a>
                               <span id="overviewSaveBtn" style="display: none;">
                                 <a id="overviewSave" class="btn btn-success"><i class="fa fa-save"> </i></a>
                               </span>
                             </span>
                             <?php } ?>
                             
                          </header>
                          <div class="panel-body bio-graph-info">
                            
                              <div class="row" id="overview">
                                  <div class="col-md-6">
                                  <ul class="nav nav-pills nav-stacked">
                                    <p><span>Category </span>: 
                                      <span id="overvie" > <?= $quizData[0]->qz_cat_name; ?> </span>                               
                                     
                                    </p>
                                  </div>

                                  <div class="col-md-6">
                                    <p><span>Create By </span>:
                                      <span id="overview" > <?= $quizData[0]->stp_fname; ?> <?= $quizData[0]->stp_lname; ?> </span>                                 
                                    </p>
                                  </div>                            

                                 <div class="col-md-6">
                                      <p><span>Create Date </span>:                                       
                                       <span id="overviewLable" > <?= $quizData[0]->start_quiz; ?> </span>
                                       <input type="hidden" class="datepicker" id="start_quiz" value="<?= $quizData[0]->start_quiz; ?>">
                                      </p>                                      
                                  </div>

                                <div class="col-md-6">
                                      <p><span>Medium </span>:                                       
                                       <span id="overviewLable" > <?php echo  $quizData[0]->medium; ?> </span>

                                       <span id="medium" style="display: none;">
                                        <select id="medium" class="select2" style="width: 165px; margin-bottom: -5px;" >
                                          <option value="<?= $quizData[0]->medium; ?>"><?php echo  $quizData[0]->medium; ?></option>
                                          <option value="Sinhala Medium">Sinhala Medium</option>
                                          <option value="English Medium">English Medium</option>
                                       </select>
                                       </span>
                                      </p> 
                                </div>


                                 <div class="col-md-6">                               
                                       <p><span>Points </span>:                                       
                                         <span id="overviewLable" > <?= $quizData[0]->total_points; ?> </span>
                                         <input type="hidden" class=""  id="total_points" value="<?= $quizData[0]->total_points; ?>">
                                      </p>
                                  </div>

                                  <div class="col-md-6">                               
                                       <p><span>Attempts </span>:                                       
                                         <span id="overviewLable" > <?= $quizData[0]->attempts_allowed; ?> </span>
                                         <input type="hidden" class=""  id="attempts_allowed" value="<?= $quizData[0]->attempts_allowed; ?>">
                                      </p>
                                  </div>

                                   <div class="col-md-6">                               
                                       <p><span>Totla Enrolled </span>:                                       
                                         <span id="overviewLable" > <?= $totlaEnrolled; ?> </span>
                                       
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

