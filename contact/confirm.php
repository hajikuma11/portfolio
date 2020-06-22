<?php
session_start();
$_SESSION["name"] = $_POST['user_name'];
$_SESSION["mail"] = $_POST['user_email'];
$_SESSION["title"] = $_POST['user_title'];
$_SESSION["msg"] = $_POST['user_message'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>お問い合わせページ</title>
  <style>
  body {
    font: 1em sans-serif;
    background-color: aliceblue;
  }

  h1 {
    margin: 0 auto;
    text-align: center;
    background-color: #00b350;
    color: aliceblue;
  }
  </style>
</head>
<body>
  <h1>Contact</h1>
  <h2><?php echo $_SESSION["flag"] ?></h2>
  <form method="post" action="posted.php">
  <div class="element">
    <label>氏名</label>
    <p><?php echo $_POST['user_name']; ?></p>
  </div>
  <div class="element">
    <label>E-mail</label>
    <p><?php echo $_POST['user_email']; ?></p>
  </div>
  <div class="element">
    <label>件名</label>
    <p><?php echo $_POST['user_title']; ?></p>
  </div>
  <div class="element">
    <label>メッセージ</label>
    <p><?php echo $_POST['user_message']; ?></p>
  </div>
  <input type="button" name="btn_back" value="戻る"  onclick="history.back();">
  <input type="submit" name="btn_submit" value="送信">
  <input type="hidden" name="user_name" value="<?php echo $_POST['user_name']; ?>">
  <input type="hidden" name="user_email" value="<?php echo $_POST['user_email']; ?>">
  <input type="hidden" name="user_title" value="<?php echo $_POST['user_title']; ?>">
  <input type="hidden" name="user_message" value="<?php echo $_POST['user_message']; ?>">
  </form>
</body>
</html>