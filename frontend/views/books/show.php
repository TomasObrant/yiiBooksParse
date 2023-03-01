<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Book';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-books">
    <h1><?= $book->title ?></h1>
    <p><?= $book->isbn ?></p>
    <p><?= $book->shortDescription ?></p>
    <p><?= $book->longDescription ?></p>
    <p><?= $book->publishedDate ?></p>
</div>

<a href="<?= Url::to('books') ?>">back</a>
