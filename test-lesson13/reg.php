<?php    
    session_start();
    $f = $_SESSION;
?>
<html>
    <head>
    <title>Регистрация</title>
    </head>
    <body>
    <style>
    .error {color: #FF0000;}
    </style>
        <h2>Регистрация</h2>
        <p><span class="error">* обязательное поле</span></p>
        <br>
        <form action="/save_user.php" method="post">        
        <p>
            <label>Ваш логин:<span class="error">* <br></span></label>            
            <input type="text" name="login" value="<?php echo !empty($f['valid_login']) ? $f['valid_login'] : ''; ?>" /> <?php if(!empty($f['error_login'])) { ?>
            <span class="error"> <?php echo $f['error_login']; ?>
            </span> 
            <?php } ?>  
        </p>        
        <p>
            <label>Ваш пароль:<span class="error">* <br></span></label>            
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
            <label >E-mail: <span class="error">* <br></span></label>
            <input type="text" name="email" value="<?php echo !empty($f['valid_email']) ? $f['valid_email'] : ''; ?>" /> <?php if(!empty($f['error_email'])) { ?>
            <span class="error"> <?php echo $f['error_email']; ?>
            </span> 
            <?php } ?>  
        </p>
        <p>
            <label >Tel:  <span class="error">* <br></span></label>
            <input type="text" name="tel" value="<?php echo !empty($f['valid_tel']) ? $f['valid_tel'] : ''; ?>" /> <?php if(!empty($f['error_tel'])) { ?>
            <span class="error"> <?php echo $f['error_tel']; ?>
            </span> 
            <?php } ?>  
        </p>
        <p>
            <input type="submit" name="submit" value="Зарегистрироваться">        
        </p>
        </form>
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

    

