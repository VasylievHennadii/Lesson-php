<?php
session_start();

$login = trim($_POST['login']);
$validName = preg_match("/^[a-zA-Z]{4,15}$/i",$login);
$email = trim($_POST['email']);
$validEmail = preg_match('/^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i', $email);
$tel = $_POST['tel'];
$validTel = strlen($tel);
$password = trim($_POST['password']);
$passwordDubl = trim($_POST['passwordDubl']);
$validPassword = strlen($password);

if(!empty($_POST['login']) && $validName == true ) {
  $_SESSION['valid_login'] = $login;
  unset($_SESSION['error_login']);  
} else {
  $_SESSION['error_login'] = 'Поле имя введено неверно';
  unset($_SESSION['valid_login']);  
}

if(!empty($_POST['password']) && $validPassword >= 6 && $password==$passwordDubl) {
   $_SESSION['valid_password'] = $password;
   unset($_SESSION['error_password']);
   unset($_SESSION['error_passwordDubl']);
} elseif (!empty($_POST['password']) && $validPassword >= 6 && $password!=$passwordDubl){
   $_SESSION['error_passwordDubl'] = 'Повтор не соответствует введенному паролю';
   unset($_SESSION['valid_password']);
   unset($_SESSION['error_password']);
}else {
   $_SESSION['error_password'] = 'Пароль слишком легкий. Не меньше 6 символов';
   unset($_SESSION['valid_password']);
   unset($_SESSION['error_passwordDubl']);  
}

if(!empty($_POST['email']) && $validEmail == true ) {
  $_SESSION['valid_email'] = $email;
  unset($_SESSION['error_email']);
} else {
  $_SESSION['error_email'] = 'Поле почта введено неверно';
  unset($_SESSION['valid_email']);  
}

if(!empty($_POST['tel']) && $validTel >= 10 ) {
  $_SESSION['valid_tel'] = $tel;
  unset($_SESSION['error_tel']);
} else {
  $_SESSION['error_tel'] = 'Поле tel введено неверно';
  unset($_SESSION['valid_tel']);  
}

if (!empty($_SESSION['error_login']) || !empty($_SESSION['error_email']) || !empty($_SESSION['error_tel']) || !empty($_SESSION['error_password']) || !empty($_SESSION['error_passwordDubl'])){
  header('Location: /reg.php');
  exit;
}

if(!empty($_SESSION['valid_login']) && !empty($_SESSION['valid_email']) && !empty($_SESSION['valid_tel']) && !empty($_SESSION['valid_password'])) {  
  $_SESSION['auth'] =1;
  unset($_SESSION['valid_login']);
  unset($_SESSION['valid_email']);
  unset($_SESSION['valid_password']);  
  unset($_SESSION['valid_tel']);
  unset($_SESSION['error_login']);
  unset($_SESSION['error_email']);
  unset($_SESSION['error_tel']); 
  unset($_SESSION['error_password']);
  unset($_SESSION['error_passwordDubl']);
}

//если логин и пароль введены, то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
$login = stripslashes($login);
$login = htmlspecialchars($login);
$password = stripslashes($password);
$password = htmlspecialchars($password);
// подключаемся к базе
include ("bd.php");

// проверка на существование пользователя с таким же логином
$sql_c = "SELECT * FROM users WHERE login='$login'";
$query_c = mysqli_query($connect, $sql_c);
$myrow = mysqli_fetch_assoc($query_c);
if (!empty($myrow['login'])) {   
   echo "Извините, введённый вами логин уже зарегистрирован. Введите другой логин.<br><br>";     
   echo '<a href="/reg.php">Вернуться для регистрации</a>';
   exit;
} else {
   $_SESSION['login']=$myrow['login']; 
   $_SESSION['id']=$myrow['user_id'];
}
// если такого нет, то сохраняем данные
$result2 = "INSERT INTO users (login,password, email, tel) VALUES('$login','$password','$email','$tel')";
mysqli_query($connect, $result2); //добавление нового пoля логин и пароль в таблицу users

if ($result2== true){
   echo "Вы успешно зарегистрированы! Теперь вы можете зайти на сайт. <a href='index.php'>Главная страница</a>";
   $sql_c = "SELECT * FROM users WHERE login='$login'";
   $query_c = mysqli_query($connect, $sql_c);
   $myrow = mysqli_fetch_assoc($query_c);
   $_SESSION['login']=$myrow['login']; 
   $_SESSION['id']=$myrow['user_id'];
} 
else {
    echo "Ошибка! Вы не зарегистрированы.";    
    echo "Вернуться для регистрации<br><br>" ;
    echo '<a href="/index.php">Главная страница</a>';
}
?>