<?php
$access_token = 'Q0vwK2m9sEphPfy8ItunL/YGNR/z2dZeoeTKi9zMgtUyeCtSynEMOtWgZFiAekSoFWe7Bayhj5NALXIlci0gItQ3WfW+RoF4BjBiGQYgxJa6mzFZs8OYwHOnXYRTP3zvU3be8/5eG/q90f8M845JwQdB04t89/1O/w1cDnyilFU=';

$url = 'https://api.line.me/v1/oauth/verify';

$headers = array('Authorization: Bearer ' . $access_token);

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
$result = curl_exec($ch);
curl_close($ch);

echo $result;
