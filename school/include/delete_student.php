
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>刪除學生</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/modal.css">
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
        $student=$pdo->query("select * from `students` where `school_num`='{$_GET['num']}'")->fetch();
        ?>
        <div class="warning-message">
            你是否確認要刪除以下學生？一旦確認刪除後，該學生的關聯班級及成績資料也會一併刪除！
        </div>
        
        <div class="student-info">
            <p>
                <span>學號：</span>
                <span class="school-num"><?= htmlspecialchars($student['school_num'] ?? $_POST['school_num'] ?? '') ?></span>
            </p>
            <p>
                <span>姓名：</span>
                <span class="student-name"><?= htmlspecialchars($student['name']) ?></span>
            </p>
        </div>
        
        <div class="alert-text">
            ⚠️ 此操作無法復原
        </div>
        
        <div class="button-group">
            <form method="POST" action="./include/api_delete_student.php" style="flex: 1;">
                <input type="hidden" name="school_num" value="<?= htmlspecialchars($student['school_num']) ?>">
                <button type="submit" class="btn-confirm">確認刪除</button>
            </form>
            
            <button class="btn-cancel" onclick="window.history.back()">取消</button>
        </div>
    </div>
