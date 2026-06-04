<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>會員註冊</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link rel="stylesheet" href="css/form.css">
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
            <h1>會員註冊</h1>
            <p>✨ 歡迎加入我們的社區 ✨</p>
        </div>

        <div class="success-message" id="successMessage">
            表單已成功提交！
        </div>

        <form id="registerForm" action="api_register.php" method='post'>
            <div class="form-group">
                <label for="account">帳號 *</label>
                <input type="text" id="account" name="account" placeholder="請輸入帳號" required >
            </div>

            <div class="form-group">
                <label for="password">密碼 *</label>
                <input type="password" id="password" name="password" placeholder="請輸入密碼" required >
            </div>

            <div class="form-group">
                <label for="email">電郵 *</label>
                <input type="email" id="email" name="email" placeholder="請輸入電郵" required >
            </div>

            <div class="form-group">
                <label for="tel">電話 *</label>
                <input type="text" id="tel" name="tel" placeholder="請輸入電話號碼" required >
            </div>

            <div class="form-group">
                <label for="birthday">生日 *</label>
                <input type="date" id="birthday" name="birthday" required >
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-submit">註冊</button>
                <button type="reset" class="btn-reset">清空</button>
            </div>
        </form>

        <div class="info-text">
            * 表示必填項目
        </div>
    </div>
</body>
</html>