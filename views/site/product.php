<div class="row row-cols-1 row-cols-md-3 g-4">
<?php use yii\helpers\Url;
use yii\bootstrap5\LinkPager;

if(empty($product)):?>
    <h2 class="message-style">Товара нет в наличии</h2>
<?php else:?>
<?php foreach ($product as $item): ?>




            <div class="col">
                <div class="card" style="    min-height: 400px;">
                    <img class="img_size" src="img/product/<?php echo $item ['img']?>"  alt="...">
                    <div class="card-body">
                        <h5 style="text-align: center;" class="card-title"><?php echo $item ['name'] ?></h5>
                        <h6 class="card-text"><?php echo $item ['price']?>р</h6>
                        <a class="btn btn-style" href="<?php echo Url::toRoute(['site/details_product', 'id' => $item->id]) ?>">Подробнее</a>
                    </div>
                </div>
            </div>

<?php endforeach;?>
</div>


<?php echo LinkPager::widget([
'pagination' => $pagination,
]);
?>

<?php endif;?>
