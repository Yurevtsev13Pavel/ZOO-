<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */

/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

?>
<div class="my-container">
<div class="card-style">
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <h3>Регистрация</h3>

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

            <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'surname')->textInput(['autofocus' => true]) ?>
            <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'password_repeat')->passwordInput() ?>

<!--            --><?php //= $form->field($model, 'rememberMe')->checkbox([
//                'template' => "<div class=\"custom-control custom-checkbox\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
//            ]) ?>
            <div class="custom-control custom-checkbox" style="text-align: center; margin: 10px">
                <input type="checkbox" class="custom-control-input" id="customCheck1" required>
                <label class="custom-control-label" for="rule">Согласен с правилами регистрации</label>
            </div>

            <div class="form-group">
                <div>
                    <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-style', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
            <div style="color:#999; width: 400px">

            </div>

<!--            <div style="color:#999;">-->
<!--                You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>-->
<!--                To modify the username/password, please check out the code <code>app\models\User::$users</code>.-->
<!--            </div>-->

        </div>
    </div>
</div>
</div>
</div>
