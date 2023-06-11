<?php
/** @var array $basket */

use models\Basket;

?>
    <h1 class="h3 mb-4 fw-normal">Кошик</h1>
<?php if(count($basket['products']) == 0) : ?>
    <div class="empty-block">
        <h3 class="h3">Кошик порожній :(</h3>
        <span>Але ви можете замовити товари <a href="/product">тут</a>.</span>
    </div>
<?php else : ?>
    <table class="table">
        <thead>
        <tr>
            <th></th>
            <th>№</th>
            <th>Зображення</th>
            <th>Назва</th>
            <th>Ціна за одиницю</th>
            <th>Кількість</th>
            <th>Вартість</th>
            <th>Наявність</th>
        </tr>
        </thead>
        <?php
        $index = 1;
        $reduceMarker = false;
        foreach ($basket['products'] as $row) : ?>
            <tr class="table-row-dyn <?php
            if($row['count'] > $row['product']['count'])
                echo 'table-danger';
            else if($row['count'] == 0)
                echo 'table-secondary';
            ?>" onclick="
                window.location='/product/view/<?=$row['product']['id']?>';
                ">
                <td onclick="
                    if (!e) var e = window.event;
                    e.cancelBubble = true;
                    if (e.stopPropagation) e.stopPropagation();
                    window.location='/basket/delete/<?=$row['product']['id']?>';
                    ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </td>
                <td><?=$index ?></td>
                <td>
                    <?php $filePath = 'files/product/'.$row['product']['photo']; ?>
                    <?php
                    if (is_file($filePath)) :?>
                        <img src="/<?=$filePath?>" width="100">
                    <?php else : ?>
                        <img src="/static/images/no-image.jpg" width="100">
                    <?php endif; ?>
                </td>
                <td><?=$row['product']['name'] ?></td>
                <td><?=$row['product']['price'] ?> грн.</td>
                <td><?=$row['count']?>
                </td>
                <?php
                if($row['count'] > $row['product']['count']) {
                    $reduceMarker = true;
                }
                ?>
                <td><?=$row['product']['price'] * $row['count'] ?> грн.</td>
                <td><?php
                    if($row['count'] > $row['product']['count'])
                        echo 'Недостатньо на складі';
                    else if ($row['product']['count'] == 0)
                        echo 'Не доступний';
                    else
                        echo 'Є в наявності';
                    ?></td>
            </tr>
            <?php
            $index++;
        endforeach; ?>
        <tfoot>
        <tr>
            <th>Загальна вартість</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th><?=$basket['total_price'] ?> грн.</th>
            <th>
                <?php if($reduceMarker) : ?>
                    <a class="btn btn-danger" href="/basket/reduce">Зменшити до доступної кількості</a>
                <?php elseif(Basket::getCountItems() == 0) : ?>
                    <a class="btn btn-primary disabled" href="/order">Замовити</a>
                <?php else : ?>
                    <a class="btn btn-primary" href="/order">Замовити</a>
                <?php endif; ?>
            </th>
        </tr>
        </tfoot>
    </table>
<?php endif; ?>