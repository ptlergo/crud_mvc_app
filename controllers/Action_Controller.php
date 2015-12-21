<!--

  Patrick Tunga-Lergo
  Lab 7-0
  12/09/15
  SSL CRUD to MVC

-->


    <?

      session_start();

      // Controller "includes" & reads all of your database connections
      // & business logic for this app
      //
      include("models/Views.Class.php");
      include("models/CreateData.Class.php");
      include("models/ReadData.Class.php");
      include("models/UpdateData.Class.php");
      include("models/DeleteData.Class.php");
      include("models/Login.Class.php");
      include("models/DBCredentials.php");

      // Instantiate and make new copies of you Classes inside files above
      // Store in variables so that we can work with them later
      $views = new Views();
      $create = new CreateData();
      $read = new ReadData();
      $update = new UpdateData();
      $delete = new DeleteData();
      $login = new Login();

      // Controller starts routing the user based on the form "action" from Views;
      //Process if the action is not empty, if so move to next if statement
      //if statements act like switches for when a neccesary model is called upon from user at view
      //selected action can be seen in url
      // ! its important to have consistent $salt phrase unless database connection won't work for retrival
      if(!empty($_GET["action"])) 
      {


        if ($_GET["action"] == "home") 
        {
          //Shows Header & Both Forms; Then, show footer
          $views->getView("views/header.php");
          $views->getView("views/signup_form.php");
          $views->getView("views/login_form.php");
          $views->getView("views/footer.php");
        }

    //CRUD ACTION: CREATE 

       // If user action is "sign-up" then "CREATE" signup
        if ($_GET["action"] == "signupUser") 
        {

          // Show header + sign-up confirmation & footer;
          $views->getView("views/header.php");

          $salt = "supperDupperSalt";
          $epass = md5($_POST['password'] . $salt);
          $euser = $_POST['user'];

          $create->createrecord($euser, $epass);
          $views->getView("views/footer.php");
        }

        // If user action is "login"...
        if($_GET["action"] == "loginUser") 
        {

          // Grab Form Input
          $salt = "supperDupperSalt";
          $usernameInput = $_POST['username_li'];
          $passwordInput = md5($_POST['password_li'].$salt);

          // Login User
          $views->getView("views/header.php");
          $login->loginUser();
          $views->getView("views/footer.php");

        }
        //else user action is logout
        else if ($_GET["action"] == "logoutUser") 
        {

          //logged out thus clean last session
          session_unset();
          session_destroy();
          //session cleaned

          //return front page
          $views->getView("views/header.php");
          $views->getView("views/logout.php");
          $views->getView("views/footer.php");
        }

        // If user action is "profile"...
        if ($_GET["action"] == "profile") 
        {

          // store other session variables from Super Global $_SESSION
          $user_id = $_SESSION['user_id'];
          $usernameInput = $_SESSION['user_name'];
          $passwordInput = $_SESSION["pass_word"];
          $avatarfile = $_SESSION['avatar_file'];

          $views->getView("views/header.php");
          $views->getView("views/profile.php");
          $views->getView("views/footer.php");
        }

    //CRUD ACTION: READ 

        // If user action is "dashboard"...
        if ($_GET["action"] == "dashboard") 
        {

          $views->getView("views/header.php");
          $views->getView("views/dashboard.php");
          $read->readDisplayAllRecords();
          $views->getView("views/footer.php");
        }

    //CRUD ACTION: UPDATE
        // IF the action is "updateForm", display update form
        if ($_GET["action"] == "updateForm") 
        {
          // Show Header, Update Form, and Footer;
          $views->getView("views/header.php");
          $views->getView("views/update_form.php");
          $views->getView("views/footer.php");
        } 
        else if ($_GET["action"] == "updateUserNow") 
        {
          $update->updateUser();
          header('location: ?action=dashboard');
        }

    //CRUD ACTION: DELETE

        // IF the action is "delete", display delete form
        if($_GET["action"] == "deleteForm") 
        {
          $views->getView("views/header.php");
          $views->getView("views/delete_form.php");
          $views->getView("views/footer.php");
        } 
        else if ($_GET["action"] == "deleteUserNow")
        {
          $delete->deleteUserNow();
          header('location: ?action=dashboard');
        }
      }
      
      //go back to home page
      else{ header("location: ?action=home"); }

    ?>
