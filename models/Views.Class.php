<!--

  Patrick Tunga-Lergo
  Lab 7-0
  12/09/15
  SSL CRUD to MVC

-->



<?

	//Views object	
	class Views
	{
	  // Create a method called "getViews"
	  // Function/Method Parameters:
	  // Pass the file name and data recived from Controller
	  function getView($filename="", $results=array()){ include $filename;/*include the filename being requested by Controller*/}
	}
?>
