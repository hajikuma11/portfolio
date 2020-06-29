<?php
session_start();
if (!empty($_POST['user_name'])) $_SESSION["name"] = $_POST['user_name'];
if (!empty($_POST['user_email'])) $_SESSION["mail"] = $_POST['user_email'];
if (!empty($_POST['user_title'])) $_SESSION["title"] = $_POST['user_title'];
if (!empty($_POST['user_message'])) $_SESSION["msg"] = $_POST['user_message'];
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

  #txt {
    margin: 0 auto;
    text-align: center;
  }
  
  form {
    /* フォームをページの中央に置く */
    margin: 0 auto;
    width: 80%;
    /* フォームの範囲がわかるようにする */
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 1em;
    background-color: #ffffff;
    margin-top: 1em;
  }

  .element {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  .content {
    margin: 0;
    border: 1px solid #CCC;
    white-space: pre-wrap;
  }
  
  label {
    /* すべてのラベルを同じサイズにして、きちんと揃える */
    display: inline-block;
    width: 90px;
    text-align: left;
    margin-top: .5em;
  }

  .button {
    margin-top: 1em;
    text-align : center ;
    letter-spacing: 2em;
  }

  </style>
</head>
<body>
  <h1>Contact</h1>
  <form method="post" action="posted.php">
  <p id="txt">送信内容確認画面</p>
  <div class="element">
    <label>氏名</label>
    <p class="content"><?php echo $_POST['user_name']; ?></p>
  </div>
  <div class="element">
    <label>E-mail</label>
    <p class="content"><?php echo $_POST['user_email']; ?></p>
  </div>
  <div class="element">
    <label>件名</label>
    <p class="content"><?php echo $_POST['user_title']; ?></p>
  </div>
  <div class="element">
    <label>メッセージ</label>
    <p class="content"><?php echo $_POST['user_message']; ?></p>
  </div>
  <div class="button">
    <input type="button" name="btn_back" value="戻る"  onclick="history.back();">
    <input type="submit" name="btn_submit" value="送信">
  </div>
  <input type="hidden" name="user_name" value="<?php echo $_POST['user_name']; ?>">
  <input type="hidden" name="user_email" value="<?php echo $_POST['user_email']; ?>">
  <input type="hidden" name="user_title" value="<?php echo $_POST['user_title']; ?>">
  <input type="hidden" name="user_message" value="<?php echo $_POST['user_message']; ?>">
  </form>
</body>
</html>