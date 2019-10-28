<?php    
    session_start();

    $f = $_SESSION;

    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', '');
    define('DATABASE', 'test_blogs13');

    $connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);     

?>

<html>
<head>
<title>Личный кабинет admin</title>
</head>
<body>
<div style="display: flex; justify-content: start;">
<h2>Личный кабинет admin</h2>
    <form action="index.php" method="post" style="margin: 24px;">        
        <input type="submit" name="output" value="На главную" style=" background: green;">         
    </form>  
</div>
<h3>Внести изменения в Базу Данны</h3>
    <div style="display: flex; justify-content: start;">
    <form action="/admin.php" method="post" style="display: flex; justify-content: start;">
        <div style="padding-right: 120px;">
        <h4> Базовые данные </h4>
        Name: 
        <input type="text" name="oldName" value="" >  
        <p>
            <input type="submit" name="delete" value="Удалить" style=" background: red;">        
        </p>  
    </form>                  
        </div>
        <div>
    <form action="/admin.php" method="post">    
        <h4> Новые данные для БД</h4>
        Name: 
        <input type="text" name="newName" value="" >
        <p> Text: </p>  
        <textarea name="newComment" rows="5" cols="40" value="" ></textarea>   
        <p>
            <input type="submit" name="add" value="Добавить" style=" background: green;">        
        </p>       
        </div>        
    </form>          
    </div>    

    <?php    
    // добавление данных в БД
    if(!empty($_POST['add'])){
        $_SESSION['newName']= $_POST['newName'];    
        $_SESSION['newComment']= $_POST['newComment'];
        if(strlen($_SESSION['newName'])==0 || strlen($_SESSION['newComment'])==0){ 
            echo 'Недостаточно данных для ввода';
            echo '<br><br>';             
        } else {
            $newName=$_SESSION['newName'];
            $newComment=$_SESSION['newComment'];
            echo 'Добавлено: '. $newName . ' ' . $newComment;                   
            $result88 = "INSERT INTO blogs SET blog_name='$newName', blog_text='$newComment'";
            mysqli_query($connect, $result88); 
            unset ($_SESSION['newName']);
            unset ($_SESSION['newComment']);        
            echo '<br><br>';        
        }
    }      
    // удаление данных из БД
    if(!empty($_POST['delete'])){
        $_SESSION['oldName']= $_POST['oldName'];
        $oldName=$_SESSION['oldName'];
        if(strlen($_SESSION['oldName'])==0){
            echo 'Нет данных для удаления';
            echo '<br><br>';
        } else{
            $sql4 = "DELETE FROM blogs WHERE blog_name='$oldName'";
            mysqli_query($connect, $sql4); 
            echo 'Удалено: '. $oldName;
            echo '<br><br>';        
            unset ($_SESSION['oldName']);
        }        
    }
    // пагинация
    $connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    //определяем количество элементов и задаем $max
    $sql_c = "SELECT COUNT(*) AS `kol` FROM `blogs`";
    $query_c = mysqli_query($connect, $sql_c);
    $res_c = mysqli_fetch_assoc($query_c);
    $max = $res_c['kol'];

    $page=1;
    if(empty($_GET['quantity'])){
    $_GET['quantity']=5;
    }
    $n=$_GET['quantity'];
    $pages=ceil($max/$_GET['quantity']);

    for ($i=1; $i<=$pages; $i++){
        echo '<a style="margin:10px;" href="/admin.php?page='.$i.'"> page '.$i.' </a>';
    }
    if(!empty($_GET['page'])){
        $page=$_GET['page'];
    }
    echo '<br><br>';
    $sql = "SELECT * FROM blogs ORDER BY blog_id ASC LIMIT ".($page-1)*$n.", ".$n."";
    $query=mysqli_query($connect, $sql);
    while($res[] = mysqli_fetch_assoc($query)){
    $users=$res;
    }

    foreach($users as $u){
    echo 'Name: ' .$u['blog_name'].'. Text: '.$u['blog_text'].'<br/>';
    }
    ?>
    
</body>
</html>