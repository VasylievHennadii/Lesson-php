<?php
session_start();

echo '<h3>TestWork-2 </h3>';

echo 'Самостоятельная работа №2:<br><br>

Мы создаём страничку /index.php?page=game1 под игру.<br> Создаются 2 персонажа,
у обоих по 10хп (2 сессионных переменных), создаётся форма, где пользователь<br>
вводит число от 1 до 3 и отправляет запрос на сервер.<br> На сервере запустить
rand(1,3), и если значение человека с значением случайным совпадает, то снимаются<br>
ХП с персонажа человека (клиента), если не совпадают - с серверного персонажа.<br>
Отнимать надо от 1 до 4хп, случайным образом). То есть вероятность 33%, что<br>
отнимутся у клиента, и 66%, что у серверного персонажа.<br> В момент, когда у одного
из персонажей ХП становится 0 и ниже, - перебрасывать на другую страницу при помощи<br>
переадресации (header) на страницу index.php?module=games&page=game1over , и выводить<br>
текст, победил ли игрок, или система. <br>Не забываем, что для удобства пользователя
необходимо выводить всю известную информацию, то есть какой урон был нанесён, кто<br>
кому нанёс, сколько сейчас хп осталось у каждого игрока.<br> Так же возможность начать
игру заново.<br> Желательно для корректировки системы использовать переменные-свойства,<br>
то есть 10hp - это $basehp , то есть изменив эту переменную скрипт будет иным.<br>';

$f = $_SESSION;
?>

<style>
.error {color: #FF0000;}
</style> 
<h2>Task Solution</h2>
<form action="/form.php" method="post">    
    <br>
    <select name="kick" style="font-size: x-large; box-shadow: inset 0px 0px 2px 2px ">    
        <option value="isempty" style="color:black; font-size: 20px;">выбор хода</option>
        <option value="1" style="color:black; font-size: 20px;">1</option>
        <option value="2" style="color:black; font-size: 20px;">2</option>
        <option value="3" style="color:black; font-size: 20px;">3</option>
    </select>
    <?php if(!empty($f['error_input'])) { ?>
    <span class="error"> <?php echo $f['error_input']; ?>
    </span> 
    <?php } ?>
    <br><br>    
    <input type="submit" value="send" />
    <br><br>
    <div>
    <b>Ваш персонаж</b>
    <div>
        <div>
            <?php
            echo 'Осталось '.$_SESSION['men'].' жизни';
            ?>
        </div>
    </div>
    </div>
    <br>
    <div>
        <b>Персонаж Компа</b>
        <div>
            <div>
                <?php
                echo 'Осталось '.$_SESSION['comp'].' жизни';
                ?>
            </div>
        </div>
    <div>
            
</form>
<form name = "myform" action = "/form.php" method = "POST">
 
