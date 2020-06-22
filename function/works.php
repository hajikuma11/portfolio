<?php
$json_work = file_get_contents(__DIR__.'/json/works.json');
$arr_work = json_decode($json_work,true);
$txt = [
  'type' => 'flex',
  'altText' => 'Work',
  'contents' => $arr_work
];

$res = [
    'replyToken' => $token_reply,
    'messages' => [$txt]
];