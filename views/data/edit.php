<?php
/** @var array $moduleName */
/** @var array $row */
/** @var array $model */
/** @var array $errors */

$lModuleName = ucfirst($moduleName);

\core\Core::getInstance()->pageParams['title'] = "Редагування {$moduleName}";
?>
<h1 class="h3 mb-4 fw-normal text-center">Редагування <?=$moduleName?></h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Назва <?=$lModuleName?></label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $row['name']?>">
        <?php if (!empty($errors['name'])): ?>
            <div class="form-text text-danger"><?=$errors['name'] ?></div>
        <?php endif; ?>
    </div>
    <div class="col-3">
        <?php $filePath = 'files/'.$moduleName.'/'.$row['photo'];?>
        <?php if (is_file($filePath)) : ?>
            <img src="/<?=$filePath?>" class="card-img-top img-thumbnail" alt="...">
        <?php else : ?>
            <img src="/static/images/no-image.jpg" class="card-img-top img-thumbnail" alt="...">
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Фото <?=$lModuleName?> (замінити фото)</label>
        <input type="file" class="form-control" name="file" id="file" accept="image/jpeg"/>
    </div>
    <div>
        <button class="btn btn-primary">Зберегти</button>
    </div>
</form>