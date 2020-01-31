<!-- <link rel="stylesheet" href="../Assets/css/bgd.css"> -->
<div class="container">
	<div style=' float: left; width: 100%; overflow: hidden; margin-top:15%;'>
	<link rel="stylesheet" href="../Assets/css/app.css">
	<div class="row">
		<div>
			<form action="Home/dashboard" method="POST" id="login_form" class="col 12 offset-m3">
					<div class="row">
						<div class="input-field col s12">
							<input type="text" name="username" placeholder="Username">
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<input type="password" name="password" placeholder="Password" >
							<p>Invalid Username/Password</p>
						</div>
					</div>
					<div class="row">
						<div class="input-field">
							<div>
								<button type='submit' class="btn blue lighten" id="loginBtn">Login</button>
							</div>
						</div>
					</div>
			</form>
		</div>
	</div>
	</div>
</div>
<script type="text/javascript" src="../Assets/js/loginFormValidation.js"></script>
