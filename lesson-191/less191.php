<?php 


$a = new Date;
echo $a->today; // должен иметь public свойство today, в котором хранится текущая дата (заполняется в __construct).
echo '<br>';
echo $a->wMm(); // определять текущий день недели и месяц (словом, по-русски) и иметь для этого соответствующие методы.
echo '<br>';
echo $a->wM(); // определять текущий день недели и месяц (словом, по-русски) и иметь для этого соответствующие методы.
echo '<br>';
echo $a->weekday; //  public свойство weekday, в котором хранится текущий день недели (по-русски).
echo '<br>';
echo $a->month; //  public свойство month, в котором хранится текущий месяц (по-русски).
echo '<br>';
echo $a->weekday1(6); // метод weekday1, в который выводит заданный день недели (по-русски).
echo '<br>';
echo $a->outdate('1991-12-12'); //принимать дату в sql-формате, а возвращать в заданном. принимать дату в формате '31.12.2018', а возвращать в заданном.
echo '<br>';
var_dump($a->razn('12-12-2018 20:00','12-12-2020 21:15')); // возращает массив, в котором содержится количество лет, месяцев, дней, часов, минут, секунд в $num.
echo '<br>';



class Date {

  public $today;
  public $weekday;
  public $month;

  function __construct(){
    $this->today = date("d.m.Y");
  }

  public function weekday(){
    $week = date('N');
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

  public function wM(){
    return $this->weekday().'-'.$this->month();
  }

  public function wMm(){
	return date('d').'-'.$this->month().'-'.date('Y').'года';
}


  public function weekday1($week){
    
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
        return $value;
      }
    }
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

  public function outdate($incomdate){
    //$incomdate = "1 January 2019";
        $newdate = strtotime($incomdate); // переводит из строки в дату
        $outdate = date("d/m/Y", $newdate); // переводит в новый формат
      return $outdate;
  }


  public function razn($date1,$date2){
        $dateStart = strtotime($date1);
        $dateFinish = strtotime($date2); // переводит из строки в дату
        $res = abs(gmdate($dateStart) - gmdate($dateFinish));
    return $this->secToArr($res);
  }

  
  private function secToArr($date_sec){
    $date1 = strval(gmdate("Y.m.d.H.i.s", $date_sec));
    $arr = explode('.', $date1);
    $arr[0] = ''. $arr[0] - 1970 . '';
    $arr[1] = ''. $arr[1] - 1 . '';
    $arr[2] = ''. $arr[2] - 1 . '';
    return $arr;
  }

}

 ?>




