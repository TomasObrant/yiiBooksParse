<?php

namespace backend\controllers;

use backend\models\Books;
use backend\models\Authors;
use backend\models\Categories;
use yii\web\Controller;


class ParseController extends Controller
{
    public function actionParse()
    {
        $file = file_get_contents('../books.json');
        $books = json_decode($file, true);

        $bookModel = new Books();
        $AuthorModel = new Authors();
        $CategoryModel = new Categories();

        foreach ($books as $book) {
            $bookModel->title = isset($data['name']) ? $data['name'] : null;
        }
    }
}
