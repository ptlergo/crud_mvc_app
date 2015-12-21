		<?

			//grab user id 
			$userid = $_GET['id'];

			if(!empty($_SESSION["user_name"])) 
			{
			  echo "Welcome <b>";
			  echo $_SESSION["user_name"] . "</b>! ~";
			  echo "Click here to " . "<a href='logout.php'>Logout</a>&nbsp;|&nbsp;";
			}

			// Setup Navigation
			echo "<a href='?action=profile'>My Profile</a>&nbsp;|&nbsp;";
			echo "<a href='?action=dashboard'>Delete More?</a>";

			echo "<h2>Delete User Console</h2>";
			echo "Are you sure you want to delete user with ID: {$userid}?<br><br> ";

		?>

		<form action="?action=deleteUserNow&id=<?php echo $userid?>" method="post">

			If so, click yes... <input type="submit" name="submit" value="Yes, Delete Now!">

		</form>
