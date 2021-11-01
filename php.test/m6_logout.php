<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
<title>ログアウト</title>
</head>
<body>
<p><a href='m6_login.php'>ログインページに戻る</a></p>
</body>
</html>