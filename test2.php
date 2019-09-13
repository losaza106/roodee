<?php
require("test.php");
// Token สำหรับใช้ส่ง line notify 
$token = "AkRkoOquq4NdVvCgtpyLoPuiZ1E5F1HDboLZU010WI3";
// login line notify at https://notify-api.line.me
// get token from https://notify-bot.line.me/my/
 
$message = "ว่าไงพวก";
 
/* $image = [
   'imageThumbnail'=>"https://rlv.zcache.com/mr_happy_giant_smiley_face_square_sticker-rbb3ca9c6eafc4b1daf95629c45cfaa7d_v9wf3_8byvr_324.jpg",
 
   'imageFullsize'=>"https://rlv.zcache.com/mr_happy_giant_smiley_face_square_sticker-rbb3ca9c6eafc4b1daf95629c45cfaa7d_v9wf3_8byvr_324.jpg"
];
 
$sticker = [
   'stickerId'=>"2",
   'stickerPackageId'=>"1"
]; */
 
// ส่ง line notify
/* $res = notify_message($token, $message, $image, $sticker); */
$res = notify_message($token, $message);
/*
ตัวอย่างแบบอื่นๆ
for($i=1;$i<=3;$i++){
   $res = notify_message($token_me, $message.$i, $image, $sticker);
}
*/
//$res = notify_message($token_me, $message, null, null);
//$res = notify_message($token_me, $message, null, $sticker);
if($res->status == 200){
    var_dump($res->status);
}else{
    echo "000";
}
?>