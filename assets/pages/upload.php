<h3>Upload Form</h3>
<?php
if (!isset($_POST['uppbtn'])) 
{
?>
<form action="index.php?page=2" method="post" enctype="multipart/form-data">
<div>
 <label for="myfile">Select file for upload:</label><br>
 <input type="hidden" name="MAX_FILE_SIZE" value="3148000"><br>
 <input type="file" class="form-control" name="myfile" accept="image/*">
</div>
<button type="submit" name="uppbtn">Send File</button>
</form>
<?php
}
else 
{
  var_dump($_POST);
  echo "<p>____________________________</p>";
  var_dump($_FILES);
  echo "<p>____________________________</p>";
  var_dump($_FILES['myfile']);

  if (isset($_POST['uppbtn'])) {
    //errors handling
    if ($_FILES['myfile']['error'] != 0) {
      echo "<h3/><span style='color:red;'>Upload
 error code: " .
        $_FILES['myfile']['error'] .
        "</span><h3/>";
      exit();
    }
    if (is_uploaded_file($_FILES['myfile']['tmp_name'])) {
      move_uploaded_file($_FILES['myfile']['tmp_name'],
        "./assets/gallery/" . $_FILES['myfile']['name']);
    }
    echo "<h3/><span style='color:green;'>File
 Uploaded Successfuly!
</span><h3/>";
  }
}
?>