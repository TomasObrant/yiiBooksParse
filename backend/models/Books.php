<?php

namespace backend\models;

use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $isbn
 * @property int|null $pageCount
 * @property string|null $publishedDate
 * @property string|null $thumbnailUrl
 * @property string|null $shortDescription
 * @property string|null $longDescription
 * @property string|null $status
 */
class Books extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [];
    }
    public function transactions()
    {
        return [
            self::SCENARIO_DEFAULT => self::OP_ALL,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
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
            'isbn' => 'Isbn',
            'pageCount' => 'Page Count',
            'publishedDate' => 'Published Date',
            'thumbnailUrl' => 'Thumbnail Url',
            'shortDescription' => 'Short Description',
            'longDescription' => 'Long Description',
            'status' => 'Status',
        ];
    }

    public function getAuthors()
    {
        return $this->hasMany(Authors::class, ['id' => 'author_id'])->viaTable('book_author', ['book_id' => 'id']);
    }

    public function getBookAuthor()
    {
        return $this->hasMany(BookAuthor::class, ['book_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasMany(Categories::class, ['id' => 'category_id'])->viaTable('book_category', ['book_id' => 'id']);
    }

    public function getBookCategory()
    {
        return $this->hasMany(BookCategory::class, ['book_id' => 'id']);
    }



    public function createBook($bookData)
    {
        if(!Books::find()->where(['title' => $bookData['title']])->exists()) {
            $this->title = isset($bookData['title']) ? $bookData['title'] : null;
            $this->isbn = isset($bookData['isbn']) ? $bookData['isbn'] : null;
            $this->pageCount = isset($bookData['pageCount']) ? $bookData['pageCount'] : 0;
            $this->publishedDate = isset($bookData['publishedDate']) ? $this->createDate($bookData['publishedDate']) : null;
            $this->thumbnailUrl = isset($bookData['thumbnailUrl']) ? $this->createImage($bookData['thumbnailUrl']) : null;
            $this->shortDescription = isset($bookData['shortDescription']) ? $bookData['shortDescription'] : null;
            $this->longDescription = isset($bookData['longDescription']) ? $bookData['longDescription'] : null;
            $this->status = isset($bookData['status']) ? $bookData['status'] : null;
            if ($this->save()) return $this->id;
        }
    }

    public function createDate($bookData)
    {
        $date = str_replace("T", " ", $bookData['$date']);
        return date("Y-m-d H:i:s", strtotime($date));
    }

    public function createImage($bookData)
    {
        ini_set('user_agent', 'Mozilla/5.0 (Windows NT 6.1; WOW64; rv:9.0) Gecko/20100101 Firefox/9.0');
        $path = 'images/books/';
        $ext = explode('.', $bookData);
        $new_name = uniqid().'.'.array_pop($ext);
        $full_path = $path.$new_name;
        if(file_put_contents($full_path, file_get_contents($bookData))) return $new_name;
    }

    public function createCategory($categoryData)
    {
        $category = new Categories();
        $category->title = $categoryData;
        if ($category->save()) {
            return  $category->id;
        } else {
            $category = Categories::find()->where('title = :title', [':title' => $categoryData])->one();
            return $category->id;
        }
    }

    public function createAuthor($authorData)
    {
        $author = new Authors();
        $author->name = $authorData;
        if ($author->save()) {
            return  $author->id;
        } else {
            $author = Authors::find()->where('name = :name', [':name' => $authorData])->one();
            return $author->id;
        }
    }

    public function createBookToCategory($BookID, $CategoryID)
    {
        $book_category = new BookCategory();
        $book_category->category_id = $CategoryID;
        $book_category->book_id = $BookID;
        $book_category->save(false);
    }

    public function createBookToAuthor($BookID, $AuthorID)
    {
        $book_author = new BookAuthor();
        $book_author->author_id = $AuthorID;
        $book_author->book_id = $BookID;
        $book_author->save(false);
    }

    public function beforeDelete()
    {
       if (parent::beforeDelete()) {
           BookAuthor::deleteAll(['book_id'=>$this->id]);
           BookCategory::deleteAll(['book_id'=>$this->id]);
       } else {
            return true;
       }
    }


}
