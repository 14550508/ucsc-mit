<section id="main-content sidebar-closed">
    <section class="wrapper site-min-height">

         <div class="row">
            <div class="col-md-9">
	    		 <section class="panel">
	    		    <div class="panel-heading"> <div class="row"><div class="col-md-7"><h4><?=  $quizData[0]->qz_name; ?>   </h4></div> <div class="col-md-5"><strong style="margin-top:0px" class="pull-right" id=""> <a id="endQuiz" class="btn btn-success"> Save and Submit Qiuz</a>  <a id="resetQuiz" class="btn btn-danger"> Reset Quiz </a> <a href="<?= base_url(); ?>students/<?= $this->session->userdata('username'); ?>" class="btn-default btn">  Close Quiz </a>  </strong></div> </div> </div>
	    		 	 <div class="panel-body">
                         

                         <ul class="summary-list text-center">
                                          <li>
                                              <a >
                                                  <i class=" fa fa-question-circle text-success"></i>
                                                 <?=  $numQuestion; ?> Questions
                                              </a>
                                          </li>
                                          <li>
                                              <a >
                                                  <i class="fa fa-thumb-tack text-info"></i>
                                                  <?= $attempts; ?> Attempt
                                              </a>
                                          </li>
                                          <li>
                                              <a >
                                                  <i class=" fa  fa-clock-o text-muted"></i>
                                                  <?=  $quizData[0]->time; ?> mins Time
                                              </a>
                                          </li>
                                         
                                      </ul>

	    		 	 </div>
	    		 </section>

	    		 <section class="panel">
	    		    <div class="panel-heading"> <strong id="QuestionName"></strong>  </div>
	    		 	 <div class="panel-body"> 
	    		 	 <div id="questionBody">
                  <div id="loader-icon-quas" > </div>
             </div>
	    		 	 <p><hr/></p>
	    		 	 <div id="questionans" ></div>
                      <input type="hidden" name="" id="selectAnser" value="">
                       <input type="hidden" name="" id="quesOder" value="">
                        <input type="hidden" name="" id="thisQues" value="">
                        
                        

	    		 	 </div>
	    		 </section>
                  <section class="panel">
	    		 		<div class="panel-body">
                       		
	                        <div class="" ="" style="text-align: center;">

	                          <button type="button" id="nextButton" class="nextQus btn btn-success btn-lg" style="margin:5px">Save and Next Question <i class="fa  fa-arrow-right"></i> </button>
	                       
	                        </div>
						</div>
				  </section>

	        </div>

	         <div class="col-md-3">
                <div class="panel">
                    <div class="panel-heading"> <strong>Question Number  </strong>    </div>
						<div class="panel-body">
                               <div id="loader-icon"></div>
						    <div id="questionNumber">
                          
						         
						    </div>

							
						</div>
     			</div>
            </div>

	    </div>
    </section>
</section>