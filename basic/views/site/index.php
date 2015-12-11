<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
use yii\widgets\LinkPager;
use yii\helpers\Url;
?>
<!--<link href="/css/splash.css" rel="stylesheet">-->
<!--<link href="/css/core.css" rel="stylesheet">-->

<div id="regional-sales-content" class="tab-content container-fluid no-pad">

    <div role="tabpanel" class="tab-pane active showing-extra-row" id="todays-sales">
        <div class="row tiles">

            <?php
                foreach($model as $item) {
            ?>
                    <div id="route_img" style="background-image: url(<?php echo Url::to('@web/' . $item->img, true);?>);">

                        <div class="container">
                            <div class="content">
                                <h4><?php echo $item->departure . '--' . $item->destination;?></h4>
                                <div class="separator-container">
                                    <div class="separator line-separator"><?php echo $item->status; ?></div>
                                </div>
                                <h4><?php echo $item->start_time . '--' . $item->end_time;?></h4>

                                <a href="<?php echo Url::toRoute('user/profile/show?id='.$item->author->id, true); ?>">
                                    <img class="aoh" src="http://gravatar.com/avatar/<?php echo $item->author->profile->gravatar_id; ?>?s=230">
                                </a>

                                <div class="titleName"><a href="<?php echo Url::toRoute('user/profile/show?id='.$item->author->id, true); ?>"><?php echo $item->author->username; ?></a></div>

                            </div>
                        </div>

                    </div>




<!---->
<!--            <article class="sale-tile col-lg-4 col-md-4 col-sm-6 col-xs-6" style="width: 100%;height: 255px;">-->
<!--                <a href="--><?php //echo Yii::$app->urlManager->createUrl(["route/view","id"=>$item->id]);?><!--">-->
<!--                    <div class="tile-inner">-->
<!--                        <img src="--><?php //echo Url::to('@web/' . $item->img, true);?><!--" data-path="--><?php //echo Url::to('@web/' . $item->img, true);?><!--" class="img-responsive dpr-aware">-->
<!--                        <footer class="sale-tile-detail">-->
<!--                            <div class="sale-tile-detail-inner clearfix">-->
<!---->
<!--                                <div class="market-category market-category-brilliant"></div>-->
<!---->
<!--                                <h1 class="tenor">--><?php //echo $item->title;?><!--</h1>-->
<!---->
<!--                                <div class="clearfix">-->
<!--                                    <h2 class="pull-left">--><?php //echo $item->status . "      " . $item->departure . ',' . $item->destination;?><!--</h2>-->
<!--                                    <p class="timing pull-right"><span class="icon-clock-o"></span> <span>--><?php //echo $item->days; ?><!-- days left</span></p>-->
<!---->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </footer>-->
<!--                    </div>-->
<!--                </a>-->
<!--            </article>-->
            <?php
            }
            ?>


    </div>

        <div style="">
        <?= LinkPager::widget(['pagination' => $pages]); ?>
        </div>
</div>



