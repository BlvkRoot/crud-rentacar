<div style='min-width: auto; float: left; width: 100%; overflow: hidden; ' class="col s12">
<link rel="stylesheet" href="../Assets/css/app.css">
<div class="row">
	<div class="card col s4 offset-m4">
		<form action="Home/dashboard" method="POST" id="login_form" class="col 12 offset-m3">
				<div class="row">
					<div class="input-field">
						<input type="text" name="username" placeholder="Username">
					</div>
				</div>
				<div class="row">
					<div class="input-field">
						<input type="password" name="password" placeholder="Password" >
					</div>
				</div>
				<div class="row">
					<div class="input-field">
						<div class="btn blue lighten" onclick="return login()">
							<span>Login</span>
						</div>
					</div>
				</div>
		</form>
	</div>
</div>
</div>
<script type="text/javascript" src="../Assets/js/main.js"></script>
