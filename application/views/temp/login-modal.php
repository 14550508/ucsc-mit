	<div class="modal fade" id="login"  role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
		<div class="modal-dialog">
			<div class="modal-content modal-popup">
				<a href="#" id="loginClose" class="close-link" data-dismiss="modal"><img src="<?= base_url() ?>public/img/close.png" /></a>
				<!-- login form -->
				<div id="loginForm" style="display: show;">
					<form class="popup-form" >
					<div id="loginSuccessImg" style="display: none;"><img src="<?= base_url() ?>public/img/icons/ok.png"></div> 
					    <div id="loginErrorImg" style="display: none;"><img src="<?= base_url() ?>public/img/icons/wrong.png"></div>
					<div class="alert alert-success" style="display: none;" id="loginSuccessMsg"> </div> 
					<div class="alert alert-warning" style="display: none;" id="errorMsg"></div> 
					    <div id="inputPanel">
							<input type="email" id="l_email" class="form-control form-white" placeholder="Email Address">
							<input type="password" id="l_password" class="form-control form-white" placeholder="Password">

							<button type="button" class="btn btn-green" id="loginSubmit">Log in</button>

							<div class="text-center">						
									<a href="#" id="forgotPasswordBtn" class="btn btn-link">Forgot Password?</a>						
							</div>
						</div>
					</form>
				</div>

				<!-- forgot password -->
				<div id="forgotPassword" style="display: none;">
					<form class="popup-form" >
					    <div id="reserSuccessImg" style="display: none;"><img src="<?= base_url() ?>public/img/icons/ok.png"></div> 
					    <div id="reserErrorImg" style="display: none;"><img src="<?= base_url() ?>public/img/icons/wrong.png"></div>   
						<div class="alert alert-success" style="display: none;" id="reserSuccessMsg"> </div> 
						<div class="alert alert-warning" style="display: none;" id="reserErrorMsg"></div> 

					    <div id="inputPanel">				
							<input type="text" id="resetEmail" class="form-control form-white" placeholder="Email Address">				
							<button type="button" id="resetPasswordSubmit" class="btn btn-green">Rest Password </button>
		                    
		                    <div class="text-center">							
									<a id="loginBtn" class="btn btn-link">Go back to Login page</a>	
							</div>
						</div>						
					</form>
				</div>

				
			</div>
		</div>
	</div>