<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "animal".
 *
 * @property int $id
 * @property string $name
 * @property int|null $user_id
 * @property int $animaltype_id
 * @property int|null $sex_id
 * @property string $img
 *
 * @property Animaltype $animaltype
 * @property Application[] $applications
 * @property Sex $sex
 * @property User $user
 */
class Animal extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'animal';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'animaltype_id', 'img'], 'required'],
            [['user_id', 'animaltype_id', 'sex_id'], 'integer'],
            [['name', 'img'], 'string', 'max' => 56],
            [['animaltype_id'], 'exist', 'skipOnError' => true, 'targetClass' => Animaltype::class, 'targetAttribute' => ['animaltype_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['sex_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sex::class, 'targetAttribute' => ['sex_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Кличка'),
            'user_id' => Yii::t('app', 'User ID'),
            'animaltype_id' => Yii::t('app', 'Животное'),
            'sex_id' => Yii::t('app', 'Пол'),
            'img' => Yii::t('app', 'Фото'),

            ['user_id', 'default', 'value' => Yii::$app->user->getId()],
        ];
    }

    /**
     * Gets query for [[Animaltype]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAnimaltype()
    {
        return $this->hasOne(Animaltype::class, ['id' => 'animaltype_id']);
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['animal_id' => 'id']);
    }

    /**
     * Gets query for [[Sex]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSex()
    {
        return $this->hasOne(Sex::class, ['id' => 'sex_id']);
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
}
