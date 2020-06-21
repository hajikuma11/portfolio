<?php
$json_me = file_get_contents(__DIR__.'/json/aboutme.json');
$arr_me = json_decode($json_me,true);
$txt = [
  'type' => 'flex',
  'altText' => 'About me',
  'contents' => $arr_me
];

$res = [
    'replyToken' => $token_reply,
    'messages' => [$txt]
];