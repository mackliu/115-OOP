<!-- CSS是在admin.php中使用link標籤引入的 -->

<div class="news-container">
    <div class="news-header">
        <h1>消息管理</h1>
        <button class="btn-add-news" onclick="location.href='?inc=add_news'">+ 新增消息</button>
    </div>
    
    <!-- 消息列表 -->
    <?php 
    $all_news=$pdo->query("select * from news order by created_at desc")->fetchAll();
    
    if(count($all_news) > 0):
    ?>
    <table class="news-table">
        <thead>
            <tr>
                <th style="width: 60px;">消息ID</th>
                <th style="width: 200px;">標題</th>
                <th style="flex: 1;">內容預覽</th>
                <th style="width: 120px;">發布日期</th>
                <th style="width: 150px;">操作</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($all_news as $idx => $news):?>
            <tr>
                <td class="news-id"><?= $idx + 1; ?></td>
                <td class="news-subject" style="width:20%"><?= htmlspecialchars($news['subject']); ?></td>
                <td class="news-preview" style="width:40%"><?= htmlspecialchars(mb_substr($news['content'], 0, 40)); ?>...</td>
                <td class="news-date" style="width:15%"><?= date("Y-m-d", strtotime($news['created_at'])); ?></td>
                <td  style="width:15%">
                    <div class="action-buttons">
                        <button class="btn-edit" onclick="location.href='?inc=edit_news&id=<?=$news['id'];?>'">編輯</button>
                        <button class="btn-delete" onclick="location.href='?inc=delete_news&id=<?=$news['id'];?>'">刪除</button>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="empty-state">
        <p>📭 暫無消息</p>
        <p>點擊「新增消息」按鈕來建立第一條消息</p>
    </div>
    <?php endif; ?>
</div>

