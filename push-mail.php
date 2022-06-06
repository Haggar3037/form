<?php  
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet = 'UTF-8'; 
$mail->setLanguage('ru', 'PHPMailer/language');
$mail->IsHtml(true);

$mail->setForm('f0682399@vilir.from.sh', 'Тестироание');

$mail->addAddress('haggar3037@gmail.com');

$mail->Subject = 'Отпрака формы';


$news = нет;
if ($_POST['news']){
    $news = да;
}
$another = нет;
if ($_POST['another']){
    $another = да;
}

if(trim(!empty($_POST['name']))){
$body.='<p><strong>Имя:</strong> ' . $_POST['name'] . '</p>';
}
if(trim(!empty($_POST['time']))){
$body.='<p><strong>Дата:</strong> ' . $_POST['time'] . '</p>';
}
if(trim(!empty($_POST['duration']))){
$body.='<p><strong>Длительность:</strong> ' . $_POST['duration'] . '</p>';
}
if(trim(!empty($_POST['abult']))){
$body.='<p><strong>Взрослые:</strong> ' . $_POST['abult'] . '</p>'; 
}
if(trim(!empty($_POST['child']))){
$body.='<p><strong>Дети:</strong> ' . $_POST['child'] . '</p>';
}
if(trim(!empty($_POST['phone']))){
$body.='<p><strong>Телефон:</strong> ' . $_POST['phone'] . '</p>';
}
if(trim(!empty($_POST['news']))){
$body.='<p><strong>Хочу получать ноости:</strong> ' . $news . '</p>';
}
if(trim(!empty($_POST['another']))){
$body.='<p><strong>Хочу посмотреть другие варианты:</strong> ' . $another . '</p>';
}


$mail->Body = $body;

if (!$mail->send()) {
    $message = 'Ошибка';
} else {
    $message = 'Данные отпралены';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode($response);
?>