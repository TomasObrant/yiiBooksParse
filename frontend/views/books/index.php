<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-books">
    <h1><?= Html::encode($this->title) ?></h1>

    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <a href="<?= Url::to(['books/show', 'id' => $book->id]) ?>" class="text-decoration-none">
                    <?= Html::encode("{$book->id} ({$book->title})") ?>:
                    <?= $book->isbn ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>

    <?= LinkPager::widget([

        'pagination' => $pagination,
        'maxButtonCount' => 5,
        'activePageCssClass' => 'active',
        'linkContainerOptions' => ['class' => 'page-item'],
        'linkOptions' => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
    ]) ?>

</div>

