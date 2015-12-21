<!--

  Patrick Tunga-Lergo
  Lab 7-0
  12/09/15
  SSL CRUD to MVC

-->
<?

  //DeleteData object
  class DeleteData
  {
    //method will make new database connection
    //method will target specific id
    //method will execute delete statement from database
    function deleteUserNow()
    {

      // Replaced original DB Connection Setup from Day 5
      include("DBCredentials.php");

      // Use $_GET to confirm userid
      $userid = $_GET['id'];

      // Use PREPARE to delete userid
      $stmt = $dbh->prepare("DELETE FROM users101 where userid IN (:userid)");
      $stmt->bindParam(':userid', $userid);
      $stmt->execute();
    }
  }
 ?>
