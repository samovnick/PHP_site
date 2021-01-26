<?php
$users = "assets/pages/users.txt";
function register($name, $pass, $email)
{
  //data validation block
  $name=trim(htmlspecialchars($name));
  $pass=trim(htmlspecialchars($pass));
  $email=trim(htmlspecialchars($email));
  if ($name =='' || $pass =='' || $email =='') {
    echo "<h3><span style='color:red;'>Fill All Required Fields!</span></h3>";
    return false;
  }
  if (strlen($name) < 3 || strlen($name) > 30 || strlen($pass) < 3 || strlen($pass) > 30)
  {
    echo "<h3><span style='color:red;'>Values Length Must Be Between 3 And 30!</span></h3>";
    return false;
  }
  //login uniqueness check block
  global $users;
  $file=fopen($users,'a+');
  while($line=fgets($file, 128))
  {
    $readname=substr($line,0,strpos($line,':'));
    if ($readname == $name) {
      echo "<h3><span style='color:red;'>Such Login Name Is Already Used!</span></h3>";
      return false;
    }
  }
  //new user adding block
  $line=$name.':'.md5($pass).':'.$email."\r\n";
  fputs($file,$line);
  fclose($file);
  return true;
}

// MYSQL
$mysqli=false;

//connect with DB
	function connectDB() {
		global $mysqli;
		$mysqli=new mysqli("localhost","root","","testphp");
		$mysqli->query("SET NAMES utf8");
	 }

//close DB
	function closeDB() {
		global $mysqli;
		$mysqli->close;
	}

//convert results to array
function resultToArray($result_set) {
		$array=array();
		while($row=$result_set->fetch_assoc())
			$array[]=$row;
		return $array;
}


//add to guestbook
function addGuestBookComments($name,$comment) {
  global $mysqli;
  connectDB();
  $success=$mysqli->query("insert into `guestbook` (`name`,`comment`) values ('$name','$comment')");
  closeDB();
  return $success;
}

//show guestbook
function getAllComments() {
  global $mysqli;
  connectDB();
  $result_set=$mysqli->query("select * from `guestbook`");
  closeDB();
  return resultToArray($result_set);
}


