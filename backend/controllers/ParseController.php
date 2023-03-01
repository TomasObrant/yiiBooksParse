<?php

namespace backend\controllers;

use common\models\Books;
use common\models\Authors;
use common\models\Categories;
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
