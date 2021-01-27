<h3>Оставить комментарий</h3>
<form name="guestbook" action="" method="post">
	<label for="user">Name:<br>  
  <input type="text" name="user" id="user"> <br>  
	<label for="comment">Comment:<br>  
  <textarea name="comment" id="comment" rows="10" cols="50"></textarea><br>   	
	<button type="submit" name="commentbtn">Send comment </button>
	<h3>Записи в гостевой книге</h3>
	<div>
		<?php
if (isset($_POST["commentbtn"])) {
  $name = htmlspecialchars($_POST["user"]);
  $comment = htmlspecialchars($_POST["comment"]);
  if ((strlen($name) < 3) || (strlen($comment) < 3))
    $success = false;
  else
    $success = addGuestBookComments($name, $comment);
  if (!$success) {
    echo "Something wrong!!!";
  }
}

$comments = getAllComments();
for ($i = 0; $i < count($comments); $i++) {
  $name = $comments[$i]["name"];
  $comment = $comments[$i]["comment"];
  echo "<p><strong>$name:</strong>";
  echo "<p>$comment</p>";
}
?>
	</div>
