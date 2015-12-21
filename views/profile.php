    <?

      echo "<a href='?action=dashboard'>&nbsp;DASHBOARD&nbsp;</a>&nbsp;|&nbsp;";
      echo "<a href='?action=logoutUser'>&nbsp;LOGOUT&nbsp;</a>&nbsp;<br><br>";

      if($_SESSION['pass_word'] != null && $_SESSION['user_name'] != null)
      {

        function makeArray()
        {
          $epass = $_SESSION['pass_word'];
          $euser = $_SESSION['user_name'];
          $avatarfile = $_SESSION['avatar_file'];

          return array("Username: " => $euser, "Password: " => $epass, "Avatar" => $avatarfile);
        }

        echo "<h2>User Profile Page</h2>";
        echo "<div style='border: solid;'>";
        echo "<table width=100% align=left border=0><tr><td>";

        $data = makeArray();
        foreach ($data as $attribute => $data) 
        {
          echo "<p align=center><font color=#FF4136>{$attribute}</font>: {$data}";
        }

        if (!empty($_SESSION['avatar_file'])) 
        {
          echo "<br/>Avatar: ".$_SESSION['avatar_file'];

          echo "<br><a href=\"?action=profile\"><img src=\"uploads/". $_SESSION['avatar_file']. "\" class=\"left userPhoto\" width=\"200\"/></a><br>";
        }
        else 
        {
          echo "<br/>AVATAR: No photo uploaded <:/ ";
        }

        //end table
        echo "</td></tr></table>";
      } 
      else 
      {
        echo "Sorry, not logged in<br>";
        echo "<a href='?action=home'>Try again?</a><br>";
      }
              echo "</div>";

    ?>
