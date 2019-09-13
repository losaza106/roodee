<?php 
define('LINE_API',"https://notify-api.line.me/api/notify");
 
function notify_message($token, $message, $imagePath = null, $sticker = null){
   $queryData = [
    'message' =>$message
   ];
    
   if($imagePath){
      $queryData['imageThumbnail'] = $imagePath['imageThumbnail'];
      $queryData['imageFullsize'] = $imagePath['imageFullsize'];
   }
    
   if($sticker['stickerId']){
      $queryData['stickerId'] = $sticker['stickerId'];
      $queryData['stickerPackageId'] = $sticker['stickerPackageId'];
   }
    
   //return $queryData;
   $queryData = http_build_query($queryData,'','&');
   $headerOptions =[
      'http'=>[
         'method'=>'POST',
         'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                  ."Authorization: Bearer ".$token."\r\n"
                  ."Content-Length: ".strlen($queryData)."\r\n",
         'content' => $queryData."\r\n"
      ]
   ];
   $context = stream_context_create($headerOptions);
   $result = file_get_contents(LINE_API,FALSE,$context);
   $res = json_decode($result);
   return $res;
}
?>