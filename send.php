<?php
  $bottoken= "6973852895:AAHvW1-VmBV7wQiu9QJq1jZWpx-B1N7G8Rw";
  $chatid ="-4074786076";
  
  define('BOT_TOKEN', $bottoken);
  define('CHAT_ID', $chatid);
  define('API_URL', 'https://api.telegram.org/bot'.BOT_TOKEN.'/');
  function enviar_telegram($msj){
    $queryArray = [
      'chat_id' => CHAT_ID,
      'text' => $msj,
    ];
    $url = 'https://api.telegram.org/bot'.BOT_TOKEN.'/sendMessage?'. http_build_query($queryArray);
    $result = file_get_contents($url);
  }
enviar_telegram($msj);
?>