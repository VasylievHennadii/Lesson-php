<?php 
session_start();
if(!empty($_GET['exit'])){
	unset($_SESSION['output']);
	unset($_SESSION['city_arr']);
	unset($_SESSION['error']);
	unset($_SESSION['info']);
	header('Location: /index.php');
    exit;
}
$game1 = new Game;
$post = $_POST['city'];
$arrTemp = array();
if(!empty($_SESSION['output'])){
	if ($game1->firstLet($post) != $game1->lastLet($_SESSION['output'])) {
		 $_SESSION['error'] = 'Введите город который начинается на - '. mb_strtoupper($game1->lastLet($_SESSION['output']));
		header('Location: /index.php');
		exit;
	} 		
}
unset( $_SESSION['error']);
if(!empty($post)){
	if($game1->validPost($post,$_SESSION['city_arr'])){
		$cityV = $game1->validPost($post,$_SESSION['city_arr']);
		$last1 = $game1->lastLet($cityV);
		$arr2 = $game1->deletValArr($cityV,$_SESSION['city_arr']);
		$_SESSION['city_arr'] = $arr2;
		$_SESSION['output'] = $game1->output($cityV,$_SESSION['output']);
		if($game1->searchCity($last1,$arr2)){
			$cityServ = $game1->searchCity($last1,$arr2);
			$arr3 = $game1->deletValArr($cityServ,$arr2);
			$_SESSION['city_arr'] = $arr3;
			$_SESSION['info'] = 
			'Компьютер ответил - ' .$cityServ.'<br><br>Введите город который начинается на - '. mb_strtoupper($game1->lastLet($cityServ));
			$_SESSION['output'] = $game1->output($cityServ,$_SESSION['output']);
		}else{
			unset($_SESSION['info']);
			$_SESSION['error'] = 'В базе нет городов на '.mb_strtoupper($game1->lastLet($_SESSION['output']));
		}
	}else{
			$_SESSION['error'] = 'Этого города нет в базе или уже был';
	}
}
header('Location: /index.php');
exit;

class Game{
	public function validPost($post,$arr)
	{
		foreach ($arr as $v) {
			if (mb_strtolower($post) == mb_strtolower($v) ) {
				return $v;
				break;
			}
		}
		return false;
	}
	public function lastLet($city){
		return mb_substr($city,-1);
	}
	public function  firstLet($city){
		return mb_strtolower(mb_substr($city,0,1));
	}
	public function deletValArr($del,$arr){
		foreach ($arr as $k => $s) {
			if (mb_strtolower($del) == mb_strtolower($s)) {
				unset($arr[$k]);
				return $arr;
				break;
			}			
		}
	}
	public function searchCity($last,$arr){
		foreach ($arr as $k => $s) {
			if ($last == mb_strtolower(mb_substr($s,0,1))) {
				return $s;
				break;
			}
		}
		return false;
	}
	public function output($a,$str) {
		return $str = $str.','. $a;
	}
}
 ?>