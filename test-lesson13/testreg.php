<?php
session_start();
if (!empty($_POST['exit'])){
    unset ($_SESSION['login']);
    unset ($_SESSION['id']);
    header('Location: /index.php');
    exit;
}
//заносим введенный пользователем логин в переменную $login, если он пустой, то уничтожаем переменную
if (!empty($_POST['login'])){ 
    $login = $_POST['login'];
    if ($login == '') { 
        unset($login);
    } 
} 
//заносим введенный пользователем пароль в переменную $password, если он пустой, то уничтожаем переменную
if (!empty($_POST['password'])) {
    $password=$_POST['password'];
    if ($password =='') {
        unset($password);
    } 
}    
//если пользователь не ввел логин или пароль, то выдаем ошибку и останавливаем скрипт
if (empty($login) or empty($password)) {
    echo"Вы ввели не всю информацию, вернитесь назад и заполните все поля!<br><br>";
    echo "Вернуться для повторного входа<br><br>" ;
    echo '<a href="/index.php">Главная страница</a>';
} 
//если логин и пароль введены,то обрабатываем их, чтобы теги и скрипты не работали, мало ли что люди могут ввести
if(!empty($login) && !empty($password)){
    $login = stripslashes($login);
    $login = htmlspecialchars($login);
    $password = stripslashes($password);
    $password = htmlspecialchars($password);
    //удаляем лишние пробелы по краям
    $login = trim($login);
    $password = trim($password);
    if($login=='admin' && $password=='admin'){
        header('Location: /admin.php');
        $_SESSION['login']=$login; 
        $_SESSION['id']=$password;
    }
    // подключаемся к базе
    include ("bd.php");        

    $sql_c = "SELECT * FROM users WHERE login='$login'";
    $query_c = mysqli_query($connect, $sql_c);
    $myrow = mysqli_fetch_assoc($query_c);
    if (empty($myrow['login'])){
    //если пользователя с введенным логином не существует    
        echo "Извините, пользователя с такими login не существует.<br><br>";        
        echo '<a href="/reg.php">Зарeгистрироваться</a><br><br>';
        echo "Вернуться на главную<br><br>" ;
        echo '<a href="/index.php">Главная страница</a>';
    }
    else {
        //если существует, то сверяем пароли
        if ($myrow['password']==$password) {
            //если пароли совпадают, то запускаем пользователю сессию
            $_SESSION['login']=$myrow['login']; 
            $_SESSION['id']=$myrow['user_id'];//эти данные очень часто используются, вот их и будет "носить с собой" вошедший пользователь
            echo "Вы успешно вошли на сайт, ".$_SESSION['login']."! <br><br><a href='index.php'>Главная страница</a>";
        }
        else {
            //если пароли не сошлись
            echo "Извините, введённый вами пароль неверный.<br><br>";
            echo "Вернуться для повторного входа<br><br>" ;
            echo '<a href="/index.php">Главная страница</a>';
        }
    }
}

?>