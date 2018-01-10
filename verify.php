<?php
$access_token = 'V5QIqy3m+6BP4IYzGgwy/kZjkisI4XZ6yzoepRNAhqnVkVnBPjWfe69YkYnMDE54FWe7Bayhj5NALXIlci0gItQ3WfW+RoF4BjBiGQYgxJZW629IJic35KD9NDqNsVO8O026xrsiF5k9UD4V7NjBzwdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;