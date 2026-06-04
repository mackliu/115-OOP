
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改消息</title>
    <link rel="stylesheet" href="../css/global.css">
    <link rel="stylesheet" href="../css/form.css">
</head>
<body>
    <div class="container">
        <h1>修改消息</h1>
        <?php $news=$pdo->query("select * from `news` where `id`='{$_GET['id']}'")->fetch();?>
        <form method="POST" action="./include/api_edit_news.php">
            <div class="form-group">
                <label for="subject">主題</label>
                <input type="text" id="subject" name="subject" value="<?= $news['subject']; ?>">
            </div>
            <div class="form-group">
                <label for="content">內容</label>
                <textarea id="content" name="content"  style="width:500px;height:250px;"><?= $news['content'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="author">作者</label>
                <input type="text" id="author" name="author" value="<?= $news['author']; ?>">
            </div>
            
            <div class="form-group">
                <label for="department">單位</label>
                <input type="text" id="department" name="department" value='<?= $news['department']; ?>'>
            </div>
            <div class="form-actions">
                <input type="hidden" name="id" value="<?= $news['id']; ?>">
                <button type="submit" class="btn-submit">修改消息</button>
                <button type="reset" class="btn-reset">清除</button>
            </div>
        </form>
    </div>
</body>
</html>