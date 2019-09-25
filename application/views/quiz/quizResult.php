  <?php if( $quizResult !==""){ ?>
<section id="main-content sidebar-closed">
    <section class="wrapper site-min-height">

         <div class="row">
            <div class="col-md-9">
	    		 <section class="panel">
	    		    <header class="panel-heading"> <div class="row"><div class="col-md-7"><h4><?=  $quizResult[0]->qz_name; ?>   </h4></div> </header>
	    		 	 <div class="panel-body">
                         
                
                         <ul class="summary-list text-center">
                                          <li>
                                              <a >
                                                  <i class=" fa fa-question-circle text-success"></i>
                                                 <?=  $quizResult[0]->num_quetions; ?>  Totla Questions
                                              </a>
                                          </li>
                                          <li>
                                              <a >
                                                  <i class=" fa  fa-clock-o text-muted"></i>
                                                  <?=  $quizResult[0]->points; ?> Points
                                              </a>
                                          </li>
                                          <li>
                                              <a >
                                                  <i class="fa fa-thumb-tack text-info"></i>
                                                  <?= $quizResult[0]->qz_attempt; ?> Attempt
                                              </a>
                                          </li>
                                          
                                         
                                      </ul>
                   

	    		 	 </div>
	    		 </section>
            <section class="panel">
              <div class="panel-body">
              <a class="btn btn-default" href="<?= base_url();?>quizzes/start/<?=  $quizResult[0]->qz_id; ?>"> Start Again</a>
              <a class="btn btn-default" target="_blank" href="<?= base_url();?>quizzes/fullresult/?qz_id=<?=  $quizResult[0]->qz_id; ?>&attempts=<?= $quizResult[0]->qz_attempt; ?>&user_id=<?= $this->session->userdata('user_id'); ?>&qz_name=<?=  $quizResult[0]->qz_name; ?>"> View Full Result</a>
              <a class="btn btn-default" href="<?= base_url(); ?><?= $this->session->userdata('username'); ?>"> My Profile</a>
              </div>
             
            </section>

           <section class="panel">
                              <header class="panel-heading">
                                <h4> Result Summery </h4>
                              </header>
                              <div class="panel-body">
                                  <div id="hero-bar" class="graph"></div>

                                  <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-2 badge bg-primary" id="youM"></div>
                                    <div class="col-md-2 badge bg-success" id="maxM"></div>
                                    <div class="col-md-2 badge bg-waring" id="aveM"></div>
                                    <div class="col-md-2 badge bg-info" id="minM"></div>
                                    
                                  </div>
                              </div>


          </section>

                 

	        </div>

	         <div class="col-md-3">
                <div class="panel">
                    <div class="panel-heading"> <h4>Marks  </h4>    </div>
						<div class="panel-body">
                            
                    <?php

                      $preValue =  $quizResult[0]->points;
                           if($preValue <= 20){
                                 $bg = '#ec6459';
                             }
                             else if($preValue > 20 || $preValue <= 35){
                                 $bg = '#e4ba00';
                             }

                             else if($preValue > 35 || $preValue <= 50){
                                 $bg = '#8075c4';
                             }

                             else if($preValue > 50 || $preValue <= 65){
                                 $bg = '#53bee6';
                             }

                             else{
                                $bg = '#39b2a9';
                             }


                      ?>
                              
                              <div style="text-align: center;">
                               <div class="easy-pie-chart">
                                          <div class="percentage" data-percent="<?= $preValue;  ?>"><span style="font-size: 25px; font-weight: 600; color:<?= $bg ?>; "><?= $quizResult[0]->points;  ?></span ><span style="font-size: 25px; font-weight: 600; color:<?= $bg ?>; ">%</span></div>
                                      </div>
                                
                              </div>
                             
	            

							
						</div>
     			</div>
            </div>

	    </div>
    </section>
</section>

<?php } else { ?>

<section id="main-content sidebar-closed">
    <section class="wrapper site-min-height">

         <div class="row">
            <div class="col-md-9">
           <section class="panel">
              <div class="panel-heading"> <div class="row"><div class="col-md-7"><h4> Not Found !</h4></div> </div>
             <div class="panel-body">
                         
                
                      
                   

             </div>
           </section>

                 

          </div>

           <div class="col-md-3">
                <div class="panel">
                    <div class="panel-heading"> <strong>Marks  </strong>    </div>
            <div class="panel-body">
                            
                    <?php  $marks =  0; ?>
                               <div id="topPost"><div id="quizPostresult"><h1><span class="marks"><?= $marks;  ?>% </span> </h1></div></div>
              

              
            </div>
          </div>
            </div>

      </div>
    </section>
</section>

<?php }  ?>