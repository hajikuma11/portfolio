<?php
//アクセストークン
$token_access = file_get_contents('token.txt');

//メッセージオブジェクトを取得してデコード
$json_msgs = file_get_contents('php://input');
$obj_msgs = json_decode($json_msgs);

//JSONデータから各種データを抜き出すhttps://developers.line.biz/ja/reference/messaging-api/#common-properties

//イベントタイプ
$type_event = $obj_msgs->{"events"}[0]->{"type"};

//イベントタイプがmessageとpostback以外ならスクリプトを終了
if ($type_event == "message") {
  //メッセージデータ
  $msg = $obj_msgs->{"events"}[0]->{"message"}->{"text"};
  //先頭及び末尾の空白などの余分な要素を削除
  $msg = trim($msg);
} elseif ($type_event == "postback") {
  $msg = $obj_msgs->{"events"}[0]->{"postback"}->{"data"};
} elseif ($type_event != "follow") {
  exit;
}

//リプライトークン
$token_reply = $obj_msgs->{"events"}[0]->{"replyToken"};

//メッセージごとの分岐
if (file_exists(__DIR__."/function/$msg.php")) {
  require __DIR__."/function/$msg.php";
} elseif ($type_event == "follow") {
  require __DIR__."/function/menu.php";
} else {
  $txt = [
    'type' => 'text',
    'text' => $msg
  ];
}

//レスポンスデータ
// $txt = [
//   'type' => 'text',
//   'text' => $msg
// ];
$res = [
  'replyToken' => $token_reply,
  'messages' => [$txt]
];

//送信
$ch = curl_init('https://api.line.me/v2/bot/message/reply');
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($res));
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json; charser=UTF-8',
    'Authorization: Bearer ' . $token_access
));
$result = curl_exec($ch);
if ($result != "{}") {
  error_log('[@PF@]'.$result);
}
curl_close($ch);