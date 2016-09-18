<?php
$uname = $_REQUEST['username'];

$query = "UPDATE task SET view='1' WHERE user_id=(SELECT ID from users where username='$uname')";
$conn->query($query);