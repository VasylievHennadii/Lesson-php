<?php
session_start();

if(!empty($_POST) && $_POST['kick'] == 'isempty'){
  $_SESSION['error_input'] = 'Сделайте свой выбор';
  unset($_SESSION['valid_input']);
  header('Location: /index.php');
  exit;
} else {
  $_SESSION['valid_input']=$_POST['kick'];
  unset($_SESSION['error_input']);
}

if(!isset($_SESSION['men'])){
  $_SESSION['men']=10;
  $_SESSION['comp']=10;
}
      
if(isset($_POST['kick'])){          
  if($_POST['kick'] == rand(1, 3))
      $_SESSION['men'] = $_SESSION['men'] - rand(1, 4);
  else 
      $_SESSION['comp'] =  $_SESSION['comp'] - rand(1, 4);

  if($_SESSION['men'] <= 0){    
    header("Location: /index1.php");
    exit();
  }
  elseif($_SESSION['comp'] <= 0){    
    header("Location: /index1.php");
    exit();
  }
  header("Location: /index.php");
  exit();
}   
          
?>
<br><br>
<a href="/index.php">back</a>
