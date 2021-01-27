<ul>
  <li>
    <a href="index.php?page=1">Home</a>
  </li>
  <li>
    <a href="index.php?page=2">Upload</a>
  </li>
  <li>
    <a href="index.php?page=3">Gallery</a>
  </li>
  <li>
    <a href="index.php?page=4">Registration</a>
  </li>
  <li>
    <a href="index.php?page=5">Guest Book</a>
  </li>
</ul>

<?php
if (isset($_SESSION['user'])) 
{
  echo '<form action="index.php';
  if (isset($_GET['page']))
    echo '?page=' . $_GET['page'];
  echo '" method="post">';
  echo '<div>You are loged as <strong>' . $_SESSION['ruser'] . '</strong>&nbsp;';
  echo '<button type="submit" id="ex" name="ex">Logout</div>';
  echo '</form>';
  if (isset($_POST['ex'])) 
{
    unset($_SESSION['user']);
    echo '<script>window.location.reload()</script>';
  }
}
else 
{
  if (isset($_POST['authbtn'])) {
    if (login($_POST['login'], $_POST['pwd'])) {
      echo '<script>window.location.reload()</script>';
    }
  }
  else 
{


?>
<form action="index.php" method="post">
  <div>
    <label for="login">Login:</label>
    <input type="text" name="login" id="login">
    <label for="pwd">Password:</label>
    <input type="text" name="pwd" id="pwd">
    <button type="submit" name="authbtn">Sign in</button>
  </div>
    
</form>
 <?php
  }
}
?>
