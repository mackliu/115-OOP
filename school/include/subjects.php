<h2>科別</h2>
<!-- CSS是在admin.php中使用link標籤引入的 -->
<?php 

//計算各科別，有多少學生
$sql="SELECT `dept`.`name` as '科別',
             `dept`.`id` as 'dept_id',
           count(`students`.`id`) as '人數' 
      FROM `students` 
      RIGHT JOIN `dept` on `dept`.`id`= `students`.`dept` 
      Group BY `dept`.`id`;";
$subjects=$pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
echo "<table id='subjects-table'>";
echo "<tr><th>科別</th><th>人數</th></tr>";
foreach($subjects as $sub){
    echo "<tr><td>";
    echo "<a href='?inc=subject_students&dept={$sub['dept_id']}'>";
    echo $sub['科別'];
    echo "</a>";
    echo "</td><td>";
    
    echo $sub['人數'];
    
    echo "</td></tr>";
}
echo "</table>";
?>
