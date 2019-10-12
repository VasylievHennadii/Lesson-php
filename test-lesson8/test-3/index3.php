<?php
echo 'test-3';
echo '<br><br>';
echo 'Дан массив размера n.<br> После каждого отрицательного
элемента массива вставить элемент с нулевым значением.<br><br>';

function zeroArr($mass) {
  $res = array();
  $k = 0;
  for($i=0; $i<count($mass); $i++) {
    if($mass[$i] < 0){
      $res[$k] = $mass[$i];
      $res[$k+1] = 0;
      $k = $k+2;
    } else {
      $res[$k] = $mass[$i];
      $k = $k+1;
    }
  }
  return ($res);
}
$mass = array(-1,2,-6,5,-7,8,9,-7,-6);
echo 'исходный массив <br><br>';
print_r ($mass);
echo '<br><br>полученный массив <br><br>';
print_r (zeroArr($mass));
echo '<br><br>';
?>
