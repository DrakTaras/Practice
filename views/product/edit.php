<?php
/** @var array $row */
/** @var array $modelАле не забувайте */
/** @var array $errors */
/** @var array $materials */
/** @var array $types */
/** @var array $genders */
/** @var array $brands */

\core\Core::getInstance()->pageParams['title'] = 'Редагування продукту';

if(isset($model)) $row = $model;
?>

<h1 class="h3 mb-4 fw-normal text-center">Редагування продукту</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="mb-3">
        <label for="name" class="form-label">Назва продукту</label>
        <input type="text" class="form-control" id="name" name="name" value="<?=$row['name']?>">
        <?php if (!empty($errors['name'])): ?>
            <div class="form-text text-danger"><?=$errors['name'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="material_id" class="form-label">Виберіть матеріал продукту</label>
        <select class="form-control" id="material_id" name="material_id">
            <?php foreach ($materials as $material_row) :
                ?>
                <option <?php if($material_row['id'] == $row['material_id']) echo 'selected'; ?> value="<?=$material_row['id']?>"><?=$material_row['name']?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['material_id'])): ?>
            <div class="form-text text-danger"><?=$errors['material_id'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="type_id" class="form-label">Виберіть тип продукту</label>
        <select class="form-control" id="type_id" name="type_id">
            <?php foreach ($types as $type_row) : ?>
                <option <?php if($type_row['id'] == $row['type_id']) echo 'selected'; ?> value="<?=$type_row['id']?>"><?=$type_row['name']?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['type_id'])): ?>
            <div class="form-text text-danger"><?=$errors['type_id'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="gender_id" class="form-label">Виберіть стать </label>
        <select class="form-control" id="gender_id" name="gender_id">
            <?php foreach ($genders as $gender_row) : ?>
                <option <?php if($gender_row['id'] == $row['gender_id']) echo 'selected'; ?> value="<?=$gender_row['id']?>"><?=$gender_row['name']?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['gender_id'])): ?>
            <div class="form-text text-danger"><?=$errors['gender_id'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="brand_id" class="form-label">Виберіть бренд</label>
        <select class="form-control" id="brand_id" name="brand_id">
            <?php foreach ($brands as $brand_row) : ?>
                <option <?php if($brand_row['id'] == $row['brand_id']) echo 'selected'; ?> value="<?=$brand_row['id']?>"><?=$brand_row['name']?></option>
            <?php endforeach; ?>
        </select>
        <?php if (!empty($errors['brand_id'])): ?>
            <div class="form-text text-danger"><?=$errors['brand_id'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="price" class="form-label">Виберіть ціну</label>
        <input type="number" class="form-control" id="price" name="price" value="<?=$row['price']?>">
        <?php if (!empty($errors['price'])): ?>
            <div class="form-text text-danger"><?=$errors['price'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="count" class="form-label">Кількість одиниць продукту</label>
        <input type="number" class="form-control" id="count" name="count" value="<?=$row['count']?>">
        <?php if (!empty($errors['count'])): ?>
            <div class="form-text text-danger"><?=$errors['count'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="short_description" class="form-label">Короткий опис</label>
        <textarea class="ck-editor form-control" name="short_description" id="short_description"><?=$row['short_description']?></textarea>
        <?php if (!empty($errors['short_description'])): ?>
            <div class="form-text text-danger"><?=$errors['short_description'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Розширений опис</label>
        <textarea class="ck-editor form-control" name="description" id="description"><?=$row['description']?></textarea>
        <?php if (!empty($errors['description'])): ?>
            <div class="form-text text-danger"><?=$errors['description'] ?></div>
        <?php endif; ?>
    </div>
    <div class="col-3">
        <?php $filePath = 'files/product/'.$row['photo'];?>
        <?php if (is_file($filePath)) : ?>
            <img src="/<?=$filePath?>" class="card-img-top img-thumbnail">
        <?php else : ?>
            <img src="/static/images/no-image.jpg" class="card-img-top img-thumbnail">
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="file" class="form-label">Файл з фото</label>
        <input type="file" class="form-control" name="file" id="file" accept="image/jpeg" value=""/>
        <?php if (!empty($errors['file'])): ?>
            <div class="form-text text-danger"><?=$errors['file'] ?></div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="visible" class="form-label">Показати товар?</label>
        <select class="form-control" id="visible" name="visible">
            <option value="1" <?php if($row['visible']) echo 'selected'; ?>>Так</option>
            <option value="0" <?php if(!$row['visible']) echo 'selected'; ?>>Ні</option>
        </select>
    </div>
    <div>
        <button class="btn btn-primary">Редагувати</button>
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
