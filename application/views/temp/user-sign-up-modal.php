	<div class="modal fade" id="signUpModel"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content modal-popup" id="singUpPanel">
				<a href="#" id="regClose" class="close-link" data-dismiss="modal"><img src="<?= base_url() ?>public/img/close.png" /></a>
				
				
				<form class="popup-form" method="POST" id="signUpform" > 
				<h3><div id="userTitle"></div> </h3>
				<div id="regSuccessImg" style="display: none;"><img src="<?= base_url() ?>public/img/icons/ok.png"></div>      
				<div id="SignUperrorImg" style="display: none;"><img src="<?= base_url() ?>public/img/icons/wrong.png"></div>         
                <div class="alert alert-success" style="display: none;" id="regSuccessMsg"> Registration is almost completed. Please check your email. </div> 
                <div class="alert alert-warning" style="display: none;" id="SignUperrorMsg"></div> 
				<div id="inputPanel">		    
					<input type="text" id="stp_fname" class="form-control form-white"  placeholder="First Name">
					<span id="fnameMsg" class="errorMse"></span>
					<input type="text" id="stp_lname" class="form-control form-white"  placeholder="Last Name">
					<span id="lnameMsg" class="errorMse"></span>
					<input type="text" id="stp_username" class="form-control form-white"  placeholder="Username">
					<span id="usernameMsg" class="errorMse"></span>
					<input type="email" id="email" class="form-control form-white"  placeholder="Email Address">
					<span id="emailMsg" class="errorMse"></span>
					<input type="password" id="password" class="form-control form-white"  placeholder="Password">
					<span id="passwordMsg" class="errorMse"></span>
					<input type="hidden" id="user_type" id="user_type" class="form-control form-white" >

					<button type="button" id="singUpsubmit" class="btn btn-blue">Create Free Account</button>
				</div>	
				</form>
			</div>
		</div>
	</div>