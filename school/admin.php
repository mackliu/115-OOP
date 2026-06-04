<?php include_once "include/db_conn.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/admin-layout.css">
    <link rel="stylesheet" href="css/main-layout.css">
    <link rel="stylesheet" href="css/card.css">
    <link rel="stylesheet" href="css/table.css">
    <link rel="stylesheet" href="css/form.css">
    <link rel="stylesheet" href="css/modal.css">    
</head>
<body>
    <!-- 頂部導航欄 -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.php" class="nav-logo">
                <span>🏫</span>
                翠園高中
            </a>
            <ul class="nav-links">
                <li><a href="?inc=news">消息管理</a></li>
                <li><a href="?inc=classrooms">班級</a></li>
                <li><a href="?inc=students">學生</a></li>
                <li><a href="?inc=subjects">科別</a></li>
            </ul>
            <div class="nav-buttons">
                <a href="logout.php" class="btn-login">登出</a>
            </div>
        </div>
    </nav>
    <main class='main-content'>

    <?php
    $inc=(isset($_GET['inc']))?$_GET['inc']:'classrooms';
    $file="./include/".$inc.".php";

    if(file_exists($file)){
        include $file;
    }else{
        include "./include/classrooms.php";
    }
    
    ?>


    </main>


</body>
</html>