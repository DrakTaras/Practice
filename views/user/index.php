<?php

use models\Order;
use models\User;

/** @var array $orders */

\core\Core::getInstance()->pageParams['title'] = 'Заказ';
?>

<h1 class="h3 mb-4 fw-normal">Заказ</h1>
<?php if(count($orders) == 0) : ?>
    <?php
    $text = [];
    if(User::isAdmin())
        $text += ['title' => 'Немає замовлень'];
    else {
        $text += ['title' => 'Немає замовлень'];
        $text += ['description' => 'Ви можете замовити <a href="/product">Тут</a>.'];
    }
    ?>
    <div class="empty-block">
        <h3 class="h3"><?=$text['title']?></h3>
        <span><?=$text['description']?></span>
    </div>
<?php else : ?>

    <table class="table">
        <thead>
        <tr>
            <th>№</th>
            <th>Дата</th>
            <th>Імя</th>
            <th>Телефон</th>
            <th>Місто</th>
            <th>Поштовий індекс</th>
            <th>Товар</th>
            <th>Статус</th>
        </tr>
        </thead>
        <?php
        $index = 1;
        foreach ($orders as $row) : ?>
            <tr class="table-row-dyn">
                <td><?=$index?></td>
                <td><?=$row['date']?></td>
                <td><?=$row['name']?></td>
                <td><a href="tel: <?=$row['phone']?>"><?=$row['phone']?></a></td>
                <td><?=$row['city']?></td>
                <td><?=$row['post_number']?></td>
                <td>
                    <?php
                        $items = Order::getOrderItems($row['id']);
                        $output = "";
                        for ($i = 0; $i <= count($items) - 1; $i++) {
                            $name = substr($items[$i]['product']['name'], 0, 30).'...';
                            $id = $items[$i]['product']['id'];
                            $output .= "<a href='/product/view/{$id}' class='styled'>{$items[$i]['count_in_order']} x {$name}</a><br>";
                        }
                        echo $output;
                    ?>
                </td>
                <td>
                    <form action="" method="post" class="form-status">
                        <a class="btn
                        <?php
                        if(!User::isAdmin())
                            echo " href-dis";

                        if($row['status'] == 'in processing')
                            echo ' btn-warning';
                        else if($row['status'] == 'approved')
                            echo ' btn-success';
                        ?>" href="/user/approve/<?=$row['id']?>"><?=ucfirst($row['status'])?></a>
                    </form>
                </td>
            </tr>
            <?php
            $index++;
        endforeach; ?>
        <tfoot>
        <tr>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </tfoot>
    </table>
<?php endif; ?>
