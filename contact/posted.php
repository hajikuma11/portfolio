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

<?php
session_start();
session_destroy();

define('LINE_API_URL','https://notify-api.line.me/api/notify');
define('LINE_API_TOKEN','GKHDgpXhIqHksg09bHVKAa6ndwb6AUkmNUwE4mlFHNn');

function post_message($message){

    $data = http_build_query( [ 'message' => $message ], '', '&');

    $options = [
        'http'=> [
            'method'=>'POST',
            'header'=>'Authorization: Bearer ' . LINE_API_TOKEN . "\r\n"
                    . "Content-Type: application/x-www-form-urlencoded\r\n"
                    . 'Content-Length: ' . strlen($data)  . "\r\n" ,
            'content' => $data,
            ]
        ];

    $context = stream_context_create($options);
    $resultJson = file_get_contents(LINE_API_URL, false, $context);
    $resultArray = json_decode($resultJson, true);
    if($resultArray['status'] != 200)  {
        return false;
    }
    return true;
}

post_message("\n氏名:\n"
            .$_POST["user_name"]
            ."\nメールアドレス:\n"
            .$_POST["user_email"]
            ."\n件名\n"
            .$_POST["user_title"]
            ."\n本文\n"
            .$_POST["user_message"]
            );
?>