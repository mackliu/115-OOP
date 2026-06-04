<?php 
$news=$pdo->query("select * from `news` where `id`='{$_GET['id']}'")->fetch();
?>
<h2><?= $news['subject'] ?></h2>
<article style='font-size:18px;line-height:1.8;'>
<pre>
    <?= $news['content'] ?>
</pre>
</article>