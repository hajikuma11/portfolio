<?php
session_start();
$_SESSION["name"] = '';
$_SESSION["mail"] = '';
$_SESSION["title"] = '';
$_SESSION["msg"] = '';
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
  <p>送信しました。<br>右上のバツマークからこの画面を閉じてください。</p>
</body>
</html>