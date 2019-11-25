<?php 
session_start();
echo 'Занятие 16. Игра "Города"<br><br>';
$f = $_SESSION;

  if(!empty($_POST['start'])){    
    require_once ("bd.php");
    $sql = "SELECT * FROM cityarr ORDER BY city_id ";
      $query=mysqli_query($connect, $sql);       
      while($ress[] = mysqli_fetch_assoc($query)){
      $users=$ress;    
      }      
      foreach($users as $u){        
        $_SESSION['mas_city'][] = $u['city_name'];
      }    
  }
?>

<form action="form16.php" method="post">
  <input type="submit" name="exit" value="exit" style=" background:  #FF0000" >
</form>

<p>Игрок вводит название города</p>
<form action="form16.php" method="post">
    <input type="text" name="inCity" value="<?php echo !empty($f['valid_input']) ? $f['valid_input'] : ''; ?>" /> <?php if(!empty($f['error_input'])) { ?>
            <span > <?php echo $f['error_input']; ?>
            </span> 
            <?php } ?>
            <br><br>
    <input type="submit" name="submit" value="ввод">
</form>

 
<?php

echo '<h4>Ходы игрока</h4>';
echo $_SESSION['inCity'];
echo '<h4>Ходы компьютера</h4>';
echo $_SESSION['compCity'];

if(!empty($_SESSION['mas_city'])){
  echo '<h3>Список городов подсказка</h3>';
  $res=$_SESSION['mas_city'];  
  // unset ($_SESSION['mas_city']);
  sort($res);
  foreach($res as $k){
  echo $k.'-';
  }  
}


?>