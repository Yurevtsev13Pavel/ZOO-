<div class="my-container">
<div class="card-style">
    <div style="padding: 25px 100px 25px 100px;">
    <table class="table">
        <?php use yii\helpers\Url;

        $isOdd = true; ?>
        <?php foreach ($uslugi as $item): ?>
            <tr>
                <div style="display: flex; ">

                    <th>
                        <a style="text-decoration: none;" href="<?php echo Url::toRoute(['site/detail', 'id' => $item->id]) ?>">
                            <h6 style="color:  <?php echo $isOdd ? 'orange' : 'black'; ?>"><?php echo $item->title; ?></h6>
                        </a>
                    </th>

                    <th>
                        <h6 style="color:  <?php echo $isOdd ? 'orange' : 'black'; ?>"><?php echo $item->price; ?>р</h6>
                    </th>

                </div>
                <?php $isOdd = !$isOdd; ?>
            </tr>


        <?php endforeach; ?>
    </table>
</div>
</div>
</div>
