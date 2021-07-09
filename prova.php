<?php

$token = 1891640704:AAF3ZxfPZ7xPmAZEtc1UXKC-Lkf_cw2H4Es;
$website = 'https://api.telegram.org/bot'.$token;
$update = file_get_contents('php://input');
$update = json_decode($update, TRUE);
$message = $update['message']['text'];
$id = $update['message']['from']['id'];
$name = $update['message']['from']['first_name'];
$surname = $update['message']['from']['last_name'];
$username = $update['message']['from']['username'];

sendMessage($id, "ciao, come va? ");

sendMessage($id, $text){
  $url = $GLOBALS[website]."/sendMessage?chat_id=$id&text=".urlencode($text);
  file_get_contents($url);
}

?>
