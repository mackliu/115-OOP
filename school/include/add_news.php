
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>新增消息</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
    <div class="container">
        <h1>新增消息</h1>
        <form method="POST" action="./include/api_add_news.php">
            <div class="form-group">
                <label for="subject">主題</label>
                <input type="text" id="subject" name="subject" value="">
            </div>
            <div class="form-group">
                <label for="content">內容</label>
                <textarea id="content" name="content"  style="width:500px;height:250px;"></textarea>
            </div>
            <div class="form-group">
                <label for="author">作者</label>
                <input type="text" id="author" name="author" value="">
            </div>
            
            <div class="form-group">
                <label for="department">單位</label>
                <input type="text" id="department" name="department" >
            </div>
            <div class="form-actions">
                <button type="submit" class="btn-submit">新增消息</button>
                <button type="reset" class="btn-reset">清除</button>
            </div>
        </form>
    </div>
</body>
</html>