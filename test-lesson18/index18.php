<?php 
echo 'Необходимо вывести дату ближайшей доставки в формате: "30 ноября".<br>
Алгоритм следующий: если сегодня времени меньше, чем 20-00, то<br>
доставка завтра, если более 20-00, то послезавтра! Если день<br>
доставки попадает на праздничный день, то доставка переносится на<br>
следующий день после праздника. <br><br>';


$a = new Date;


echo 'Дата заказа: <br>';
echo $a->newFormatDate(0);
echo '<br>';
echo 'День недели : <br>';
echo $a->weekday();
echo '<br>';
echo 'Время заказа: <br>';
echo $a->time();
echo '<br>';
echo '<br><br>';

if(date('H') < 20 && date('w') < 5){
    echo 'доставка на :';
    echo '<br>';
    echo $a->newFormatDate(1);
} elseif(date('w') < 5 && date('H') >= 20){ 
    if(date('w')==4){        
        echo 'доставка на :';
        echo '<br>';
        echo $a->newFormatDate(4);
    }   
    echo 'доставка на :';
    echo '<br>';
    echo $a->newFormatDate(2);
} elseif(date('H') < 20 && date('w') >= 5){    
    echo 'доставка на :';
    echo '<br>';
    echo $a->newFormatDate(3);
} else{    
    echo 'доставка на :';
    echo '<br>';
    echo $a->newFormatDate(4);
}   


class Date {
    public $today;
	public $weekday;
    public $month;
    
    function __construct(){
		$this->today = date("d.m.Y H:i:s");		
    }
    
    public function weekday(){
		$week = date('w');
		$arr = [
			'1' => 'Понедельник ',
			'2' => 'Вторник',
			'3' => 'Среда',
			'4' => 'Четверг',
			'5' => 'Пятница',
			'6' => 'Суббота',
			'7' => 'Воскресение',
		];

		foreach ($arr as $key => $value) {
			if($week == $key){
				return $this->weekday = $value;
			}
		}
    }
    
    public function newFormatDate($b){
		return (date('d')+$b).'-'.$this->month().'-'.date('Y').'года';
    }

    public function time(){
        return date('H').':'.date('i').':'.date('s');
    }
    
    public function month(){
		$week = date('n');
		$arr = [
			'1' => 'Январь',
			'2' => 'Февраль',
			'3' => 'Март',
			'4' => 'Апрель',
			'5' => 'Май',
			'6' => 'Июнь',
			'7' => 'Июль',
			'8' => 'Август',
			'9' => 'Сентябрь',
			'10' => 'Октябрь',
			'11' => 'Ноябрь',
			'12' => 'Декабрь',
		];

		foreach ($arr as $key => $value) {
			if($week == $key){
				return $this->month = $value;
			}
		}
	}

}

?>
