<?php 
session_start();
$f = $_SESSION;

if(!empty($_POST['exit'])){    
  unset($_SESSION['valid_input']);
  unset($_SESSION['error_input']);
  unset($_SESSION['mas_city']);   
  unset($_SESSION['inCity']);
  unset($_SESSION['compCity']);
  header('Location: index.php');
  exit();
}

if(empty($_POST['inCity']) && !empty($_POST)){
  $_SESSION['error_input'] = 'Сделайте свой выбор';
  unset($_SESSION['valid_input']);
  header('Location: less16.php');
  exit();
} else {
  $_SESSION['valid_input']=$_POST['inCity'];
  unset($_SESSION['error_input']);  
}

$mas_ot1 = ['ё','ъ','ь','.',')','ы',':',';','"','\''];

if(!empty($_POST['inCity'])){
  $inCity=$_POST['inCity'];  
  $validInCity=translit($inCity);  
  $last_char=substr($validInCity, strlen($validInCity)-2, 2);
  //проверка последней буквы. не подходит - берем вторую с конца
  for($i=0; $i<count($mas_ot1); $i++){
    if($last_char==$mas_ot1[$i]){
      $last_char=substr($validInCity, strlen($validInCity)-4, 2);
    }
  }  
  $res=$_SESSION['mas_city'];  
  sort($res);
  foreach($res as $k){    
    $r=translit($k);
    $r=substr($r, 0, 2);      
    if($r==$last_char){
      $compCity=$k;      
    }
  }  
  $_SESSION['inCity']=$_SESSION['inCity'] . ' ' . $inCity;
  $_SESSION['compCity']=$_SESSION['compCity'] . ' ' . $compCity;
  if ($inCity == '') { 
    unset($inCity);
  } 
  if ($compCity == '') { 
    unset($compCity);
  } 
  header('Location: less16.php');
  exit();
}

function translit($s) {  
  $s = trim($s); // убираем пробелы в начале и конце строки
  $s = mb_strtolower($s);; // переводим строку в нижний регистр  
  return $s; 
}


?>