<?php
session_start();

echo '<h3>HOMEWORK-3</h3>';

echo 'Форма. В форме поля: Имя, Мыло, Дата рождения (3 селекта: число, месяц, год), Пол (радио), Поле сообщения(textarea).<br>
Валидация полей.<br>
Поле имени должно содержать только одно слово, должно быть не менее 4 символов и не более 15 символов.<br>
Поле мыло далжно содержать "собачку".<br>
Поля даты рождения нужно реализовать таким образом, при котором при выборе 31 февраля выдаст ошибку, чтобы все три поля <br>были заполненными, а высокосный год не учитывать.<br>
Поле пол не должно быть пустым.<br>
Поле сообщения. не должно быть пустым, содержать не менее 25 символов; заменить неприличных слов;  сделать, чтобы все <br>русские символы перевелись на латинские так, чтобы русские слова читались английскими буквами.<br><br>

Вывести:<br>
1. Ваше имя: (имя);<br>
2. Ваше мыло: (мыло);<br>
3. Вам (количество полных лет) лет;<br>
4. Ваш пол: (пол);<br>
5. (Сообщение)<br><br>';

$f = $_SESSION;
?>

<style>
.error {color: #FF0000;}
</style> 

<h2>Task Solution</h2>
<p><span class="error">* обязательное поле</span></p>
<br><br>

<form method="post" action="/formHw3.php">  

  Имя: <span class="error">* </span>
  <input type="text" name="name" value="<?php echo !empty($f['valid_name']) ? $f['valid_name'] : ''; ?>" /> <?php if(!empty($f['error_name'])) { ?>
  <span class="error"> <?php echo $f['error_name']; ?>
  </span> 
  <?php } ?>  
  <br><br>

  E-mail: <span class="error">* </span>
  <input type="text" name="email" value="<?php echo !empty($f['valid_email']) ? $f['valid_email'] : ''; ?>" /> <?php if(!empty($f['error_email'])) { ?>
  <span class="error"> <?php echo $f['error_email']; ?>
  </span> 
  <?php } ?>  
  <br><br>
 

Дата рождения: <span class="error">* </span>
<select name="day">
<?php     
    $d = date("d"); // принимаем текущий день    
    for ($i=1; $i<32; $i++){
        if ($i == $d) echo"<option value = $d selected>".$i."</option>";    // показываем текущий день по умолчанию
        else
        echo "<option value = $i>".$i."</option>";}    
?>
</select>

<select name="month">
<?php 
    $m = date("m"); // принимаем текущий месяц
    $m = (int)$m; // обрезаем лишние нули впереди - 01 до 1 и т.д.    
    $month = array(1=>январь, 2=>февраль, 3=>март, 4=>апрель, 5=>май, 6=>июнь, 7=>июль, 8=>август, 9=>сентябрь, 10=>октябрь, 11=>ноябрь, 12=>декабрь);

    for ($i=1; $i<13; $i++){
        if ($i == $m) echo"<option value = $i selected>".$month[$i]."</option>";    // показываем текущий месяц по умолчанию
        else
        echo "<option value = $i>".$month[$i]."</option>";}    
?>
</select>
 
<select name="year">
<?php 
    $y = date("y"); // принимаем текущий год
    $y =  2000+$y; // добавляем 2000 т.к. выводит 13, а надо 2013 год    
    $l=$y+1; // добавляем единичку для полного цикла до текущего значения
    for ($i=1900; $i<$l; $i++){
        if ($i == $y) echo"<option value = $y selected>".$i."</option>";    // показываем текущий год по умолчанию
        else
        echo "<option value = $i>".$i."</option>";}    
?>
</select>
<?php if(!empty($f['error_date'])) { ?>
<span class="error"> <?php echo $f['error_date']; ?>
</span> 
<?php } ?>    
<br><br>

Пол: <span class="error">* </span>
<input type="radio" name="gender"  value="Female"
<?php echo !empty($f['valid_gender']) && $f['valid_gender']=='Female' ? 'checked' : ''; ?>/>Женский
<input type="radio" name="gender"  value="Male"
<?php echo !empty($f['valid_gender']) && $f['valid_gender']=='Male' ? 'checked' : ''; ?>/>Мужской 
<?php 
echo !empty($f['error_gender']) ? '<span class="error">'.$f['error_gender'].'</span>' : '';
?>

<p> Комментарий: <span class="error">* </span></p>  
<textarea name="comment" rows="5" cols="40" value="" ><?php echo !empty($f['valid_comment']) ? $f['valid_comment'] : ''; ?> </textarea>  
<?php if(!empty($f['error_comment'])) { ?>
<span class="error"> <?php echo $f['error_comment']; ?>
</span> 
<?php } ?>    
<br><br>  
<input type="submit" name="submit" value="Отправить"> 
</form>  

<form name = "myform" action = "/hw3.php" method = "POST">
 
