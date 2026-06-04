<!DOCTYPE html>
<html lang="zh-TW">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員登入</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/form.css">

        .form-footer {
            text-align: center;
            margin-top: 20px;
            color: #ff9800;
            font-size: 13px;
        }

        .form-footer a {
            color: #ffc107;
            text-decoration: none;
            font-weight: bold;
        }

        .form-footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
        <!-- 頂部導航欄 -->
    <nav class="navbar">
        <div class="nav-container">
            <a href="index.html" class="nav-logo">
                <span>🏫</span>
                翠園高中
            </a>
            <ul class="nav-links">
                <li><a href="#about">關於我們</a></li>
                <li><a href="#news">最新消息</a></li>
                <li><a href="#contact">聯絡方式</a></li>
            </ul>
            <div class="nav-buttons">
                <a href="login.php" class="btn-login">登入</a>
                <a href="register.php" class="btn-register">註冊</a>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="form-header">
            <h1>會員登入</h1>
            <p>✨ 歡迎回來 ✨</p>
        </div>

        <div class="success-message" id="successMessage">
            登入成功！
        </div>
        <?php if(isset($_GET['err'])):;?>
        <div class="fail-message" id="failMessage">
            帳號或密碼錯誤！
        </div>
        <?php endif;?>

        <form id="loginForm" action="api_login.php" method="post">
            <div class="form-group">
                <label for="account">帳號 *</label>
                <input 
                    type="text" 
                    id="account" 
                    name="account" 
                    placeholder="請輸入帳號" 
                    required
                >
            </div>

            <div class="form-group">
                <label for="password">密碼 *</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="請輸入密碼" 
                    required
                >
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">登入</button>
                <button type="reset" class="btn-reset">重置</button>
            </div>
        </form>

        <div class="form-footer">
            還沒有帳號？ <a href="02-register.php">立即註冊</a>
        </div>

        <div class="info-text">
            * 表示必填項目
        </div>
    </div>
</body>
</html>
