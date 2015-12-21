<!--

	Patrick Tunga-Lergo
	Lab 7-0
	12/09/15
	SSL CRUD to MVC

-->

		<?

			if(!empty($_SESSION["user_name"])) 
			{
			  echo "Welcome <b>";
			  echo $_SESSION["user_name"] . "</b>! ~";
			  echo "Click here to " . "<a href='logout.php'>Logout</a>&nbsp;|&nbsp;";
			}

			// Grab Requested User ID & record where ID equal;
			$userid = $_GET['id'];

			$user = "root";
			$pass = "root";
			$dbh = new PDO('mysql:host=localhost;dbname=ssl;port=8889', $user, $pass);


			// "Select All" fields for matching user for later PRE-populating/updating
			$stmt=$dbh->prepare("SELECT * FROM users101 where userid = :userid");
			$stmt->bindParam(':userid', $userid);
			$stmt->execute();
			$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

			// Setup Navigation
			echo "<a href='?action=profile'>My Profile</a>&nbsp;|&nbsp;";
			echo "<a href='?action=dashboard'>Update More?</a>";

		?>


	<form action="?action=updateUserNow&id=<?php echo $userid?>" method="post">
	  <br>
	  You are about to edit the following USERNAME:
	  <input type="text" name="user" value=<?php echo '"'.$result[0]['username'].'"';?> />
	  <input type="submit" name="submit" value="Update Database" />
	</form>
