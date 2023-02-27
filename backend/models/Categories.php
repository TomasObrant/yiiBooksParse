<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $title
 */
class Categories extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
            ['title', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Books::class, ['id' => 'books_id'])->viaTable('book_category', ['category_id' => 'id']);
    }

    public function getBookCategory()
    {
        return $this->hasMany(BookCategory::class, ['category_id' => 'id']);
    }

}
