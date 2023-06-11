User
<?php
/** @var array $moduleName */
/** @var array $row */

\core\Core::getInstance()->pageParams['title'] = "Видалення {$moduleName}";
?>
<div class="alert alert-danger" role="alert">
    <h4 class="alert-heading">Видалити <?=$moduleName?> "<?=$row['name']?>"?</h4>
    <p>Після видалення <?=$moduleName?> всі товари в цьому <?=$moduleName?> перейдуть до стандартного <?=$moduleName?> <b>"Default"</b></p>
    <hr>
    <p class="mb-0">
        <a href="/<?=$moduleName?>/delete/<?=$row['id']?>/yes" class="btn btn-danger">Видалити</a>
        <a href="../../index.php" class="btn btn-dark">Скасувати</a>
    </p>
</div>
