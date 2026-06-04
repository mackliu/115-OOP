<!-- CSS是在admin.php中使用link标签引入的 -->
<?php
$dept_name=$pdo->query("SELECT `name` FROM `dept` WHERE `id`='{$_GET['dept']}'")->fetchColumn();
?>
<h2 style="text-align:center"><?= $dept_name; ?> 學生列表</h2>
<?php 
//從class_student 中找到班級學生的學號

//$sql="select * from `class_student` where `class_code`='{$_GET['code']}'";
// ===== SQL 查詢語句：獲取指定科別的所有學生詳細資訊 =====
// SELECT 指令：查詢多個資料表中的指定欄位
// 選取欄位說明：
//   - students.school_num：學號（來自學生資料表）
//   - students.name：姓名（來自學生資料表）
//   - classes.name as 'class_name'：班級名稱（來自班級資料表，別名為 class_name）
//   - dept.name as 'dept_name'：科別名稱（來自科別資料表，別名為 dept_name）
//   - addr：地址（來自學生資料表）
//   - uni_id：身分證號（來自學生資料表）
//   - graduate_school.name as 'graduate_school'：畢業國中名稱（來自畢業國中資料表，別名為 graduate_school）
//   - birthday：出生日期（來自學生資料表）
// 
// FROM 子句：關聯四個資料表
//   - class_student：班級學生對應表
//   - students：學生資料表
//   - dept：科別資料表
//   - graduate_school：畢業國中資料表
//   - classes：班級資料表
//
// WHERE 子句：設定資料表間的關聯條件及篩選條件
//   - class_student.school_num = students.school_num：班級學生表與學生表關聯（學號相同）
//   - dept.id = students.dept：科別表與學生表關聯（科別ID相同）
//   - graduate_school.id = students.graduate_at：畢業國中表與學生表關聯（畢業國中ID相同）
//   - classes.code = class_student.class_code：班級表與班級學生表關聯（班級代碼相同）
//   - students.dept = '{$_GET['dept']}'：篩選條件，只查詢該科別的學生
$sql="select 
             `students`.`school_num`, 
             `students`.`name`,
             `classes`.`name` as 'class_name',
             `dept`.`name` as 'dept_name',
             `addr`,
             `uni_id`,
             `graduate_school`.`name` as 'graduate_school',
             `birthday` 
        from `class_student`,
             `students`,
             `dept`,
             `graduate_school`,
             `classes`
       where `class_student`.`school_num`=`students`.`school_num` AND
             `dept`.`id`=`students`.`dept` AND
             `graduate_school`.`id`=`students`.`graduate_at` AND
             `classes`.`code`=`class_student`.`class_code` AND
             `students`.`dept`='{$_GET['dept']}'";
            
//$nums=$pdo->query($sql)->fetchAll();
$students=$pdo->query($sql)->fetchAll();

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
                <span class="label">班級</span>
                <span class="value"><?= $student['class_name']; ?></span>
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



