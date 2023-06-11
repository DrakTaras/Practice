<?php
/** @var array $product */

use models\DataTable;
use models\User;

\core\Core::getInstance()->pageParams['title'] = 'Перегляд товару';
?>
<div class="container view-container">
    <div class="row">
        <div class="col-4 col-img">
            <?php $filePath = 'files/product/' . $product['photo']; ?>
            <?php if (is_file($filePath)) : ?>
                <a data-fancybox data-src="/<?= $filePath ?>">
                    <img src="/<?= $filePath ?>" class="product-view-avatar">
                </a>
            <?php else : ?>
                <img src="/static/images/no-image.jpg" class="product-view-avatar">
            <?php endif; ?>
        </div>
        <div class="col-8 col-info">
            <div class="row mb-1">
                <h3 class="h4"><?= $product['name'] ?></h3>
            </div>
            <div class="buy-block">
                <div>
                    <span class="price"><?=$product['price']?></span> <span class="cur">грн.</span>
                </div>
                <?php
                $countInBasket = \models\Basket::getCountOfId($product['id']);
                $classBtn = "";
                $disableLink = "";

                if(User::isUserAuthenticated() && $countInBasket != 0) {
                    if ($countInBasket < $product['count'])
                        $outputBtn = "Додати ({$countInBasket} у кошику)";
                    else if ($countInBasket == $product['count']) {
                        $outputBtn = "Все у кошику ({$countInBasket})";
                        $classBtn = "disabled";
                    }
                }
                else if($product["count"] == 0) {
                    $outputBtn = "Немає в наявності";
                    $classBtn = "disabled";
                    $disableLink = "href-dis";
                }
                else {
                    $outputBtn = "Додати до кошика";
                }

                ?>
                <a href="/basket/add/<?=$product['id']?>" class="<?=$disableLink?>">
                    <div class="btn cart-btn <?=$classBtn?>">
                        <?=$outputBtn?>
                    </div>
                </a>
            </div>
            <div class="row mb-1">
                <section>
                    <div class="row-info-mg">
                        <span class="fw-bold">Категорії</span>
                    </div>
                    <div class="row-info row-info-mg material">
                        <a href="/material/view/<?=$product['material_id']?>" class="material">
                            <?=DataTable::getNameById('material', $product['material_id'])?>
                        </a>
                        <a href="/brand/view/<?=$product['brand_id']?>" class="material">
                            <?=DataTable::getNameById('brand', $product['brand_id'])?>
                        </a>
                        <a href="/type/view/<?=$product['type_id']?>" class="material">
                            <?=DataTable::getNameById('type', $product['type_id'])?>
                        </a>
                        <a href="/gender/view/<?=$product['gender_id']?>" class="material">
                            <?=DataTable::getNameById('gender', $product['gender_id'])?>
                        </a>
                    </div>
                    <div class="row-info-mg">
                        <span class="fw-bold">Доставка</span>
                    </div>
                    <div class="row-info row-info-mg">
                        <a href="https://novaposhta.ua/">
                            <img src="../../static/layout/nova_poshta.svg" class="icon"/>
                            <span class="name">Нова Пошта</span>
                            <span class="description">ви зможете забрати його протягом <b>1-3 днів</b> у відділенні</span>
                        </a>
                    </div>
                    <div class="row-info row-info-mg">
                        <a href="https://novaposhta.ua/dostavka_courier">
                            <img src="../../static/layout/car.svg" class="icon"/>
                            <span class="name">Кур'єром</span>
                            <span class="description">перевезення здійснюється службою <b>Нова Пошта</b></span>
                        </a>
                    </div>
                </section>
                <section>
                    <div class="row-info-mg">
                        <span class="fw-bold">Оплата</span>
                    </div>
                    <div class="row-info row-info-mg">
                        <a>
                            <img src="../../static/layout/card.svg" class="icon"/>
                            <span class="name">Карткою</span>
                        </a>
                        <a>
                            <img src="../../static/layout/cash.svg" class="icon"/>
                            <span class="name">Готівкою</span>
                        </a>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div class="row descriptions">
        <div class="col-12">
            <div class="brief-description">
                <?php if(isset($product['short_description'])) : ?>
                    <span class="title">Короткий опис:</span>
                    <span class="description"><?=$product['short_description']?></span>
                <?php endif; ?>
                <?php if(isset($product['description'])) : ?>
                    <span class="title">Повний опис:</span>
                    <span class="description"><?=$product['description']?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
