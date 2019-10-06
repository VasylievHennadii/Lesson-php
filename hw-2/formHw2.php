<?php

if(!empty($_POST)) {
  if($_POST['suit'] == 'joker' || $_POST['dignity'] == 'joker') {
    echo '<h2>Joker has already become president, so make your choice in favor of another candidate</h2>';    
    echo '<img src="/img/jokerjoker.jpg" style="width: 25%;">';
  } else {
    echo '<img src="/img/'. "$_POST[suit]" . "$_POST[dignity]" . '.jpg" style="width: 25%;">';
  }  
}

?>
<br><br>
<!-- <a href="/domains/test-site/lesson-6/less6.php">back</a> -->
<a href="/hw2.php">back</a>
