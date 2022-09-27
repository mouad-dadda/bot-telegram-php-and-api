<?php

define("TOKEN_KEY", "");

class telegramBot
{

  private function getBot($method = "getMe", $params = [])
  {

    $url = "https://api.telegram.org/bot" . TOKEN_KEY . "/" . $method;

    $init = curl_init();

    curl_setopt_array(
      $init,
      [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        // CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $params,
        CURLOPT_HTTPHEADER=> ['Content-Type:multipart/form-data'] ,
      ]


    );

    $res = curl_exec($init);

    curl_close($init);

    if (!curl_error($init)) {
      return json_decode($res, true);
    }
  }


  public function  SetWebhook($url  , $max_connections=100)
  {
    return $this->getBot('setWebhook',
      [
        'url'=>$url,
        'max_connections'=>$max_connections,
      ]
    );
  }

  public function DeleteWebhook()
  {
    return $this->getBot("deleteWebhook");
  }

  public function GetWebhookInfo()
  {
    return $this->getBot("getWebhookInfo") ;
  }

  public function SendMessage($chat_id,$text,$reply_markup=null,$parse_mode="HTML",$dwp_preview=true)
  {
    return $this->getBot(
      "sendMessage" ,
      [
        'chat_id'=> $chat_id ,
        'text'=>$text ,
        'parse_mode'=> $parse_mode  ,
        'disable_web_page_preview'=>$dwp_preview  ,
        "reply_markup"=>$reply_markup 
      ]
    );
  }

  public function senToAdmineBot($admin_chat_id , $mesg ,$chat_id_user ,$name_user)
  {
    return $this->SendMessage($admin_chat_id,
        "$mesg 
        chat_id :  $chat_id_user
        user : $name_user
        " 
      );
  }

  function SendDocument($chat_id,$document,$thumb,$reply_markup=null,$parse_mode="HTML"){
    return $this->getBot(
      'sendDocument',[
        'chat_id'=>$chat_id,
        'document'=> $document,
        'thumb'=>$thumb,
        'parse_mode'=>$parse_mode,
        'reply_markup'=>$reply_markup
        ]
    );
  }

}


$get_api = file_get_contents('php://input');

$update = json_decode($get_api);

if ($update) file_put_contents("log.json", $get_api);



$message = $update->message;

$message_id=$message->message_id ;

$text = $message->text;

$first_name = $message->chat->first_name;

$chate_id = $message->chat->id;


$file_id= $message ->document->file_id ;

$file_name= $message ->document->file_name ;

$file_caption= $message ->document->caption ;

$thump_id= $message ->document->thumb->file_id;