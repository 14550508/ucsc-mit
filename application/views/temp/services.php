	<section id="services" class="section section-padded">
		<div class="container">
			
			<div class="row ">
				<div class="col-md-5">
				<img src="<?= base_url() ?>public/img/profile.png" width="75%">
					
				</div>
				<div class="col-md-7">
					<h4>Teachers / Students Profile</h4>
					<p style="font-size: 20px; color: #2a5f9e;">We have designed special user profile for teachers and students as like social profile. Displaying teachers and groups post, quiezzes, students result, comment and more.</p>	
				</div>
				
			</div>
            <br/>
            <hr/>
            <br/>
			<div class="row ">
			   <div class="col-md-4">
					<h4>Progress Reports</h4>
					<p style="font-size: 20px; color: #2a5f9e;">We facilitate progress reports to quiz result. Displaying your mark, average mark, maximum mark and more.</p>	
				</div>

				<div class="col-md-8">
				<img src="<?= base_url() ?>public/img/reports.png"  width="85%">
					
				</div>
				
				
			</div>


			 <br/>
            <hr/>
            <br/>
			<div class="row ">

			  <div class="col-md-5">
				<img src="<?= base_url() ?>public/img/quiz.png"  width="75%">
					
				</div>
			   <div class="col-md-7">
					<h4>Online Quizzes</h4>
					<p style="font-size: 20px; color: #2a5f9e;">Do quizzes online and get the corrections at the same time. Get progress report for the your result and many more facilities.</p>	
				</div>

				
				
				
			</div>
			 <br/>
			 <hr/>


		</div>
	
	</section>

	<section id="services" class="section section-padded">
		<div class="container">
		 
			
			<div class="row ">
				<div class="col-md-12">
                  
                    <div class="col-md-3"></div>
                     <div class="col-md-6">
                     	
                     	 <?php if($this->session->userdata('is_logged_in') == TRUE){ ?>
                             <h3 style="text-align: center;"></h3>
					
                          <?php if($this->session->userdata('userType') == 1) { ?>	  
						<a href="<?= base_url(); ?>quizzes/student/find/<?= $this->session->userdata('username'); ?>" class="btn btn-blue">Find Quizzes</a>
						<?php } ?>

						<?php } else { ?>
						<h3 style="text-align: center;">Join SELP Today!</h3>
					
                          <h4 style="text-align: center;"> Create your free SELP account! </h4>
					

						<button id="gotop" class="btn btn-blue"> Register Now </button>

						
						</div>
						<?php } ?>
                     </div>
                   
			</div>
		</div>
	</section>