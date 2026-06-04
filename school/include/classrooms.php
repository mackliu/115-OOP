<h2 style='text-align:center'>班級列表</h2>
<?php 
include_once "./include/db.php";
?>
<div class='page-nav'>
<?php $paginate=$Class->pagiation('classes',3); ?>
</div>

<?php
$classrooms=$Class->all(" LIMIT {$paginate['start']},{$paginate['div']} ");


echo "<div class='cards-container'>";
foreach($classrooms as $class):
?>

<a href="?inc=class_students&code=<?= $class['code']; ?>">
    <div class="card">
        <div class="card-icon"></div>
        <h3><?= $class['name'];?>(<?= $class['code']; ?>)</h3>
        <p><?= $class['tutor'] ?></p>
    </div>
</a>

<?php endforeach;?>
</div>
<div class='page-nav'>
<?php $Class->pagiation('classes',3); ?>
</div>