<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Uslugi $model */

$this->title = Yii::t('app', 'Добавить услугу');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Услуги'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="uslugi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
