<a href="?inc=add_student" class='add-btn'>新增學生</a>

<?php 
include_once "./include/db.php";

?>

<div class='page-nav'>
<?php 

$paginate=$Student->pagiation('students',16);
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
        limit {$paginate['start']},{$paginate['div']}";

    $students=$Student->q($sql);
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
    $Student->pagiation('students',16);
?>
</div>


