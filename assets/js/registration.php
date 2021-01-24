<h3>Registration Form</h3>
<?php
if (!isset($_POST['regbtn'])) 
{
?>
<form action="index.php?page=4" method="post">
<div>
 <label for="login">Login:</label> <br>
 <input type="text" class="form-control"
name="login">
</div>

<div>
 <label for="pass1">Password:</label> <br>
 <input type="password" class="form-control"
name="pass1">
</div>
<div>
 <label for="pass2">Confirm Password:</label> <br>
 <input type="password" class="form-control"
name="pass2">
</div>
<div>
 <label for="email">Email address:</label> <br>
 <input type="email" class="form-control"
name="email">
</div>
<div>
<button type="submit" name="regbtn">Register</button>
</div>

</form>
<?php
}
else 
{
  if (register($_POST['login'], $_POST['pass1'], $_POST['email'])) {
    echo "<h3/><span style='color:green;'>
    New User Added!</span><h3/>";
  }
}
?>