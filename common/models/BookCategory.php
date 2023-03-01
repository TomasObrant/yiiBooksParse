<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "book_category".
 *
 * @property int $book_id
 * @property int $category_id
 */
class BookCategory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
//            [[], 'required'],
//            [[], 'integer'],
//            [[], 'unique', 'targetAttribute' => ['book_id', 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'book_id' => 'Book ID',
            'category_id' => 'Category ID',
        ];
    }

    public function getBookId()
    {
        return $this->hasOne(Books::class, ['id' => 'book_id']);
    }
    public function getCategoryId()
    {
        return $this->hasOne(Categories::class, ['id' => 'category_id']);
    }
}
