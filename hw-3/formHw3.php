<?php
session_start();
$name = trim($_POST['name']);
$validName = preg_match("/^[a-zA-Z]{4,15}$/i",$name);
$email = trim($_POST['email']);
$validEmail = preg_match('/^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i', $email);

if(!empty($_POST['name']) && $validName == 1 ) {
  $_SESSION['valid_name'] = $name;
  unset($_SESSION['error_name']);  
} else {
  $_SESSION['error_name'] = 'Поле имя введено неверно';
  unset($_SESSION['valid_name']);  
}

if(!empty($_POST['email']) && $validEmail == 1 ) {
  $_SESSION['valid_email'] = $email;
  unset($_SESSION['error_email']);
} else {
  $_SESSION['error_email'] = 'Поле почта введено неверно';
  unset($_SESSION['valid_email']);  
}

$month = $_POST['month'];
$day = $_POST['day'];
$year = $_POST['year'];
$validDate = checkdate($month, $day, $year);
$age = (2000+date("y")) - $year;

if( $validDate == true && $age > 10) {
  $_SESSION['valid_day'] = $day;
  $_SESSION['valid_month'] = $month;
  $_SESSION['valid_year'] = $year;
  unset($_SESSION['error_date']);
} else {
  $_SESSION['error_date'] = 'Дата некорректная: '. $day . '-' . $month . '-' . $year;;
  unset($_SESSION['valid_day']); 
  unset($_SESSION['valid_month']);
  unset($_SESSION['valid_year']);
}

if(!empty($_POST['gender']) && ($_POST['gender'] ==='Female' || $_POST['gender'] ==='Male')){
  $_SESSION['valid_gender'] = $_POST['gender'];
  unset($_SESSION['error_gender']);
} else {
  $_SESSION['error_gender'] = '  Пол обязательно';
  unset($_SESSION['valid_gender']);  
}


$comment = $_POST['comment'];
$validComment = translit($comment);

if(!empty($_POST['comment']) && strlen($validComment)> 25) {
  $_SESSION['valid_comment'] = $_POST['comment'];
  unset($_SESSION['error_comment']);
} else {
  $_SESSION['error_comment'] = 'Введите сообщение не менее 25 символов';
  unset($_SESSION['valid_comment']);  
  
}

function translit($s) {
  $s = (string) $s; // преобразуем в строковое значение
  // $s = strip_tags($s); // убираем HTML-теги
  // $s = str_replace(array("\n", "\r"), " ", $s); // убираем перевод каретки
  // $s = preg_replace("/[^0-9a-z-_ ]/i", "", $s); // очищаем строку от недопустимых символов
  $s = preg_replace("/\s+/", ' ', $s); // удаляем повторяющие пробелы
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = function_exists('mb_strtolower') ? mb_strtolower($s) : strtolower($s); // переводим строку в нижний регистр 
  $s = strtr($s, array('редиска'=>'нехороший человек', 'пасть порву'=>'выражаю недовольство', 'шухер'=>'опасность', 'мудак'=>'коллега', 'п*здец'=>'конец работы', 'путин'=>'хуйло')); //заменa неприличных слов
  $s = strtr($s, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>''));  
  // $s = str_replace(" ", "-", $s); // заменяем пробелы знаком минус
  return $s; 
}

if (!empty($_SESSION['error_name']) || !empty($_SESSION['error_email']) || !empty($_SESSION['error_gender']) || !empty($_SESSION['error_comment']) || !empty($_SESSION['error_date'])){
  header('Location: /hw3.php');
  exit;
}

if(!empty($_SESSION['valid_name']) && !empty($_SESSION['valid_email']) && !empty($_SESSION['valid_gender']) && !empty($_SESSION['valid_comment'])) {
  $_SESSION['auth'] =1;
  unset($_SESSION['valid_name']);
  unset($_SESSION['valid_email']);
  unset($_SESSION['valid_gender']);
  unset($_SESSION['valid_comment']);
  unset($_SESSION['valid_day']); 
  unset($_SESSION['valid_month']);
  unset($_SESSION['valid_year']);
  unset($_SESSION['error_name']);
  unset($_SESSION['error_email']);
  unset($_SESSION['error_gender']);
  unset($_SESSION['error_comment']);
  unset($_SESSION['error_date']);  
}

?>

<?php
echo "<h1>Авторизация прошла успешно</h1>";
echo "<h2>Ваш ввод:</h2>";
echo 'Ваше имя: ' . $name;
echo "<br>";
echo 'Ваше мыло: ' . $email;
echo "<br>";
echo 'Вам (количество полных лет): ' . $age;
echo "<br>";
echo 'Ваш пол: ' . $_POST['gender'];
echo "<br>";
echo 'Ваш комментарий: ' . $validComment;
?>
<br><br>
<a href="/hw3.php">back</a>
