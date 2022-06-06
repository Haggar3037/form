<?php  
$news = "нет";
if ($_POST['news']){
    $news = "да";
}

$another = 'нет';
if ($_POST['another']){
    $another = 'да';
}

$name = htmlspecialchars($name);
$name = urldecode($name);
$name = trim($name);    

$body = "Форма";

if(trim(!empty($_POST['name']))){
    $body.='\n Имя: '. $_POST['name'];
}
if(trim(!empty($_POST['time']))){
    $body.='\n Дата: '. $_POST['time'];
}
if(trim(!empty($_POST['duration']))){
    $body.='\n Длительность: '. $_POST['duration'];
}
if(trim(!empty($_POST['abult']))){
    $body.='\n Взрослые: '. $_POST['abult']; 
}
if(trim(!empty($_POST['child']))){
    $body.='\n Дети: '. $_POST['child'];
}
if(trim(!empty($_POST['phone']))){
    $body.='\n Телефон: '. $_POST['phone'];
}
$body.='\n Хочу получать ноости: '. $news;
$body.='\n Хочу посмотреть другие варианты: '. $another;





$result = mail("f0682399@vilir.from.sh", "Тестовое письмо", $body, "From: haggar3037@gmail.com \r\n");


if ($result) {
    $message = "Отправлено";
} else {
    $message = "при отправке сообщения возникли ошибки";
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>