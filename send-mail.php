<?php  
$name = $_POST['name'];
$time = $_POST['time']; 
$duration = $_POST['duration'];
$abult  = $_POST['abult']; 
$child = $_POST['child'];
$phone = $_POST['phone'];

$news = нет;
if ($_POST['news']){
    $news = да;
}
$another = нет;
if ($_POST['another']){
    $another = да;
}

$name = htmlspecialchars($name);
$name = urldecode($name);
$name = trim($name);    

if (!mail("haggar3037@gmail.com", "Тестовое письмо", 
"ФИО: ".$name.
"\nДата: ".$time.
"\nДлительность: ".$duration.
"\nВзрослые: ".$abult.
"\nДети: ".$child.
"\nТелефон: ".$phone.
"\nХочу получать новости: ".$news.
"\nРассматриваю другие варианты: ".$another
,"haggar3037@gmail.com \r\n")){
    echo "при отправке сообщения возникли ошибки";
}
?>