<?php
echo 'test-1';
echo '<br><br>';
echo 'Определите, есть ли в массиве повторяющиеся элементы.<br><br>';

function duplicateArrayElements($arr){   
  for($i=0; $i< count($arr); $i++){
    for($j=0; $j< count($arr); $j++) {
      if($arr[$i]===$arr[$j] && $i!=$j){
      return 'в массиве есть одинаковые элементы';
      } 
    }
  }
  return 'нет одинаковых элементов';
}
$arr = array(1,2,3,4,5,6,7,8,9,-1);
echo 'исходный массив <br><br>';
print_r ($arr);
echo '<br><br>';
echo (duplicateArrayElements($arr));
echo '<br><br>';

?>
