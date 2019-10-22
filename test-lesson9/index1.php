<?php
session_start();

echo '<h3>TestWork-2 </h3>';
if($_SESSION['men']>$_SESSION['comp']){
    echo 'Выиграл игрок';
} else{
    echo 'Выиграл компьютер';
}

unset ($_SESSION['men']);
unset ($_SESSION['comp']);
unset ($_SESSION['valid_input']);
unset($_SESSION['error_input']);
$_SESSION['men']=10;
$_SESSION['comp']=10;
?>
<br><br>
<a href="/index.php">Начать игру заново</a>