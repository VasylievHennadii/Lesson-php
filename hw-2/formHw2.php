<?php
$mass = array();
$mass['joker'] = 'the face value of the card is the largest - he is the president';
$mass['6'] = 6;
$mass['7'] = 7;
$mass['8'] = 8;
$mass['9'] = 9;
$mass['10'] = 10;
$mass['Jack'] = 11;
$mass['Queen'] = 12;
$mass['King'] = 13;
$mass['Ace'] = 14;
if(!empty($_POST)) {
  if($_POST['suit'] == 'joker' || $_POST['dignity'] == 'joker') {
    echo '<h2>Joker has already become president, so make your choice in favor of another candidate</h2>';    
    echo '<img src="/img/jokerjoker.jpg" style="width: 20%;">';
  } else {
    echo '<img src="/img/'. "$_POST[suit]" . "$_POST[dignity]" . '.jpg" style="width: 20%;">';
  }  
    echo '<br><br><br>';
    $n = $_POST['dignity'];
    if($_POST['suit'] !== 'joker' || $_POST['dignity'] == 'joker') {
      echo "<h3>dignity card is : $mass[$n]</h3>";
    }
    
}

?>
<br><br>
<!-- <a href="/domains/test-site/lesson-6/less6.php">back</a> -->
<a href="/hw2.php">back</a>
