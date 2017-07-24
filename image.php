<?php

if($_POST)
{ 
	$filenme = $_POST["name"];
  // $_FILES["file"]["error"] is HTTP File Upload variables $_FILES["file"] "file" is the name of input field you have in form tag.
  if ($_FILES["file"]["error"] > 0)
  {
  // if there is error in file uploading 
  echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  
  }
  else
  {
	// check if file already exit in "images" folder.
	if (file_exists("images/" . $_FILES["file"]["name"]))
	{
	echo $_FILES["file"]["name"] . " already exists. ";
	}
	else
	{  //move_uploaded_file function will upload your image.  if you want to resize image before uploading see this link 		http://b2atutorials.blogspot.com/2013/06/how-to-upload-and-resize-image-for.html
	  
	  $extension = explode("/", $_FILES["file"]["type"]);  //Use proper mime type here, $_FILES contents can be faked by remote user 
	  
	  if(move_uploaded_file($_FILES["file"]["tmp_name"],"images/" . $filenme.".".$extension[1]))
	  {
		  echo "Stored in: " . "images/" . $_FILES["file"]["name"];
	  }
     }
   }
}
?>
<html>
<body>
<form action="" method="post"enctype="multipart/form-data">
<label>Name:</label>
<input type="text" name="name" id="name" /> 
<br />
<label for="file">Filename:</label>
<input type="file" name="file" id="file" /> 
<br />
<input type="submit" name="submit" value="Submit" />
</form>
</body>
</html>