<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var Animal $animal */
/** @var Uslugi $uslugi */

/** @var app\models\LoginForm $model */

use app\models\Animal;
use app\models\Uslugi;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\bootstrap5\Modal;
use yii\helpers\ArrayHelper;
use yii\widgets\MaskedInput;


?>
<div class="my-container">
    <div class="card-style" style="padding: 20px">
        <?php Yii::$app->session->hasFlash('contactFormSubmitted') ?>
        <div class="site-login">
            <!--    <h1>--><?php //= Html::encode($this->title) ?><!--</h1>-->

            <h3>Заказать услугу</h3>

            <div class="row">
                <div class="col-lg-5">

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'fieldConfig' => [
                            'template' => "{label}\n{input}\n{error}",
                            'labelOptions' => ['class' => 'col-lg-1 col-form-label mr-lg-3'],
                            'inputOptions' => ['class' => 'col-lg-3 form-control'],
                            'errorOptions' => ['class' => 'col-lg-7 invalid-feedback'],
                        ],
                    ]); ?>


                    <?= $form->field($model, 'surname')->textInput(['autofocus' => true, 'value' => Yii::$app->user->identity->surname]) ?>
                    <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'value' => Yii::$app->user->identity->email]) ?>
                    <?= $form->field($model, 'phone')->widget(MaskedInput::class, ['mask' => '+7(999)-999-99-99']) ?>

                    <?= $form->field($model, 'uslugi_id')->dropDownList($uslugi) ?>



                    <?php if (empty($animal)): ?>
                        <p>Похоже, у вас нет питомца...зарегестрируйте его</p>
                    <?php else: ?>

                        <?= $form->field($model, 'animal_id')->dropDownList($animal) ?>

                    <?php endif; ?>


                    <div class="form-group">
                        <div>
                            <?= Html::submitButton('Отправить', ['class' => 'btn btn-style']) ?>
                        </div>
                    </div>


                    <?php ActiveForm::end(); ?>


                    <!--            <div style="color:#999;">-->
                    <!--                You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>-->
                    <!--                To modify the username/password, please check out the code <code>app\models\User::$users</code>.-->
                    <!--            </div>-->


                </div>
            </div>
        </div>
    </div>
</div>

