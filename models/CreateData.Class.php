<!--

  Patrick Tunga-Lergo
  Lab 7-0
  12/09/15
  SSL CRUD to MVC

  $salt phrase must be consistent in order to avoid database connection errors

-->

<?

  //create CreateData object
  class CreateData
  {

    function createrecord()
    {

      
      if (isset($_POST['submit'])) {

        // Check for username password and avatar
        if ($_POST['password'] != null && $_POST['user'] != null) {

          //prepare for output processing
          function makeArray()
          {
            $salt = "supperDupperSalt";
            $epass = md5($_POST['password'] . $salt);
            $euser = $_POST['user'];
            return array("USER NAME" => $euser, "Hashed PASSWORD with Dash of Salt" => $epass);
          }

          // Output Login Details to User
           echo "<h2>CONGRATULATIONS!</h2> Sign-up was successfull!";
           echo "<table width=100% align=left border=0><tr><td>";

           // CONVERT array into a variable for accessing
           $data = makeArray();

           // FOREACH for displaying Array Contents created in makeArray Function
           foreach ($data as $atrribute => $data) 
           {
             // echo "<p align=left><font color=#FF4136>{$attribute}</font>{$data}";
           }

           // Process Avatar Photo for Upload
           $tmp_file = $_FILES['avatarfile']['tmp_name'];

           // Given a string containing the path to a file/directory,
           // the basename function will return the trailing name component.
           $targer_file = basename($_FILES['avatarfile']['name']);
           $upload_dir = "uploads";

           // move_uploaded_file will return false if $tmp_file is not a valid upload file
           // or if it cannot be moved for any other reason
           if (move_uploaded_file($tmp_file, $upload_dir . "/" . $targer_file)) 
           {
             echo "File uploaded successfully.";
           } 
           else 
           {
             echo "<br><br> AVATAR: Np photo was uploaded.";
           }

           echo "<br><br><a href='?action=home'>Please try logging in Now!</a>";
           //close table
           echo "</td></tr></table>";

           //connect to database from including file
           include("DBCredentials.php");

           $salt = "supperDupperSalt";
           $epass = md5($_POST['password'] . $salt);
           $euser = $_POST['user'];

           // Prepare statement for INSERT
           $stmt = $dbh->prepare("insert into users101 (username, password, avatar) 
                                  values(:username, :password, :avatar)");
           $stmt->bindParam(':username', $euser);
           $stmt->bindParam(':password', $epass);
           $stmt->bindParam(':avatar', $targer_file);
           $stmt->execute();

        }
        else 
        {
          echo "Sorry, you must submit ALL registration fields to proceed.";
          echo "<br><br></b><a href='?action=home'>Try again?</a><br><br>";
        }
      }
    }
  }
 ?>
