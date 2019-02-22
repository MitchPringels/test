<?php
return "
	<div class='overlay'>
      <img src='./img/backgroundPaymo.jpg'>
			<div class='container'>
				<h1>Paymo data log in</h1>
				<form method='post' action='index.php' class='login'>
						<label for='email'>E-mail: </label>
						<input type='email' name='email' required/>
				    <label for='password'>Password: </label>
				    <input type='password' name='password' required/> <br><br>
				    <input class='submit' type='submit' value='Log in' name='log-in' />
				</form>
			</div>
    </div>

";
