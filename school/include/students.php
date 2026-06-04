<a href="?inc=add_student" class='add-btn'>新增學生</a>

<?php 
//從class_student 中找到班級學生的學號
//1.計算總學生人數
$total_students=$pdo->query("select count(*) from `students`")->fetchColumn();
$div=16;
$pages=ceil($total_students/$div);
$now_page=$_GET['page']??1;
$start=($now_page-1)*$div;

$sql="select 
             `students`.`school_num`,
             `students`.`name`,
             `dept`.`name` as 'dept_name',
             `addr`,
             `uni_id`,
             `graduate_school`.`name` as 'graduate_school',
             `birthday` 
        from `class_student`,
             `students`,
             `dept`,
             `graduate_school`
       where `class_student`.`school_num`=`students`.`school_num` AND
             `dept`.`id`=`students`.`dept` AND
             `graduate_school`.`id`=`students`.`graduate_at`
        limit $start,$div";
//$nums=$pdo->query($sql)->fetchAll();


$students=$pdo->query($sql)->fetchAll();

?>

<div class='page-nav'>
<?php 
    //最左邊的上一頁
    if($now_page-1 >0){
        $perv=$now_page-1;
        echo "<a href='?inc=students&page=$perv'> < </a>";
    }else{
        echo "<a href='javascript:return false;'> < </a>";
    }

    echo "<div>";
    if($now_page > 3){
        echo "<a href='?inc=students&page=1'> 1 </a>";
        echo "<span> ... </span>";
    }

    $start_page=$now_page-2;
    $end_page=$now_page+2;

    if($start_page <=1){
        $start_page=1;
        $end_page=min(5,$pages);
    }

    if($end_page > $pages){
        $start_page=max(1,$pages-4);
        $end_page=$pages;
    }
        
    for($i=$start_page;$i<=$end_page;$i++){
        
        $now_class=($now_page==$i)?"now-page":"";
      
       echo "<a href='?inc=students&page=$i' class='$now_class'> $i </a>";
    }

    if($now_page < $pages-2){
        echo "<span> ... </span>";
        echo "<a href='?inc=students&page=$pages'> $pages </a>";
    }

    echo "</div>";

    //最右邊的下一頁
    if($now_page+1 <=$pages){
        $next=$now_page+1;
        echo "<a href='?inc=students&page=$next'> > </a>";
    }else{
        echo "<a href='javascript:return false;'> > </a>";

    }
    ?>
</div>
<?php
echo "<div class='student-list'>";
foreach($students as $student):?>
    <!-- 單一卡片 -->
    <div class="student-card">
        <!-- 學號 -->
        <div class="student-id">
            <?= $student['school_num']; ?>
        </div>
        <!-- 大頭照 -->
        <div class="student-photo">
            <?php if(isset($student['header'])):;?>
            <img src="img/<?= $student['header']; ?>">
            <?php else :;?>
            <img src="img/<?= (mb_substr($student['uni_id'],1,1)==1)?'header_default_boy.jpg':'header_default_girl.jpg'; ?>">
            <?php endif;?>
        </div>
        <!-- 姓名 -->
        <div class="student-name">
            <?= $student['name'] ?>
        </div>

        <!-- 資料區 -->
        <div class="student-info">
            <div class="info-row">
                <span class="label">生日</span>
                <span class="value"><?= $student['birthday']; ?></span>
            </div>
            <div class="info-row">
                <span class="label">地址</span>
                <span class="value"><?= mb_substr($student['addr'],0,3); ?></span>
            </div>
            <div class="info-row">
                <span class="label">科別</span>
                <span class="value"><?= $student['dept_name']; ?></span>
            </div>
            <div class="info-row">
                <span class="label">畢業國中</span>
                <span class="value"><?= $student['graduate_school']; ?></span>
            </div>
            <div class="btn-row">
                <a class="edit-btn" href="?inc=edit_student&num=<?= $student['school_num']; ?>">編輯</a>
                <a class="del-btn" href="?inc=delete_student&num=<?= $student['school_num']; ?>">刪除</a>
            </div>
        </div>
    </div>

    <?php endforeach;?>
</div>
<div class='page-nav'>
<?php 
    //最左邊的上一頁
    if($now_page-1 >0){
        $perv=$now_page-1;
        echo "<a href='?inc=students&page=$perv'> < </a>";
    }else{
        echo "<a href='javascript:return false;'> < </a>";
    }

    echo "<div>";
    if($now_page > 3){
        echo "<a href='?inc=students&page=1'> 1 </a>";
        echo "<span> ... </span>";
    }

    $start_page=$now_page-2;
    $end_page=$now_page+2;

    if($start_page <=1){
        $start_page=1;
        $end_page=min(5,$pages);
    }

    if($end_page > $pages){
        $start_page=max(1,$pages-4);
        $end_page=$pages;
    }
        
    for($i=$start_page;$i<=$end_page;$i++){
        
        $now_class=($now_page==$i)?"now-page":"";
      
       echo "<a href='?inc=students&page=$i' class='$now_class'> $i </a>";
    }

    if($now_page < $pages-2){
        echo "<span> ... </span>";
        echo "<a href='?inc=students&page=$pages'> $pages </a>";
    }

    echo "</div>";

    //最右邊的下一頁
    if($now_page+1 <=$pages){
        $next=$now_page+1;
        echo "<a href='?inc=students&page=$next'> > </a>";
    }else{
        echo "<a href='javascript:return false;'> > </a>";

    }
    ?>
</div>


