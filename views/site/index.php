<?php

/** @var yii\web\View $this */

use app\models\Comment;use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\widgets\LinkPager;

$this->title = 'Главная';
?>


<div class="site-index">
    <div id="carouselExampleDark" class="carousel carousel-dark slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="img/sl_1.png" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="img/sl_2.png" class="d-block w-100" alt="...">

            </div>
            <div class="carousel-item">
                <img src="img/sl3.png" class="d-block w-100" alt="...">

            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>


    <!--    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">-->
    <!--        <div class="carousel-inner">-->
    <!--            <div class="carousel-item active">-->
    <!--                <img src="img/sl_1.png" class="d-block w-100" alt="...">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img src="img/sl_2.png" class="d-block w-100" alt="...">-->
    <!--            </div>-->
    <!--            <div class="carousel-item">-->
    <!--                <img src="img/sl3.png" class="d-block w-100" alt="...">-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->


    <div style="margin-top: 20px"></div>
    <div class="my-container">
        <div class="card-style">
            <h3 style="margin-top: 20px;">Наши контакты</h3>
            <div class="karta" style="margin-top: 10px">
                <script type="text/javascript" charset="utf-8" async
                        src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Ad80bbc6d6b84650fe2d7130ecb48b92710705c679fefbab283c945e34cd891f6&amp;width=620&amp;height=470&amp;lang=ru_RU&amp;scroll=true"></script>
            </div>
            <div class="block">
                <div class="con">
                    <div class="ikons">
                        <img class="pr" src="img/1.png">
                        <img class="pr" src="img/2.png">
                        <img class="pr" src="img/3.png">
                    </div>
                    <div class="te">
                        <p class="txte">8-909-146-76-07</p>
                        <p class="txte">agrovet45@yandex.ru</p>
                        <p class="txte">ул. Омская 101А</p>
                    </div>
                </div>

            </div>
            <h3>Отзывы</h3>

            <div style="border: 1px; padding: 7px" class="box">
                <?php foreach ($comments as $comment):?>
                <div style="border: 2px solid #f4901e; padding: 5px; margin: 5px; width: 620px;">
                    <p><?= $comment->user->username?></p>
                    <p><?= $comment->text ?></p>
                    <p><?= $comment->date ?></p></div>

                <?php endforeach;?>

            </div>
            <?php echo LinkPager::widget([
                'pagination' => $pagination,
            ]);
            ?>

            <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>

            <div class="form-group">
                <?php if (!Yii::$app->user->isGuest): ?>
                <div class="col-md-12" style="width: 620px;">

                    <?php $model = new Comment();
                    echo $form->field($model, 'text')->textArea([])?>


                    <?= Html::submitButton('Отправить', ['class'=>'btn btn-style'])  ?>
                </div><?php endif; ?>

            </div>

            <?php ActiveForm::end()?>
        </div>

    </div>

</div>
