<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Join */

$this->title = 'Create Join';
$this->params['breadcrumbs'][] = ['label' => 'Joins', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="join-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
