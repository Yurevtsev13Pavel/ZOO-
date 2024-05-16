<?php
$this->title = 'Подробнее...';
?>
<div style="display: flex;
    flex-direction: column;
    align-items: center;">
<div class="card-style prod">
    <div style="display: flex; width: 100%; justify-content: space-evenly; padding: 20px;">
<?php foreach ($product as $item): ?>
    <div><img class="img_card" src="img/product/<?php echo $item ['img']?>"></div>
    <div style="max-width: 50%;">
        <h3><?php echo $item ['name']?></h3>
    <h6>Общие характиристики продукта:</h6>
        <p>Страна производитель: <?= $item->country->name ?></p>
        <p>Категория животного: <?= $item->category->name ?></p>
        <p>Производитель: <?= $item->proizvod->name ?></p>
        <p>Масса: <?= $item->measure->name ?></p>
<!--        <p>Кол-во: --><?php //echo $item['count'] ?><!--шт.</p>-->
        <!--        <p>тип: --><?php //= $item->type->name ?><!--</p>-->
        <p>Цена: <?php echo $item ['price']?> р</p>
    </div>
<?php endforeach;?>
    </div>
</div>
</div>