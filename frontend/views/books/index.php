<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="site-books">
    <h1 class="mb-2"><?= Html::encode($this->title) ?></h1>

    <div class="card-deck">
        <?php foreach ($books as $book): ?>
        <div class="row justify-content-xl-center mb-4">
            <div class="card-left col-2 mx-auto text-center">
                <?php echo Html::img('@imageurl/images/books/'.$book->image, ['width' => 'auto', 'height' => '175px', 'alt' => 'kudatopropalo']) ?>
            </div>
            <div class="card-right col-10">
                <div class="card-body">
                    <h5 class="card-title"><?= $book->title ?></h5>
                    <p class="card-text"><?= $book->shortDescription ?></p>
                    <a href="<?= Url::to(['books/show', 'id' => $book->id]) ?>" class="btn btn-primary">Show</a>
                </div>
                <div class="card-footer">
                    <small class="text-muted"><?= $book->publishedDate ?></small>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>


    <?= LinkPager::widget([
        'pagination' => $pagination,
        'maxButtonCount' => 5,
        'activePageCssClass' => 'active',
        'linkContainerOptions' => ['class' => 'page-item'],
        'linkOptions' => ['class' => 'page-link'],
        'disabledListItemSubTagOptions' => ['tag' => 'a', 'class' => 'page-link'],
    ]) ?>

</div>

