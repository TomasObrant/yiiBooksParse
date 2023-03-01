<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Books $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Books', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="books-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <table class="table table-condensed table-bordered table-hover">

        <tr class="active">
            <td><h4>ID</h4></td>
            <td><h4><?php echo $book->id; ?></h4></td>
        </tr>

        <tr class="active">
            <td><h4>Title</h4></td>
            <td><h4><?php echo $book->title; ?></h4></td>
        </tr>

        <tr class="active">
            <td><h4>ISBN</h4></td>
            <td><h4><?php echo $book->isbn; ?></h4></td>
        </tr>

        <tr class="active">
            <td><h4>Page Count</h4></td>
            <td><h4><?php echo $book->pageCount; ?></h4></td>
        </tr>

        <tr class="active">
            <td><h4>Published Date</h4></td>
            <td><h4><?php echo $book->publishedDate; ?></h4></td>
        </tr>

        <tr class="active">
            <td><h4>Thumbnail Url</h4></td>
            <td><h4><?php echo $book->thumbnailUrl; ?></h4></td>
        </tr>

        <tr class="active">
            <td><h4>Short Description</h4></td>
            <td><h4><?php echo $book->shortDescription; ?></h4></td>
        </tr>

        <tr class="active">
            <td><h4>Long Description</h4></td>
            <td><h4><?php echo $book->longDescription; ?></h4></td>
        </tr>

        <tr class="active">
            <td><h4>Status</h4></td>
            <td><h4><?php echo $book->status; ?></h4></td>
        </tr>

        <tr class="active">
            <td><h4>Author</h4></td>
            <td>
                <?php foreach ($book->authors as $value) :?>
                    <h4><?php echo $value['name']; ?></h4>
                <?php endforeach; ?>
            </td>
        </tr>

        <tr class="active">
            <td><h4>Category</h4></td>
            <td>
                <?php foreach ($book->categories as $value) :?>
                    <h4><?php echo $value['title']; ?></h4>
                <?php endforeach; ?>
            </td>
        </tr>

    </table>


</div>
