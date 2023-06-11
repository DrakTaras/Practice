<?php

/** @var array $products */
/** @var array $pagination */
/** @var string $searchString */

use models\User;

\core\Core::getInstance()->pageParams['title'] = 'Список продуктів';
?>

<h1 class="h3 mb-4 fw-normal text-center">Список продуктів</h1>
<?php if(User::isAdmin()) : ?>
    <div class="mb-3">
        <a href="/product/add" class="btn btn-success">Додати продукт</a>
    </div>
<?php endif; ?>

<?php require 'views/parts/products-plates.php'?>

<?php
$paginationBar = \utils\Pagination::GetStylingArray(
    $pagination['page'],
    $pagination['count'],
    $pagination['totalNumber']
);
$pagination = $paginationBar['paginationNums'];
?>
<nav class="nav-pagination">
    <ul class="pagination">
        <li class="page-item">
            <a class="page-link <?=$paginationBar['previous']?>" href="/product/index?search=<?=$searchString?>&page=<?=$paginationBar['previous']?>" aria-label="Попередня">
                <span aria-hidden="true">&laquo;</span>
                <span class="sr-only">Попередня</span>
            </a>
        </li>
        <?php foreach ($pagination as $key => $value) :?>
            <li class="page-item">
                <a
                    class="page-link <?=$value?>"
                    href="/product/index?search=<?=$searchString?>&page=<?=$key?>"
                >
                    <?=$key?>
                </a>
            </li>
        <?php endforeach; ?>
        <li class="page-item">
            <a class="page-link <?=$paginationBar['next']?>" href="/product/index?search=<?=$searchString?>&page=<?=$paginationBar['next']?>" aria-label="Наступна">
                <span aria-hidden="true">&raquo;</span>
                <span class="sr-only">Наступна</span>
            </a>
        </li>
    </ul>
</nav>
