<?php

session_start();
require_once(ROOT_PATH."Controllers/BlogController.php");
$blog = new BlogController();
$blog->register_controll();


?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>登録完了画面</title>
</head>
<body>
<h1>登録が完了いたしました。</h1>
<a href="index.php">トップへ戻る</a>
</body>
</html>

<?php

$_SESSION = array();