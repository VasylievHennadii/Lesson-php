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
<title>Страница блога</title>
</head>
<body>
<h2>Страница блога</h2>
    <form action="index.php" method="post">
        <p>
            <input type="submit" name="output" value="На главную" style=" background: green;">        
        </p>        
    </form>
    <?php
    
    // пагинация
    $connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    //определяем количество элементов и задаем $max
    $sql_c = "SELECT COUNT(*) AS `kol` FROM `blogs`";
    $query_c = mysqli_query($connect, $sql_c);
    $res_c = mysqli_fetch_assoc($query_c);
    $max = $res_c['kol'];

    $page=1;
    if(empty($_GET['quantity'])){
    $_GET['quantity']=10;
    }
    $n=$_GET['quantity'];
    $pages=ceil($max/$_GET['quantity']);

    for ($i=1; $i<=$pages; $i++){
        echo '<a style="margin:10px;" href="/blog.php?page='.$i.'"> page '.$i.' </a>';
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