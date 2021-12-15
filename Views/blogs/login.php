<?php

session_start();


require_once(ROOT_PATH."Controllers/BlogController.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン</title>
</head>
<body>

<form action="login.php" method = "post">
    <div class ="login">
      <h3>ログイン</h3>
      

      <?php if(isset($params["err"]["name"]) && $params["err"]["name"] == "no_name"):?>
        <p class ="error">名前は必須項目です。</p>
      <?php endif?>
      <label for="name">名前：</label>
      <input type="text" name ="name" value ="<?= htmlspecialchars($_SESSION["form"]["name"] ?? "",ENT_QUOTES,"UTF-8"); ?>"><br>

      <?php if(isset($params["err"]["tel"]) && $params["err"]["tel"] == "no_tel"):?>
        <p class ="error">電話番号は必須項目です。</p>
      <?php endif?>
      <label for="tel">電話番号：</label>
      <input type="text" name ="tel" value ="<?= htmlspecialchars($_SESSION["form"]["tel"] ?? "",ENT_QUOTES,"UTF-8");  ?>"><br>

      <?php if(isset($params["err"]["email"]) && $params["err"]["email"] == "no_email"):?>
        <p class ="error">メールアドレスは必須項目です。</p>
      <?php endif?>
      <label for="email">メールアドレス：</label>
      <input type="email" name ="email" value ="<?= htmlspecialchars($_SESSION["form"]["email"] ?? "",ENT_QUOTES,"UTF-8");  ?>"><br>

      <?php if(isset($params["err"]["birth"]) && $params["err"]["birth"] == "no_birth"):?>
        <p class ="error">生年月日は必須項目です。</p>
      <?php endif?>
      <label for="birth">生年月日：</label>
      <input type="text" name ="birth" value ="<?= htmlspecialchars($_SESSION["form"]["birth"] ?? "",ENT_QUOTES,"UTF-8");  ?>"><br>

      <?php if(isset($params["err"]["password"]) && $params["err"]["password"] == "no_password"):?>
        <p class ="error">パスワードは正しく入力してください。</p>
      <?php endif?>
      <label for="password">パスワード：</label>
      <input type="password" name ="password" value ="<?= htmlspecialchars("",ENT_QUOTES,"UTF-8");  ?>"> <br>

      <?php if(isset($params["err"]["password"]) && $params["err"]["password"] =="no_password"):?>
        <p class ="error">パスワードを確認してください。</p>
      <?php endif?>
      <label for="確認パスワード">確認パスワード：</label>
      <input type="password" name ="password_conf" value ="<?= htmlspecialchars("",ENT_QUOTES,"UTF-8");  ?>"><br>

      <div class ="send">
        <input type="submit" value ="送信">
      </div>
    </div>
  </form>
  
</body>
</html>

