<?php 
include "../config/dbh.inc.php";
define('LINE_API',"https://notify-api.line.me/api/notify");
$id_category = $_POST['id_category'];
$sql = "SELECT * FROM quiz INNER JOIN categorys_quiz ON quiz.id_category = categorys_quiz.id_category WHERE quiz.id_category = $id_category";
$result_quiz = $conn->query($sql);
$count_quiz = mysqli_num_rows($result_quiz);
$data = [];
$NAME_USER = $_POST['NAME_USER'];
$response = [];
$i = 1;
$count_score = 0;
while($row_quiz = $result_quiz->fetch_assoc()){

    $choice = $_POST['q_'.$i];

    if($choice == $row_quiz['correct_answer']){
        $count_score++;
    }

    array_push($data, $row_quiz);
    $i++;
}

$response = [
    "total_score"=>$count_score
];

// Token สำหรับใช้ส่ง line notify 
$token = "AkRkoOquq4NdVvCgtpyLoPuiZ1E5F1HDboLZU010WI3";
// login line notify at https://notify-api.line.me
// get token from https://notify-bot.line.me/my/
 
$message = "\n หัวข้อ : {$data[0]['title_category']} \n ชื่อ : {$NAME_USER} \n คะแนน : {$count_score} / {$count_quiz}";
 
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
    echo json_encode($response);
}


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