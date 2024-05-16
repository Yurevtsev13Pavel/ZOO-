<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property string $price
 * @property string $img
 * @property int $count
 * @property int $country_id
 * @property int $proizvod_id
 * @property int $type_id
 * @property int $measure_id
 * @property int|null $category_id
 *
 * @property Category $category
 * @property Country $country
 * @property Measure $measure
 * @property Proizvod $proizvod
 * @property Type $type
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'img', 'count', 'country_id', 'proizvod_id', 'type_id', 'measure_id'], 'required'],
            [['count', 'country_id', 'proizvod_id', 'type_id', 'measure_id', 'category_id'], 'integer'],
            [['name'], 'string', 'max' => 128],
            [['price'], 'string', 'max' => 13],
            [['img'], 'string', 'max' => 56],
            [['country_id'], 'exist', 'skipOnError' => true, 'targetClass' => Country::class, 'targetAttribute' => ['country_id' => 'id']],
            [['measure_id'], 'exist', 'skipOnError' => true, 'targetClass' => Measure::class, 'targetAttribute' => ['measure_id' => 'id']],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::class, 'targetAttribute' => ['type_id' => 'id']],
            [['proizvod_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proizvod::class, 'targetAttribute' => ['proizvod_id' => 'id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'название'),
            'price' => Yii::t('app', 'цена'),
            'img' => Yii::t('app', 'изображение'),
            'count' => Yii::t('app', 'кол-во'),
            'country_id' => Yii::t('app', 'страна'),
            'proizvod_id' => Yii::t('app', 'Производитель'),
            'type_id' => Yii::t('app', 'тип товара'),
            'measure_id' => Yii::t('app', 'страна производства'),
            'category_id' => Yii::t('app', 'категория'),
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Country]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCountry()
    {
        return $this->hasOne(Country::class, ['id' => 'country_id']);
    }

    /**
     * Gets query for [[Measure]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMeasure()
    {
        return $this->hasOne(Measure::class, ['id' => 'measure_id']);
    }

    /**
     * Gets query for [[Proizvod]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProizvod()
    {
        return $this->hasOne(Proizvod::class, ['id' => 'proizvod_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::class, ['id' => 'type_id']);
    }
}
