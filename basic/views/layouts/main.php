<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <header class="header navbar-fixed-top">
        <div class="container">
            <ul class="nav nav-pills">
                <li>Explore</li>
                <li><a href="#">Filters</a></li>
            </ul>
        </div>
    </header>

    <?php
    /*
    NavBar::begin([
        'brandLabel' => 'Bicycle',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    $navItems=[
        ['label' => 'Explore', 'url' => ['/site/index']],
        ['label' => 'Planning', 'url' => ['/route/create']],
        ['label' => 'Profile', 'url' => ['/user/settings/profile']],
        ['label' => 'Route', 'url' => ['/route/index']],

//        ['label' => 'Contact', 'url' => ['/site/contact']],
//        ['label' => 'Join', 'url' => ['/join/index']],
//        ['label' => 'Comment', 'url' => ['/comment/index']],
    ];
    if (Yii::$app->user->isGuest) {
        array_push($navItems,['label' => 'Sign In', 'url' => ['/user/login']],['label' => 'Sign Up', 'url' => ['/user/register']]);
    } else {
        array_push($navItems,['label' => 'My home page', 'url' => ['/user/profile/show?id='.Yii::$app->user->identity->id]]);
        array_push($navItems,['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']]
        );
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $navItems,
    ]);

    NavBar::end();
    */
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer navbar-fixed-bottom">
    <div class="container">
<!--        <p class="pull-left">&copy; bicycle --><?//= date('Y') ?><!--</p>-->
<!---->
<!--        <p class="pull-right">--><?//= Yii::powered() ?><!--</p>-->

        <ul class="nav nav-pills">
            <li><img src="/images/explore.png"/><a href="#">Explore</a></li>
            <li><img src="/images/planning.png"/><a href="#">Planning</a></li>
            <li><img src="/images/profile.png"/><a href="#">Profile</a></li>
        </ul>
    </div>
</footer>



<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
