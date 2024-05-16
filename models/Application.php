<?php

namespace app\models;


use Yii;

/**
 * This is the model class for table "application".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string $username
 * @property string $email
 * @property string $phone
 * @property int $uslugi_id
 * @property int|null $status
 * @property int $animal_id
 *
 * @property Animal $animal
 * @property User $user
 * @property Uslugi $uslugi
 */
class Application extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */

    public static function tableName()
    {
        return 'application';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'uslugi_id', 'status', 'animal_id'], 'integer'],
            [['uslugi_id', 'animal_id'], 'required'],

            [['animal_id'], 'exist', 'skipOnError' => true, 'targetClass' => Animal::class, 'targetAttribute' => ['animal_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['uslugi_id'], 'exist', 'skipOnError' => true, 'targetClass' => Uslugi::class, 'targetAttribute' => ['uslugi_id' => 'id']],


//            [['animal_id'], 'default', 'value' => $_GET['id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'id пользователя'),
            'username' => Yii::t('app', 'Имя'),
            'email' => Yii::t('app', 'Почта(email)'),
            'phone' => Yii::t('app', 'Телефон'),
            'uslugi_id' => Yii::t('app', 'Услуга'),
            'status' => Yii::t('app', 'Status'),
            'animal_id' => Yii::t('app', 'Питомец'),
        ];
    }

    /**
     * Gets query for [[Animal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimal()
    {
        return $this->hasOne(Animal::class, ['id' => 'animal_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Uslugi]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUslugi()
    {
        return $this->hasOne(Uslugi::class, ['id' => 'uslugi_id']);
    }
}
