<?php 
echo 'HOMEWORK - 4<br><br>';
echo 'Всего $max элементов<br><br>';
?>

<form action="/index.php" method="get">
Количество элементов на странице:
    <select name="quantity" id="">        
        <option value="5">5</option>
        <option value="7">7</option>
        <option value="10">10</option>
        <option value="13">13</option>
        <option value="17">17</option>
        <option value="25">25</option>
        <option value="50">50</option>
    </select>
        
    <button type="submit">отправить</button>
</form>

<?php
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
if(empty($_GET['quantity'])){
$_GET['quantity']=10;
}
$n=$_GET['quantity'];
$pages=ceil($max/$_GET['quantity']);

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
