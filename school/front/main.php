    <!-- 首頁橫幅 -->

    <section class="hero-section">
        <div class="hero-content">
            <h1>歡迎來到翠園高中</h1>
            <p>致力於培育社會新鮮人的搖籃</p>
            <button class="hero-button">瞭解更多</button>
        </div>
    </section>

    <!-- 主要內容 -->
     <a name="about"></a>
    <div class="main-content">
        <!-- 特色介紹 -->
        <section id="about">
            <h2 class="section-title">校園特色</h2>
            <div class="cards-container">
                <div class="card">
                    <div class="card-icon">📚</div>
                    <h3>優質教育</h3>
                    <p>擁有資深優秀的教師團隊，採用先進的教學方法，為學生提供最優質的教育資源和環境。</p>
                </div>
                <div class="card">
                    <div class="card-icon">🏆</div>
                    <h3>全面發展</h3>
                    <p>除了學術課程外，還提供豐富的藝術、體育和科技課程，培養學生的多元才能。</p>
                </div>
                <div class="card">
                    <div class="card-icon">🌍</div>
                    <h3>國際視野</h3>
                    <p>與多所國外高中建立交流合作關係，為學生打開通往世界的大門。</p>
                </div>
                <div class="card">
                    <div class="card-icon">💻</div>
                    <h3>技術創新</h3>
                    <p>配備先進的實驗室和電腦設備，致力於培養具有創新能力的未來領袖。</p>
                </div>
                <div class="card">
                    <div class="card-icon">🎓</div>
                    <h3>升學輔導</h3>
                    <p>提供專業的升學輔導服務，幫助學生順利進入理想的大學。</p>
                </div>
                <div class="card">
                    <div class="card-icon">🤝</div>
                    <h3>溫馨社團</h3>
                    <p>擁有超過50個社團組織，學生可根據興趣自由參加，豐富校園生活。</p>
                </div>
            </div>
        </section>

        <!-- 最新消息 -->
        <a name="news"></a>
        <section id="news">
            <h2 class="section-title">最新消息</h2>
            <div class="news-section">
                <?php 
                $all_news=$pdo->query("select count(`id`) from `news`")->fetchColumn();
                $top5news=$pdo->query("select * from `news` order by created_at desc limit 5")->fetchAll();
                foreach($top5news as $idx => $news):
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
            <div style="text-align:right">
            <?php if($all_news>5):?>
               <a href="?inc=news"> 更多消息 ></a>
               <?php endif;?>
            </div>
        </section>
    </div>