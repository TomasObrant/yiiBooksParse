<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "book_author".
 *
 * @property int $book_id
 * @property int $author_id
 */
class BookAuthor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book_author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
//        return [
//            [['book_id', 'author_id'], 'required'],
//            [['book_id', 'author_id'], 'integer'],
//            [['book_id', 'author_id'], 'unique', 'targetAttribute' => ['book_id', 'author_id']],
//        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'book_id' => 'Book ID',
            'author_id' => 'Author ID',
        ];
    }

    public function getBookId()
    {
        return $this->hasOne(Books::class, ['id' => 'book_id']);
    }
    public function getAuthorId()
    {
        return $this->hasOne(Authors::class, ['id' => 'author_id']);
    }
}
