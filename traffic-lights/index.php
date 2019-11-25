<?php

$a = new Color;
$minits=date(i);
echo date('H:i');
echo '<br><br>';
echo "Сейчас<b> ".$minits." </b>минута. Цвет сигнала светофора<b> ".$color."</b>";
echo $a->semaphore($minits);
echo '<br><br>';
if(!empty($_POST['testminits'])){
    $testminits = $_POST['testminits'];
} else{
    $testminits = 0;
}
echo "Сейчас тестовая минута = <b> ".$testminits." </b>. Цвет сигнала светофора<b> ".$color."</b>";
echo $a->semaphore($testminits);
echo '<br>';
class Color{    
    public $semaphore;
    public function semaphore($minits){        
        $a=$minits % 6;
        if ($a>=0 && $a<3)
        {
        $color="зеленый";
        }
        elseif ($a>=3 && $a<4)
        {
        $color="желтый";
        }
        elseif ($a>=4 && $a<6)
        {
        $color="красный";
        }
        return $color;
    }
}
 
?>
<p>Введите тестовое число минут от 0 до 59</p>
<form action="index.php" method = "post">
    <input type="text" name="testminits"> <br><br>
	<input type="submit">
</form>