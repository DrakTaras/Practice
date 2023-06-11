<?php
/** @var array $model */
/** @var array $errors */
/** @var array $materials */
/** @var int|null $material_id */
/** @var array $types */
/** @var int|null $type_id */
/** @var array $genders */
/** @var int|null $gender_id */
/** @var array $brands */
/** @var int|null $brand_id */

\core\Core::getInstance()->pageParams['title'] = 'Додавання продукту';
?>

<h1 class="h3 mb-4 fw-normal text-center">Додати продукт</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Назва продукту</label>
        <input type="text" class="form-control" id="name" name="name">
        <?php if (!empty($errors['name'])): ?>
            <div class="form-text text-danger"><?=$errors['name'] ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="material_id" class="form-label">Вибрати матеріал продукта</label>
        <select class="form-control" id="material_id" name="material_id">
            <?php foreach ($materials as $row) : ?>
                <option <?php if($row['id'] == $material_id) echo 'selected'; ?> value="<?=$row['id']?>"><?=$row['name']?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['material_id'])): ?>
            <div class="form-text text-danger"><?=$errors['material_id'] ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="type_id" class="form-label">Вибрати тип продукта</label>
        <select class="form-control" id="type_id" name="type_id">
            <?php foreach ($types as $row) : ?>
                <option <?php if($row['id'] == $type_id) echo 'selected'; ?> value="<?=$row['id']?>"><?=$row['name']?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['type_id'])): ?>
            <div class="form-text text-danger"><?=$errors['type_id'] ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="gender_id" class="form-label">Виберіть стать </label>
        <select class="form-control" id="gender_id" name="gender_id">
            <?php foreach ($genders as $row) : ?>
                <option <?php if($row['id'] == $gender_id) echo 'selected'; ?> value="<?=$row['id']?>"><?=$row['name']?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['gender_id'])): ?>
            <div class="form-text text-danger"><?=$errors['gender_id'] ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="brand_id" class="form-label">Вибрати бренд продукта</label>
        <select class="form-control" id="brand_id" name="brand_id">
            <?php foreach ($brands as $row) : ?>
                <option <?php if($row['id'] == $brand_id) echo 'selected'; ?> value="<?=$row['id']?>"><?=$row['name']?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['brand_id'])): ?>
            <div class="form-text text-danger"><?=$errors['brand_id'] ?></div>
        <?php endif; ?>
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Виберіть ціну</label>
        <input type="number" class="form-control" id="price" name="price">
        <?php if (!empty($errors['price'])): ?>
            <div class="form-text text-danger"><?=$errors['price'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="count" class="form-label">Кількість одиниць продукту</label>
        <input type="number" class="form-control" id="count" name="count">
        <?php if (!empty($errors['count'])): ?>
            <div class="form-text text-danger"><?=$errors['count'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="short_description" class="form-label">Короткий опис</label>
        <textarea class="ck-editor form-control" name="short_description" id="short_description"></textarea>
        <?php if (!empty($errors['short_description'])): ?>
            <div class="form-text text-danger"><?=$errors['short_description'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Розширений опис</label>
        <textarea class="ck-editor form-control" name="description" id="description"></textarea>
        <?php if (!empty($errors['description'])): ?>
            <div class="form-text text-danger"><?=$errors['description'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Файл з фото</label>
        <input type="file" class="form-control" name="file" id="file" accept="image/jpeg"/>
        <?php if (!empty($errors['file'])): ?>
            <div class="form-text text-danger"><?=$errors['file'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="visible" class="form-label">Показати товар?</label>
        <select class="form-control" id="visible" name="visible">
            <option value="1">Так</option>
            <option value="0">Ні</option>
        </select>
    </div>
    <div>
        <button class="btn btn-primary">Додати</button>
    </div>
</form>
<script src="https://cdn.ckeditor.com/ckeditor5/35.4.0/classic/ckeditor.js"></script>
<script>
    let editors = document.querySelectorAll('.ck-editor');
    for(let editor of editors) {
        ClassicEditor
            .create(editor)
            .catch( error => {
                console.error(error);
            } );
    }
</script>