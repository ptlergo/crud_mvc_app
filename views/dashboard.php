<?
  // session_start();

  //access membership when user_name is inputted
  if(!empty($_SESSION['user_name'])) 
  {

    ?>

      Welcome <b>
      <?
        echo $_SESSION["user_name"]; 
      ?>
      <b>!<br/>

      <a href="?action=logoutUser">&nbsp;LOGOUT&nbsp;</a>

    <?
      $user_id = $_SESSION['user_id'];
      $usernameInput = $_SESSION['user_name'];
      $passwordInput = $_SESSION['pass_word'];
      $avatarfile = $_SESSION['avatar_file'];
    }

    ?>
    <?
      if(!isset($_SESSION['user_id']))
      {
        echo "<h2>Users101 dashboard</h2>";
        echo "You must be logged in to access this area<br/>";
        echo "<a href='?action=home>Log in</a>";
      } 
      else 
      {
        echo "<a href='?action=profile'>PROFILE</a>";
        echo "<h2>Users101 Dashboard</h2>";
        echo "<table width=100% align=center>";
        echo "<tr>";
        echo "<th>User ID</th>";
        echo "<th>User Name</th>";
        echo "<th>Password</th>";
        echo "<th>Profile Photo</th>";
        echo "<th>Action</th></tr>";
      }

?>
