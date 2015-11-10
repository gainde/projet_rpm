<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
    	<div class="modal-content">
      		<div class="modal-header login_modal_header">
        		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        		<h2 class="modal-title" id="myModalLabel">Login to Your Account</h2>
      		</div>
      		<div class="modal-body login-modal">
      			<p>Veuillez vous authentifier ou vous enregistrer. Vous pouvez utiliser par le moyen d'un de vos comptes de réseaux sociaux</p>
      			<br/>
				<div id="login_response"><!-- spanner --></div> </center>
      			<div class="clearfix"></div>
      			<div id='social-icons-conatainer'>
					<form id="login" action="javascript:alert('success!');">
						<div class='modal-body-left'>
							<input type="hidden" name="action" value="user_login">
							<input type="hidden" name="module" value="login">
							<div class="form-group">
								<input type="text" name="email" id="username" placeholder="Enter your name" value="" class="form-control login-field">
								<i class="fa fa-user login-field-icon"></i>
							</div>
			
							<div class="form-group">
								<input type="password" name="password" id="login-pass" placeholder="Password" value="" class="form-control login-field">
								<i class="fa fa-lock login-field-icon"></i>
							</div>
			
							<input href="#" class="btn btn-success modal-login-btn" id="submit" type="submit" value="Login">
							<div id="ajax_loading">
								<img align="absmiddle" src="images/spinner.gif">&nbsp;Processing...
							</div>
							
							<a href="#" class="login-link text-center">Lost your password?</a>
						</div>
					</form>
	        	
	        		<div class='modal-body-right'>
	        			<div class="modal-social-icons">
	        				<a href='auth/login.php?app=facebook' class="btn btn-default facebook"> <i class="fa fa-facebook modal-icons"></i> Sign In with Facebook </a>
	        				<a href='auth/login.php?app=twitter' class="btn btn-default twitter"> <i class="fa fa-twitter modal-icons"></i> Sign In with Twitter </a>
	        				<a href='auth/login.php?app=google' class="btn btn-default google"> <i class="fa fa-google-plus modal-icons"></i> Sign In with Google </a>
	        				<a href='#' class="btn btn-default linkedin"> <i class="fa fa-linkedin modal-icons"></i> Sign In with Linkedin </a>
	        			</div> 
	        		</div>	
	        		<div id='center-line'> OR </div>
	        	</div>																												
        		<div class="clearfix"></div>
        		
        		<div class="form-group modal-register-btn">
        			<a href="register.php" ><button class="btn btn-default"> New User Please Register</button></a>
        		</div>
      		</div>
      		<div class="clearfix"></div>
      		<div class="modal-footer login_modal_footer">
      		</div>
    	</div>
  	</div>
</div>