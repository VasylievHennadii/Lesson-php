<h3>Домашнее задание №1
Домашнее задание: составить таблицу умножения для всех чисел
от 1 до 9 включительно.
Сначала вся таблица умножения забивается в 2-мерный массив вида
$arr[первый_множитель][второй_можнитель] = результат и потом
выводится на экран в таблице в виде
{первый можитель}x{второй_множитель}={результат},
в каждой клетке по одной операции умножения.
Не обязательно это должно быть в таблице, можно и просто чтобы
выводилось построчно, главное не верстка, а выполнение алгоритма.

1x1 = 1
1x2 = 2
1x3 = 3
...
1x9 = 9
2x1 = 2
2x2 = 4
...
2x9 = 18
...
9x9 = 81</h3>


<h2>homework-1 lesson-3 <br> first option</h2>

<?php
$a = 1;
$b = 14;
$mass = array();
for($i=$a; $i<=$b; $i++){
    for($j=$a; $j<=$b; $j++){
        $mass[$i][$j] = $i * $j;       
    }
}
echo '<table>';
echo '<tr>';
$index = 0;
foreach($mass as $k1 => $v1) {    
    echo '<td>';
    foreach($v1 as $k2 => $v2) {       
        echo '<p style="border: double;margin: 0px -2px; text-align: center; padding: 2px;">' ;
        echo $k1 . ' * ' . $k2 . ' = ' . $v2 ;
        echo '</p>';
    }
    
}
echo '</tr>';
echo '</table>';
echo '<br><br>';
?>


<?php
$a = 1;
$b = 15;
$mass = array();
for($i=$a; $i<=$b; $i++){
    for($j=1; $j<=$b; $j++){
        $mass[$i][$j] = $i * $j;       
    }
}
echo '<div style="width: 100%; margin: 0 auto; max-width: 1170px; padding: 0 15px;">';
echo '<h2 style="text-align: center; ">ДОМАШНЯЯ РАБОТА<br>lesson-3<br> hw-1<br> second option</h2>';
echo '<div style="display: flex; flex-wrap: wrap;">';
foreach($mass as $k1 => $v1) {    
    echo '<div style="width: 25%; padding: 45px 15px; box-sizing: border-box;">';
    foreach($v1 as $k2 => $v2) {       
        echo '<p style="border: double;margin: 0px -2px; text-align: center; padding: 2px;">' ;
        echo $k1 . ' * ' . $k2 . ' = ' . $v2 ;
        echo '</p>';
    }
    echo '</div>';    
}
echo '</div>';
echo '</div>';

?>