
<!-- CSS是在admin.php中使用link標籤引入的 -->
</head>
<body>
    <div class="delete-container">
        <div class="warning-icon">
            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                <path d="M1 21h22L12 2 1 21zm12-3h-2v-2h2v2zm0-4h-2v-4h2v4z"/>
            </svg>
        </div>
        
        <h1>刪除確認</h1>
        <?php 
        $news=$pdo->query("select * from `news` where `id`='{$_GET['id']}'")->fetch();
        ?>
        <div class="warning-message">
            你是否確認要刪除以下消息？一旦確認刪除後，該消息的資料也會一併刪除！
        </div>
        
        <div class="student-info">
            <p>
                <span>消息：</span>
                <span class="school-num"><?= htmlspecialchars($news['subject'] ?? '') ?></span>
            </p>
            <p>
                <span>內容：</span>
                <span class="student-name"><?= htmlspecialchars($news['content'] ?? '') ?></span>
            </p>
        </div>
        
        <div class="alert-text">
            ⚠️ 此操作無法復原
        </div>
        
        <div class="button-group">
            <form method="POST" action="./include/api_delete_news.php" style="flex: 1;">
                <input type="hidden" name="id" value="<?= htmlspecialchars($news['id'] ?? '') ?>">
                <button type="submit" class="btn-confirm">確認刪除</button>
            </form>
            
            <button class="btn-cancel" onclick="window.history.back()">取消</button>
        </div>
    </div>
