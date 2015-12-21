<!--

	Patrick Tunga-Lergo
	Lab 7-0
	12/09/15
	SSL CRUD to MVC

-->


		<!--no longer points to a php file rather to a'view'-->
		<form enctype="multipart/form-data" action="?action=signupUser" method="post">
			<fieldset>
				<legend>Sign Up Now?</legend>
				Username: <input type="text" name="user" value=""/>
				<br/>
				Password: <input type="password" name="password" value=""/>
				<br/>
				Select Avatar to upload:
				<input type="file" name="avatarfile" value=""/>
				<br/>
				<input type="submit" value="Sign Up!" name="submit"/>
				<br/>
			</fieldset>
		</form>
		<br>
