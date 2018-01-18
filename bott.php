<?php
$strAccessToken = "/+uJ18VXBqWNmuciVZpcNGSGk28vC9onfBB5EOX6N4kyKVgbc2zcxgwVWvPaxkQJFWe7Bayhj5NALXIlci0gItQ3WfW+RoF4BjBiGQYgxJaZNFnhjZeqMR9cqxaBxI1AB9zufGAUVDLsGgzLwqj1WAdB04t89/1O/w1cDnyilFU=";
$content = file_get_contents('php://input');
$arrJson = json_decode($content, true);
$strUrl = "https://api.line.me/v2/bot/message/reply";
$_userId = $arrJson['events'][0]['source']['userId'];
$_msg = $arrJson['events'][0]['message']['text'];
$arrHeader = array();
$arrHeader[] = "Content-Type: application/json";
$arrHeader[] = "Authorization: Bearer {$strAccessToken}";
$filename = 'text.txt';
if (file_exists($filename)) {
  $myfile = fopen('text.txt', "w+") or die("Unable to open file!");
  fwrite($myfile, $_msg);
  fclose($myfile);
} else {
  $myfile = fopen('text.txt', "x+") or die("Unable to open file!");
  fwrite($myfile, $_msg);
  fclose($myfile);
}
if($arrJson['events'][0]['message']['text'] == "à¸ªà¸§à¸±à¸ªà¸”à¸µ"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "à¸ªà¸§à¸±à¸ªà¸”à¸µ ID à¸‚à¸­à¸‡à¸„à¸¸à¸“à¸„à¸·à¸­ ".$arrJson['events'][0]['source']['userId'];
}else if($arrJson['events'][0]['message']['text'] == "Stop"){
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "Bot : à¸«à¸¢à¸¸à¸”";
}else{
  $arrPostData = array();
  $arrPostData['replyToken'] = $arrJson['events'][0]['replyToken'];
  $arrPostData['messages'][0]['type'] = "text";
  $arrPostData['messages'][0]['text'] = "Bot :à¹„à¸¡à¹ˆà¹€à¸‚à¹‰à¸²à¹ƒà¸ˆà¸„à¸³à¸ªà¸±à¹ˆà¸‡";
}
 
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,$strUrl);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $arrHeader);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($arrPostData));
curl_setopt($ch, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$result = curl_exec($ch);
curl_close ($ch);

echo "OK";
?>