<?php 
echo 'HOMEWORK - 4<br><br>';
echo 'Реализовать постраничную навигацию(пагинацию) и выводить по 10 строк из таблицы БД на каждой странице.<br> Нужно узнать сколько всего строк в таблице и посчитать количество необходимых страниц.<br><br>';
echo 'Всего $max элементов<br><br>';
echo 'Количество элементов на странице: 10<br><br>';

define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DATABASE', 'ecloc');

$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
//определяем количество элементов и задаем $max
$sql_c = "SELECT COUNT(*) AS `kol` FROM `users`";
$query_c = mysqli_query($connect, $sql_c);
$res_c = mysqli_fetch_assoc($query_c);
$max = $res_c['kol'];

$page=1;
$n=10;
$pages=ceil($max/$n);
for ($i=1; $i<=$pages; $i++){
    echo '<a style="margin:10px;" href="/index.php?page='.$i.'"> page '.$i.' </a>';
}
if(!empty($_GET['page'])){
    $page=$_GET['page'];
}
echo '<br><br>';
$sql = "SELECT * FROM users ORDER BY user_id ASC LIMIT ".($page-1)*$n.", ".$n."";
$query=mysqli_query($connect, $sql);
while($res[] = mysqli_fetch_assoc($query)){
$users=$res;
}
foreach($users as $u){
  echo 'Name: ' .$u['user_name'].'. Password: '.$u['password'].'<br/>';
}
?>
