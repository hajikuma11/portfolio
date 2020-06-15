<?php
$json_menu = file_get_contents(__DIR__.'/json/menu.json');
$arr_menu = json_decode($json_menu,true);
$txt = [
  'type' => 'flex',
  'altText' => 'MainMenu',
  'contents' => $arr_menu
];