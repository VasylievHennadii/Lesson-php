<?php
echo 'test-4 <br><br>';
echo 'Вывести на экран все шестизначные счастливые билеты.<br>
Билет называется счастливым, если сумма первых трех цифр в
номере билета равна сумме последних трех цифр.<br> Найдите
количество счастливых билетов и процент от общего числа билетов.<br><br>';
	
function happyTickets()
{
	$result = array();
	$k=0;
	for($i=0;$i<=999999;$i++){		
		$n=str_pad($i, 6, "0", STR_PAD_LEFT);
		$leftPart = substr( (string)$n , 0, 3 );
		$rightPart = substr( (string)$n , 3, 3 );		
		
		$leftSumm = $rightSumm =  0;		 
		
		for($j=0;$j<=strlen($leftPart)-1;$j++){
			$leftSumm  += (int) $leftPart[$j];
			$rightSumm += (int) $rightPart[$j];			
		}	
		
		if($leftSumm == $rightSumm ){
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
var_dump(happyTickets());
echo '</pre>';
?>
