<?php

$server_key="AIzaSyCTJYUZjTl5aoqJmJxGHkcGjyB-BVigAWI"; // get this from Firebase project settings->Cloud Messaging
$user_token=""; // Token generated from Android device after setting up firebase
$title="New Message";
$n_msg="This is a message";

$ndata = array('title'=>$title,'body'=>$n_msg);

$url = 'https://fcm.googleapis.com/fcm/send';

$fields = array();
$fields['data'] = $ndata;

$fields['to'] = $user_token;
$headers = array(
    'Content-Type:application/json',
  'Authorization:key='.$server_key
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
$result = curl_exec($ch);
if ($result === FALSE) {
    die('FCM Send Error: ' . curl_error($ch));
}
curl_close($ch);

?>