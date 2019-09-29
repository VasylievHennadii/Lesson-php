<h3>Дополнительное Домашнее задание №1 <br>
Домашнее задание: Сгенерировать квадратную матрицу случайных чисел (nxn). Переменная n - задается перед выполнением задания.<br> Вывести матрицу на экран, выделить диагональные элементы другим цветом <br>
Найти сумму диагональных элементов данной матрицы.</h3>


<?php
$n = 9;
$mass = array();
$sumDiagonalsOfMatrix = 0;
$sumLeftDiagonal = 0;
$sumRightDiagonal = 0;
echo '<table style="display: flex; justify-content: space-around; text-align: center;">';
for($i=0; $i<$n; $i++){
    echo '<tr>';
    for($j=0; $j<$n; $j++){
        $mass[$i][$j] = rand(1, 10);        
        if ($i==$j || $i+$j == $n-1) {
            echo '<td style="color: red; padding: 10px 15px;">';                                     
        } 
        else {
            echo '<td style="padding: 10px 15px;">';
        }
        if ($i==$j) {
            $sumLeftDiagonal = $sumLeftDiagonal + $mass[$i][$j];
        }
        if ($i+$j == $n-1) {
            $sumRightDiagonal = $sumRightDiagonal + $mass[$i][$j];
        }
        echo $mass[$i][$j];       
    }
    echo '</tr>';
    $sumDiagonalsOfMatrix = $sumLeftDiagonal + $sumRightDiagonal;
}
echo '</table>';
echo '<br><br>';
echo "Сумма левой диагонали = $sumLeftDiagonal";
echo '<br><br>';
echo "Сумма правой диагонали = $sumRightDiagonal";
echo '<br><br>';
echo "Сумма диагоналей матрицы   $sumLeftDiagonal + $sumRightDiagonal = $sumDiagonalsOfMatrix";

?>

