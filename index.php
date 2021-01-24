<!DOCTYPE html>
<html lang="ru">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Сайт на PHP</title>
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <style>
    * {
      border: 1px solid brown;
    }
  </style>
</head>

<body>
  <div class="container">
    <div class="row">  
      <header class="col-sm-12 col-md-12 col-1g-12"> 
      </header> 
    </div> 
    <div class="row">
      <nav class="col-sm-12 col-md-12 col-1g-12"> 
        <?php include_once("assets/pages/menu.php"); ?> 
      </nav> 
    </div>
    <div class="row">
      <section class="col-sm-12 col-md-12 col-1g-12"> 
<?php
if (isset($_GET["page"])) {
  $page = $_GET["page"];
  if ($page == 1)
    include_once("assets/pages/home.php");
  if ($page == 2)
    include_once("assets/pages/upload.php");
  if ($page == 3)
    include_once("assets/pages/gallery.php");
  if ($page == 4)
    include_once("assets/pages/registration.php");

}
var_dump($_GET);
?>  
      </section> 
    </div>
  </div> 

	<script src="assets/js/bootstrap.bundle.js"></script>
</body>

</html>
