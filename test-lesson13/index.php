<?php    
    session_start();
?>
<html>
<head>
<title>Главная страница</title>
</head>
<body>
<h2>Главная страница</h2>
    <form action="testreg.php" method="post">    
        <p>
            <label>Ваш логин:<br></label>
            <input name="login" type="text" size="15" maxlength="15">
        </p>                    
        <p>
            <label>Ваш пароль:<br></label>
            <input name="password" type="password" size="15" >
        </p>             
        <p>
            <input type="submit" name="submit" value="Войти">            
        </p>
    </form>
    <br>
    <?php
    // Проверяем, пусты ли переменные логина и id пользователя
    if (empty($_SESSION['login']) or empty($_SESSION['id'])){ 
        echo '<a href="reg.php">Зарегистрироваться</a>' ;
        echo'<br><br>' ; 
    echo "Вы вошли на сайт, как гость<br><br><a href='#'>Эта ссылка  доступна только зарегистрированным пользователям</a>";
    }
    else{    
    echo "Вы вошли на сайт, как ".$_SESSION['login']."<br><br><a  href='blog.php'>Страница блога</a>";    
    }
    if(!empty($_SESSION['login']) && !empty($_SESSION['id'])){
        unset($_SESSION['valid_login']);
        unset($_SESSION['valid_email']);
        unset($_SESSION['valid_password']);  
        unset($_SESSION['valid_tel']);
        unset($_SESSION['error_login']);
        unset($_SESSION['error_email']);
        unset($_SESSION['error_tel']); 
        unset($_SESSION['error_password']);
        unset($_SESSION['error_passwordDubl']);
        if($_SESSION['login']=='admin'){
            echo '
            <form action="admin.php" method="post">
            <p>
                <input type="submit" name="exit" value="Войти в кабинет admin" style=" background: green;">        
            </p>    
            </form> ';
        } else{
            echo '
            <form action="user_account.php" method="post">
            <p>
                <input type="submit" name="exit" value="Войти в кабинет" style=" background: green;">        
            </p>    
            </form> ';
        }        
    }
    ?>
    <form action="testreg.php" method="post">
    <p>
        <input type="submit" name="exit" value="Exit">        
    </p>
    <?php
    if (!empty($_POST['exit'])){
        unset ($_SESSION['login']);
        unset ($_SESSION['id']);
    }
    ?>
    </form>
</body>
</html>