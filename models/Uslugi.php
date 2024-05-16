<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "uslugi".
 *
 * @property int $id
 * @property string $title
 * @property string $price
 * @property string $text
 * @property string|null $img
 *
 * @property Application[] $applications
 */
class Uslugi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'uslugi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'price', 'text'], 'required'],
            [['text'], 'string'],
            [['title'], 'string', 'max' => 256],
            [['price'], 'string', 'max' => 13],
            [['img'], 'string', 'max' => 56],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Название'),
            'price' => Yii::t('app', 'Цена'),
            'text' => Yii::t('app', 'Описание'),
            'img' => Yii::t('app', 'фото услуги'),
        ];
    }

    /**
     * Gets query for [[Applications]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getApplications()
    {
        return $this->hasMany(Application::class, ['uslugi_id' => 'id']);
    }
}
