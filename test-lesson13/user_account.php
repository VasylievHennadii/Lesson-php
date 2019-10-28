<?php    
    session_start();
    $f = $_SESSION;
    $name = $_SESSION['login'];
    $id = $_SESSION['id'];
    include ("bd.php");
    
    $sql6="SELECT * FROM users WHERE login='$name' AND user_id='$id'";
    $query6=mysqli_query($connect, $sql6);
    while($res6[]=mysqli_fetch_assoc($query6)){
    $users6=$res6;
    }
    foreach($users6 as $u){
    echo 'Name: ' .$u['login'].'. Password: '.$u['password'].'. Email: '.$u['email'].'. Tel: '.$u['tel'].'<br/>';
    }
?>

<html>
<head>
<title>Личный кабинет пользователя</title>
</head>
<body>
<style>
.error {color: #FF0000;}
</style>
<h2>Личный кабинет пользователя<?php echo" ".$_SESSION['login']."";?></h2>
<h3>Внести изменения в регистрационные данные</h3>
<form action="/save_user_account.php" method="post">        
    <p>
        <label>Ваш логин(изменить):<span class="error">* <br></span></label>            
        <input type="text" name="login" value="<?php echo !empty($f['valid_login']) ? $f['valid_login'] : ''; ?>" /> <?php if(!empty($f['error_login'])) { ?>
        <span class="error"> <?php echo $f['error_login']; ?>
        </span> 
        <?php } ?>  
    </p>        
    <p>
        <label>Ваш пароль(изменить):<span class="error">* <br></span></label>            
        <input type="password" name="password" value="<?php echo !empty($f['valid_password']) ? $f['valid_password'] : ''; ?>" /> <?php if(!empty($f['error_password'])) { ?>
        <span class="error"> <?php echo $f['error_password']; ?>
        </span> 
        <?php } ?>             
    </p>  
    <p>
        <label>Повтор пароля:<span class="error">* <br></span></label>            
        <input type="password" name="passwordDubl" value="<?php echo !empty($f['valid_password']) ? $f['valid_password'] : ''; ?>" /> <?php if(!empty($f['error_passwordDubl'])) { ?>
        <span class="error"> <?php echo $f['error_passwordDubl']; ?>
        </span> 
        <?php } ?>             
    </p>
    <p>
        <label >E-mail(изменить): <span class="error">* <br></span></label>
        <input type="text" name="email" value="<?php echo !empty($f['valid_email']) ? $f['valid_email'] : ''; ?>" /> <?php if(!empty($f['error_email'])) { ?>
        <span class="error"> <?php echo $f['error_email']; ?>
        </span> 
        <?php } ?>  
    </p>
    <p>
        <label >Tel(изменить):  <span class="error">* <br></span></label>
        <input type="text" name="tel" value="<?php echo !empty($f['valid_tel']) ? $f['valid_tel'] : ''; ?>" /> <?php if(!empty($f['error_tel'])) { ?>
        <span class="error"> <?php echo $f['error_tel']; ?>
        </span> 
        <?php } ?>  
    </p>
    <p>
        <input style=" background: red;" type="submit" name="submit" value="Изменить">        
    </p>
    </form>
    <form action="index.php" method="post">
        <p>
            <input type="submit" name="output" value="На главную" style=" background: green;">        
        </p>        
    </form>    
</body>
</html>
