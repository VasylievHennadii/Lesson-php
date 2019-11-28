<?php 
session_start();
if(!empty($_GET['route'])){
    $filename = $_SERVER['DOCUMENT_ROOT'] . "/controllers/". $_GET['route'] . ".php";
}
require_once $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
mysqli_query($connect, "SER CHARSET UTF8");
require_once $_SERVER['DOCUMENT_ROOT'] . "/system/request.php";

if($_SERVER['REQUEST_URI'] == '/'){
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/home.php";
} elseif(!empty($filename) && file_exist($filename)){
    require_once $filename;
} else{
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/404.php";
}



?>