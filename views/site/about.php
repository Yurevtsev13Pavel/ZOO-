<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Товары';

?>
<div class="my-container">
<div class="card-style">
<div class="cat">
<?php foreach ($category as $item): ?>

<a href="<?php echo Url::toRoute(['site/product', 'id' => $item->id]) ?>" style="color: orange; text-decoration: none;">
    <img class="category_img" src="img/category/<?php echo $item ['img']?>">
    <h5 class="category_p"><?php echo $item ['name'] ?></h5>
</a>

<?php endforeach;?>
</div>
</div>
</div>