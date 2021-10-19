<?php
echo 'test-4 <br><br>';
echo 'Вывести на экран все шестизначные счастливые билеты.<br>
Билет называется счастливым, если сумма первых трех цифр в
номере билета равна сумме последних трех цифр.<br> Найдите
количество счастливых билетов и процент от общего числа билетов.<br><br>';
	
function happyTickets()
{
	$result = array();
	$k = 0;	
	for($i = 1000001; $i < 2000000; $i++){			
		$n = substr( (string)$i, 1, 6);
		$leftSumm = $n[0] + $n[1] + $n[2];
		$rightSumm = $n[3] + $n[4] + $n[5];
		if($leftSumm == $rightSumm){
			$result[] = $n;
			$k++;			
		}		
	}	
	$percentTickets = $k/1000000*100;
	echo 'количество шестизначных счастливых билетов - '. $k;
	echo '<br><br>';
	echo 'процент шестизначных счастливых билетов - '. $percentTickets . '%';
	echo '<br><br>';
	return $result ? $result : false;
}
echo '<pre>';
print_r(happyTickets());
echo '</pre>';
?>
