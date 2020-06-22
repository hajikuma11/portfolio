<?php
session_start();
$name = $_SESSION["name"];
$mail = $_SESSION["mail"];
$title = $_SESSION["title"];
$msg = $_SESSION["msg"];
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

  ul {
    list-style: none;
    padding: 0;
    margin: 0;
  }

  form li + li {
    margin-top: 1em;
  }
  
  label {
    /* すべてのラベルを同じサイズにして、きちんと揃える */
    display: inline-block;
    width: 35%;
    text-align: left;
  }

  input, textarea {
    /* すべてのテキストフィールドのフォント設定を一致させる
      デフォルトで、textarea は等幅フォントが設定されている */
    font: 1em sans-serif;

    /* すべてのテキストフィールドを同じサイズにする */
    width: 100%;
    box-sizing: border-box;

    /* テキストフィールドのボーダーの外見を同一にする */
    border: 1px solid #999;
  }

  input:focus,
  textarea:focus {
    /* アクティブな要素を少し強調する */
    border-color: #000;
  }

  textarea {
    /* 複数行のテキストフィールドをラベルにきちんと揃える */
    vertical-align: top;

    /* テキスト入力に十分な領域を与える */
    height: 5em;
  }

  .button {
    text-align : center;
  }

  </style>
</head>
<body>
  <h1>Contact</h1>
  <form action="confirm.php" method="post">
    <ul>
      <li>
        <label for="name">お名前:</label>
        <input type="text" id="name" name="user_name" value="<?php $name; ?>" placeholder="例）松井 元" required="required">
      </li>
      <li>
        <label for="mail">E-mail:</label>
        <input type="email" id="mail" name="user_email" value="<?php $mail; ?>" placeholder="例）mail@example.com">
      </li>
      <li>
        <label for="title">件名:</label>
        <input type="title" id="title" name="user_title" value="<?php $title; ?>" placeholder="例）件名をご入力ください。" required="required">
      </li>
      <li>
        <label for="msg">メッセージ:</label>
        <textarea id="msg" name="user_message" value="<?php $msg; ?>" placeholder="例）ご自由にご入力ください。" required="required"></textarea>
      </li>
      <li class="button">
        <button type="submit">入力内容を確認して送信</button>
      </li>
    </ul>
  </form>
</body>
</html>