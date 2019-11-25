<?php 
session_start();
echo 'Занятие 16. Игра "Города"<br><br>';
require_once ("bd.php");
if(empty($_SESSION['city_arr']) || is_null($_SESSION['city_arr'])){	
	$sql = "SELECT city_name FROM cityarr";
	$query = mysqli_query($connect,$sql);
	while ($res[] = mysqli_fetch_assoc($query)) {
		$city_arr1 = $res;
	}
		$_SESSION['city_arr'][] = ' ';
	 foreach ($city_arr1 as  $u) {
		$_SESSION['city_arr'][] = $u['city_name'] ;
	}
}
?>

<p>Введите название города</p> 
 <form action="/Form.php" method="post">
	<span style="color: black;font-size: 14px;"> <?php echo  $_SESSION['info']; ?></span> <br>
 	<span style="color: red;font-size: 14px;"> <?php echo  $_SESSION['error']; ?></span> <br>
	<input type="text" name="city"> <br><br>
	<input type="submit">
 </form>
 <a href="/Form.php?exit=1">Новая игра</a>
 <br><br>
<?php 
	echo '<br>';
	echo $_SESSION['output'];
	echo '<br><br>';
	echo '<h3>Список городов подсказка</h3>';
	$res=$_SESSION['city_arr'];    
	sort($res);
	foreach($res as $k){
	echo $k.'-';
	}  
?>