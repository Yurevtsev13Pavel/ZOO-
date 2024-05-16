<div style="display: flex;
    flex-direction: column;
    align-items: center;">
<?php use yii\helpers\Url;

foreach ($uslugi as $item):?>
    <div class="card-style prod">

        <img style="margin-top: 20px" class="img_size" src="img/uslugi/<?php echo $item ['img']?>">
        <div class="card-body">
            <h5 class="card-title"><?php echo $item ['title'] ?></h5>
            <p class="card-text"><?php echo $item ['text']?></p>
            <p>Стоимость: <?= $item->price ?> ₽</p>
        </div>
    </div>
<?php endforeach;?>

<!--<p>--><?php //= $item->title ?><!--</p>-->
<!--<img style="height: 400px" src="img/uslugi/--><?php //echo $item['img']?><!--">-->
<!--<p>--><?php //= $item->text ?><!--</p>-->
<!--<p>Стоимость: --><?php //= $item->price ?><!-- ₽</p>-->