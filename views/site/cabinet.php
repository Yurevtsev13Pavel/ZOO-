<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
?>

<div class="my-container">
    <div class="card-style" style="padding: 20px;">
    <h4>Мои питомцы:</h4>


    <!--вывод питомцев которых пользователь зарегестрировал-->
    <div style="width: 70%;">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <?php foreach ($animal as $item): ?>
                <div class="col">
                    <div class="card">

                        <div style="padding: 20px; display: flex; flex-direction: column; align-items: center;">
                            <div class="close"><a href="<?= Url::toRoute(['site/delete', 'id' => $item['id']]) ?>">✕</a></div>
                            <img src="<?= Yii::$app->request->baseUrl ?>/img/upload/<?= $item->img ?>">
                            <p><span><i><?= $item->name ?></i></span></p>
                        </div>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <hr>



        <h4>Зарегестрировать питомца:</h4>
        <div class="site-index">

            <?php $form = ActiveForm::begin([ 'options' => ['enctype' => 'multipart/form-data']]); ?>

            <?= $form->field($model, 'name') ?>
            <?= $form->field($model, 'sex_id')->radioList(\yii\helpers\ArrayHelper::map(\app\models\Sex::find()->all(), 'id', 'title')) ?>
            <?= $form->field($model, 'animaltype_id')->dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Animaltype::find()->all(), 'id', 'title')) ?>
            <?= $form->field($model, 'img')->fileInput() ?>

            <div class="form-group">
                <?= Html::submitButton('Добавить Питомца', ['class' => 'btn btn-style']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<style>
    img {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 100%;
    }

    .anceta-animal {
        border: 1px solid #b9b4b9;
        margin: 10px;
        padding: 5px;
        border-radius: 10px;
    }

    .anceta {
        width: 40%;
    }

    span {
        font-size: 22px;
        font-kerning: initial;
        color: #fda401;
    }
</style>


