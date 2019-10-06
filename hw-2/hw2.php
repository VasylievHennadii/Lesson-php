
<h3>HOMEWORK-2</h3>


<?php
echo 'Выбор игральной карты по масти и старшинству<br><br >';
?>

<form action="/formHw2.php" method="post">    
    <br><br>
    <select name="suit" style="font-size: x-large; box-shadow: inset 0px 0px 2px 2px ">    
        <option value="joker" style="color:black; font-size: 20px;">card suit selection</option>
        <option value="spades" style="color:black; font-size: 20px;">&#9824</option>
        <option value="diamonds" style="color:red; font-size: 20px;">&#9830</option>
        <option value="clubs" style="color:black; font-size: 20px;">&#9827</option>
        <option value="hearts" style="color:red; font-size: 20px;">&#9829</option>   

    </select>
    <br><br>
    <select name="dignity" style="font-size: x-large; box-shadow: inset 0px 0px 2px 2px ">
        <option value="joker">card dignity selection</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="Jack">Jack</option>
        <option value="Queen">Queen</option>
        <option value="King">King</option>
        <option value="Ace">Ace</option>
    </select>
    <br><br>
    <input type="submit" value="ok" />
</form>

