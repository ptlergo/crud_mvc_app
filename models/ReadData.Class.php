<!--

  Patrick Tunga-Lergo
  Lab 7-0
  12/09/15
  SSL CRUD to MVC

-->

<?
  //create ReadData object
  class ReadData
  {


    //method reads from database
    //then sorts database content a-z
    //displays content from A-Z within a table
    function readDisplayAllRecords()
    {
      include("DBCredentials.php");

      // Read EVERYTHING in database, and sort from A-Z
      $stmt = $dbh->prepare('SELECT * FROM users101 order by userid ASC;');
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

      foreach ($result as $row) 
      {
        echo '<tr><td>' . $row['userid'] . '</td><td>' . $row['username'] . '</td><td>' . $row['password'] . '</td><td>' . $row['avatar'] . ' </td><td><a href="?action=deleteForm&id=' . $row['userid'] .
         '">Delete</a></td><td><a href="?action=updateForm&id=' . $row['userid'] . '">Update</a></td>';
      }
      echo "</tr></table>";
    }
  }
?>
