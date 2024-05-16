<?php

namespace app\controllers;

use app\models\AplicationForm;
use app\models\Comment;
use app\models\User;
use yii\data\Pagination;
use app\models\Animal;
use app\models\Application;
use app\models\Category;
use app\models\Product;
use app\models\RegisterForm;
use app\models\Uslugi;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use yii\web\UploadedFile;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout', 'cabinet'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['cabinet'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
//    public function actionIndex()
//    {
//        $comments = Comment::find()->all();
//        $model = new Comment();
//        if ($model->load(Yii::$app->request->post())){
//            $model->save();
//            return $this->refresh();
//        }
//        return $this->render('index', ['model' => $model, 'comments'=>$comments]);
//
//    }
    public function actionIndex()
    {
        // Запрос к базе данных
        $query = Comment::find();

        // Пагинация
        $count = $query->count();
        $pagination = new Pagination([
            'defaultPageSize' => 5,
            'totalCount' => $count,
        ]);

        // Извлечение комментариев с пагинацией
        $comments = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        // Создание новой модели комментария
        $model = new Comment();

        // Обработка формы отправки комментария
        if ($model->load(Yii::$app->request->post())){
            $model->save();
            return $this->refresh(); // Перезагрузка страницы после сохранения
        }

        // Рендеринг представления с передачей данных
        return $this->render('index', [
            'model' => $model,
            'comments' => $comments,
            'pagination' => $pagination, // Передача объекта пагинации
        ]);
    }

    // ... остальной код контроллера ...



    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionRegister()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegisterForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('register', [
            'model' => $model,
        ]);
    }
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
           if (Yii::$app->user->identity->isAdmin())
           {
               return $this->redirect(['/admin']);
           }
           return $this->redirect(['site/cabinet']);
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
//    public function actionContact()
//    {
//        $model = new ContactForm();
//        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
//            Yii::$app->session->setFlash('contactFormSubmitted');
//
//            return $this->refresh();
//        }
//        return $this->render('contact', [
//            'model' => $model,
//        ]);
//    }
    public function actionApplication()
    {
        $uslugi = Uslugi::find()->orderBy('id')->indexBy('id')->select('title')->column();
        $animal = Animal::find()->where(['user_id' => Yii::$app->user->id])->orderBy('id')->indexBy('id')->select('name')->column();
        $model = new AplicationForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Спасибо, заявка успешно отправлена');
            return $this->refresh();
        }

        return $this->render('application', [
            'model' => $model,
            'uslugi' => $uslugi,
            'animal' => $animal,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        $category = Category::find()->all();

        return $this->render('about', compact('category'));
    }

    public function actionProduct(){

        $query = Product::find()->where(['category_id' => $_GET['id']]);
        $count = $query->count();
        $pagination = new Pagination(['totalCount' => $count, 'pageSize'=>12]);
        $product = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        if (isset($_GET['id']) && $_GET['id']!= ' '){
            $category = Category::find()->where(['id'=> $_GET['id']])->one();
//            $product = Product::find()->where(['category_id'=> $_GET['id']])->all();
             return $this->render('product', compact('category', 'product', 'pagination'));
        }
        else
            return $this->redirect('site/about');
    }

    public function actionDetails_product(){
        if (isset($_GET['id']) && $_GET['id']!= ' '){
            $product = Product::find()->where(['id'=> $_GET['id']])->all();
            return $this->render('details_product', compact( 'product'));
        }
        else
            return $this->redirect('site/product');
    }

    public function actionUslugi()
    {
        $uslugi=Uslugi::find()->all();
        return $this->render('uslugi', compact('uslugi'));
    }

    public function actionDetail()
    {
        if (isset($_GET['id']) && $_GET['id']!= ' '){
            $uslugi = Uslugi::find()->where(['id' => $_GET['id']])->all();
            return $this->render('detail', compact('uslugi'));
    }
        else
            return $this->redirect('site/main');
    }

    public function actionCabinet()
    {
//        $animal = Animal::find()->all();
        $animal = Animal::find()->where(['user_id' => Yii::$app->user->getId()])->all();
//        $model = new Animal();

            $model = new Animal();
            if ($model->load(Yii::$app->request->post())) {
                $model->img = UploadedFile::getInstance($model, 'img');
                $model->img->saveAs("img/upload/{$model->img->baseName}.{$model->img->extension}");
                $model->user_id = Yii::$app->user->getId();
                $model->save(false);
                return $this->refresh();

        }
        return $this->render('cabinet', compact('animal', 'model'));
    }

    //функция удаления питомца из личного кабинета
    public function actionDelete($id)
    {
        $model = Animal::findOne($id);
        if ($model && $model->user_id == Yii::$app->user->getId()) {
            $model->delete();
        }
        return $this->redirect(['/site/cabinet']);
    }
    public function actionOnas(){
        return $this->render('onas');
    }
    public function actionComment(){
        $comments = Comment::find()->all();

        return $this->render('comment', ['comments'=>$comments]);
    }
}
