   <section id="main-content">

            <section class="wrapper site-min-height">
                <!-- page start-->
                <div class="row">
                    <div class="col-md-8">           

                    
                     

                      <div id="quizzes">
                        
                          <section class="panel">
                              <div class="panel-heading">
                                <div class="row">
                                    <div class="col-md-10">    
                                         <span style="font-size: 18px; font-weight: 500"><i class="fa fa-key"> </i> Enrolment Key </span> 
                                    </div>
                                    <div class="col-md-2"> 
                                    <a href="<?= base_url(); ?>quizzes/page/<?= $quizID; ?>" class="btn btn-warning">Cancel </a>
                                    </div>                                   
                                </div> 
                              </div>
                               
                              <div class="panel-body"> 
                              <?php if($this->session->flashdata('enrollError')){ ?>
                              <div class="alert alert-danger"><?= $this->session->flashdata('enrollError'); ?> </div>
                              <?php } ?>
                              <form action="<?= base_url(); ?>quizzes/keyCheck/<?= $quizID; ?>" method="POST" >                            
                                  <div class="input-group ">                                              
                                      <input type="text" id="eKey" required class="form-control">
                                      <span class="input-group-btn">
                                          <button type="submit"  class="btn btn-success"> Enroll </button>
                                      </span>
                                  </div>
                              </form>
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

