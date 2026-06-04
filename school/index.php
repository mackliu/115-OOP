<?php include_once './include/db_conn.php'; ?>
<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>翠園高中 - 校園首頁</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/main-layout.css">
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
                <li><a href="?#about">關於我們</a></li>
                <li><a href="?#news">最新消息</a></li>
                <li><a href="?#contact">聯絡方式</a></li>
            </ul>
            <div class="nav-buttons">
                <?php 
                if(isset($_SESSION['login'])):
                ?>
                    <a href="admin.php" class="btn-login">管理後台</a>
                <?php else: ?>
                    <a href="login.php" class="btn-login">登入</a>
                    <a href="register.php" class="btn-register">註冊</a>
                <?php endif;?>
            </div>
        </div>
    </nav>
    <?php 
    $inc=$_GET['inc']??'main';
    $file="./front/{$inc}.php";
    if(file_exists($file)){
        include $file;
    }else{
        include "./front/main.php";
    }

    ?>


    <!-- 頁腳 -->
    <footer class="footer" id="contact">
        <div class="footer-content">
            <h3>翠園高中</h3>
            <div class="footer-links">
                <a href="#">校長室</a>
                <a href="#">教務處</a>
                <a href="#">學生事務處</a>
                <a href="#">圖書館</a>
            </div>
            <div class="footer-text">
                📍 地址：台北市松山區延壽街100號
            </div>
            <div class="footer-text">
                📞 電話：(02) 2745-6789
            </div>
            <div class="footer-text">
                ✉️ 信箱：info@cuiyuan-high.edu.tw
            </div>
            <div class="footer-text" style="margin-top: 20px; border-top: 1px solid rgba(255, 255, 255, 0.3); padding-top: 20px;">
                © 2026 翠園高中 版權所有 | 隱私政策 | 服務條款
            </div>
        </div>
    </footer>

    <script>
        // 平滑滾動
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>