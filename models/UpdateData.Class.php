<!--

  Patrick Tunga-Lergo
  Lab 7-0
  12/09/15
  SSL CRUD to MVC

-->

<?
  
  //UpdateData object
  class UpdateData
  {

    //method will establish database connection
    //database connected to update content
    //content recieved from user
    //return dashboard page
    function updateUser()
    {

      //establish database connection 
      include("DBCredentials.php");

      // Validate/filter the $_GET URL entered by User;
      // Then, execute MySQL Update & return to dashboard.php page
      $userid = $_GET['id'];
      $username = $_POST['user'];
      $stmt = $dbh->prepare("UPDATE users101 SET username='" . $username . "' WHERE userid='" . $userid . "';");
      $stmt->execute();

      //return dashboard page
      header('Location: ?action=dashboard');
    }
  }
?>
