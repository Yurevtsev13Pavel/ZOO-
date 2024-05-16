<?php

namespace app\models;

use Yii;

class AplicationForm extends \yii\base\Model
{
    public $surname;
    public $phone;
    public $email;
    public $uslugi_id;
    public $animal_id;


    public function rules()
    {
        return [
            [['uslugi_id', 'animal_id'], 'integer'],
            [['surname', 'phone', 'email'], 'required'],
            ['email', 'email' ],
            ['phone', 'string'],
            ['phone', 'default', 'value' => 'Введите номер телефона'],
        ];
    }
    public function save()
    {
        $app = new Application();
        $app->username = $this->surname;
        $app->phone = $this->phone;
        $app->email = $this->email;
        $app->uslugi_id = $this->uslugi_id;
        $app->animal_id = $this->animal_id;
        $app->user_id = Yii::$app->user->identity->id;
        $app->save();

        return true;


    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'id пользователя'),
            'username' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Имя'),
            'email' => Yii::t('app', 'Почта(email)'),
            'phone' => Yii::t('app', 'Телефон'),
            'uslugi_id' => Yii::t('app', 'Услуга'),
            'status' => Yii::t('app', 'Status'),
            'animal_id' => Yii::t('app', 'Питомец'),
        ];
    }
}