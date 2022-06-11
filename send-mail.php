<?php  
$news = "нет";
if ($_POST['news']){
    $news = "да";
}

$another = 'нет';
if ($_POST['another']){
    $another = 'да';
}   



$to = "hr@btb.su"; 

$subject = "Тест формы"; 

$mailheaders = "Content-type:text/html;charset=utf-8"; 

$mailheaders .= " From: haggar3037@gmail.com";  

$message = "<h2>Форма</h2>";

if(trim(!empty($_POST['name']))){
    $message.='<br><strong>Имя:</strong> '. $_POST['name'];
}
if(trim(!empty($_POST['time']))){
    $message.='<br><strong>Дата:</strong> '. $_POST['time'];
}
if(trim(!empty($_POST['duration']))){
    $message.='<br><strong>Длительность:</strong> '. $_POST['duration'];
}
if(trim(!empty($_POST['abult']))){
    $message.='<br><strong>Взрослые:</strong> '. $_POST['abult']; 
}
if(trim(!empty($_POST['child']))){
    $message.='<br><strong>Дети:</strong> '. $_POST['child'];
}
if(trim(!empty($_POST['phone']))){
    $message.='<br><strong>Телефон:</strong> '. $_POST['phone'];
}
$message.='<br><strong>Хочу получать ноости:</strong> '. $news;
$message.='<br><strong>Хочу посмотреть другие варианты:</strong> '. $another;


$result = mail($to, $subject, $message, $mailheaders);


if ($result) {
    $message = "Отправлено";
} else {
    $message = "при отправке сообщения возникли ошибки";
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>