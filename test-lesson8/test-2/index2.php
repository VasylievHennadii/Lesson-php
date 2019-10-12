<?php
echo 'test-2';
echo '<br><br>';
echo 'Упорядочить значения массива по возрастанию. Реализовать
двумя способами: с помощью стандартной функции и без.<br><br>';

function mySort($arr1) {
  $tmp = 0;
  for ($i=0; $i < count($arr1)-1; $i++){
    for ($j=0; $j < count($arr1)-1-$i; $j++) {
      if($arr1[$j] > $arr1[$j+1]) {
        $tmp=$arr1[$j];
        $arr1[$j] = $arr1[$j+1];
        $arr1[$j+1] = $tmp;
      }
    }    
  } 
  return ($arr1);
}

$arr1 = array(1,5,4,6,8,-9,-2,3,1,58);
echo 'исходный массив <br><br>';
print_r ($arr1);
echo '<br><br>полученный массив <br><br>';
print_r (mySort($arr1));
echo '<br><br>';

// -------------------------------------------------------------
echo '<br><br>';
echo 'Решение с помощью функции sort(array) в языке PHP';
echo '<br><br>';
$arr2 = array(5,-3,8,-58,98,15,25,15,-5,0);
echo 'исходный массив <br><br>';
print_r ($arr2);
echo '<br><br>полученный массив <br><br>';
sort($arr2);
print_r ($arr2);
?>
