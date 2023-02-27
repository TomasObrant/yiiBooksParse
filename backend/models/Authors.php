<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string|null $name
 */
class Authors extends \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            ['name', 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Books::class, ['id' => 'books_id'])->viaTable('book_author', ['author_id' => 'id']);
    }

    public function getBookAuthor()
    {
        return $this->hasMany(BookAuthor::class, ['author_id' => 'id']);
    }
}
