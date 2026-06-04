    <section id="news" style='width:60%;margin:auto'>
        <h2 class="section-title">最新消息列表</h2>
        <div class="news-section">
            <?php 
            $all_news=$pdo->query("select * from `news` order by created_at desc")->fetchAll();
            foreach($all_news as $idx => $news):
            ?>
            <div class="news-item">
                <span class="news-title">
                    <a href="?inc=news_detail&id=<?=$news['id']; ?>">
                        <?= $idx + 1 ?>. <?= $news['subject'];?>
                    </a>
                </span>
                <span class="news-date"><?= date("Y-m-d",strtotime($news['created_at'])); ?></span>
            </div>
            <?php endforeach;?>
        </div>
    </section>