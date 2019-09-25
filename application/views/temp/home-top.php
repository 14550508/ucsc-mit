<header id="intro">
		<div class="container">
			<div class="table">
				<div class="header-text">
					<div class="row">
						<div class="col-md-12 text-center">
							<h2 class="light white">Welcome to SELP</h2>	
								<?php if($this->session->userdata('is_logged_in') == TRUE){ ?>	

								  <?php if($this->session->userdata('userType') == 1) { ?>					
										<h4 class="white typed">Search Your Quiz</h4>
                                   <?php } ?>
							<?php } else{ ?>
                             <h4 class="white typed">Create your free Account</h4>

							<?php } ?>
							<span class="typed-cursor">|</span>
							
						</div>				
					</div>
					
					<div class="row">
							<div class="col-md-3 text-center">
						
						    </div>
						   
						
						<?php if($this->session->userdata('is_logged_in') == TRUE  ){ ?>
                          
                          <?php if($this->session->userdata('userType') == 1 ) { ?>

                         <div class="col-md-1 text-center">
						    </div>
					    <div class="col-md-4 text-center">

						<a href="<?= base_url(); ?>quizzes/student/find/<?= $this->session->userdata('username'); ?>" class="btn btn-blue">Find Quizzes</a>
                        </div>
                            <?php } ?>
						<?php }
						else { ?>
						 <div class="col-md-1 text-center">
						 </div>
						<div class="col-md-2 text-center">
						<a data-toggle="modal" data-target="#signUpModel"  id="studentsSignup" class="btn btn-blue"> I'm a Student </a>
						
						</div>
						<div class="col-md-2 text-center">
						<a  data-toggle="modal" data-target="#signUpModel" id="teachersSignup" class="btn btn-green">I'm a Teacher</a>
						</div>

						<!-- <div class="col-md-2 text-center">
						<a href="#" data-toggle="modal" data-target="#signUpModel" id="parentsSignup" class="btn btn-blue">I'm a Parent</a>
						</div> -->
						<?php } ?>
					
					</div>
				</div>
			</div>
		</div>
	</header>