<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="post-list list-group">
        <?php foreach ($postList as $post) : ?>
            <?= Html::tag('a', Html::encode($post->title), [
                'href' => '#',
                'class' => 'post-ref list-group-item',
                'id' => $post->id,
                'data-toggle' => 'modal',
                'data-target' => '#modalPost',
            ]) ?>
        <?php endforeach; ?>
    </div>
</div>

<div class="modal fade" id="modalPost" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"></h4>
                <small class="modal-date"></small>
            </div>
            <div class="modal-body">
                <div class="loader"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
