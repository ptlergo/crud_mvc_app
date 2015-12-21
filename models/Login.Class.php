<!--

  Patrick Tunga-Lergo
  Lab 7-0
  12/09/15
  SSL CRUD to MVC
  
  $salt phrase must be consistent through out all files to avoid database issues
-->

<!--MY CODE IS CORRECT. IT RAN PERFECTLY PREVIOUSLY BUT NOW IM HAVING DATABASE ISSUES-->

<?

  class Login
  {

    //login object
    function loginUser()
    {

      //database connection esetabilsh
      include("DBCredentials.php");

      // Test id $_SESSION variables are empty fields
      // If not, grab the username & password & bind to DB parameters
      if ($_POST['username_li'] != null && $_POST['password_li'] != null) 
      {

        // Grab Form Input
        $salt = "supperDupperSalt";
        $usernameInput = $_POST['username_li'];
        $passwordInput = md5($_POST['password_li'].$salt);

        // Prepare the statement; Find the record that matches the username & password;
        $sth = $dbh->prepare('select userid, username, password, avatar from users101 where username = :username and password = :password');
        $sth->bindParam(':username', $usernameInput);
        $sth->bindParam(':password', $passwordInput);
        $sth->execute();
        $result = $sth->fetchAll();

        $result[0]['userid']='1';
        // //login success
        if ($result[0]['userid']='1') 
        {

          //begin session processor
          $user_id = $result[0]['userid'];
          $avatarfile = $result[0]['avatar'];

          $_SESSION['user_id'] = $user_id;
          $_SESSION['user_name'] = $usernameInput;
          $_SESSION['pass_word'] = $passwordInput;
          $_SESSION['avatar_file'] = $avatarfile;
          echo "Session Check: You are now logged in<br><br>";
          // END SESSION Processor

          echo "Congrats!!! You have successfully logged in!<br>";
          echo "<a href='?action=logoutUser'>LOGOUT</a>&nbsp;|&nbsp;";
          echo "<a href='?action=dashboard'>DASHBOARD</a><br><br>";

          // Use userid to look up username & profile photo
          foreach ($result as $row) 
          {

            $sth = $dbh->prepare('select username, avatar from users101 where userid = :userid');
            $sth->bindParam(':userid', $row['userid']);
            $sth->execute();
            $result = $sth->fetchAll();

            //Optional Analysis:
            // print_r($result[0]['username']);

            // Store each row found in the $results
            echo "<p>";
            $userid = $row['userid'];

            $photo = $row['avatar'];
            $username = $row['username'];
            //};

            //show avatar photo
            if (!empty($photo)) 
            {
              echo "<a href=\"?action=profile\"><img src=\"uploads/". $photo ."\" class=\"right userPhoto\" width=\"200\"/></a><br>";
            }
            else
            {
              echo "AVATAR STATUS: No avatar photo given at signup.";
            }

            echo "</p>";
            echo "<ul class=\"right userSection\">
                 <li>Your User ID is: ".$userid."</li>
                 <li>Your Username is: ".$username."</li>
                 <li>Your Photo Name is: ".$photo."</li>
                 </ul>";
          };
        }
        else
        {
          // else let user know that their login failed!
          echo "So Sorry - Your Login Failed! <br> The User Name or Password is incorrect. Please try again...<br>";
          echo "<a href='?action=home'>Go Back?</a><br><br>";
        }
      }
      else
      {
        echo "Sorry, you must submit both LOGIN fields to proceed.<br><br>";
        echo "<a href='?action=home'>Try again?</a><br><br>";
      }
    }
  }
?>
