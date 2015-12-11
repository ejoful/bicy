<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Route */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Routes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>


<style>
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    #route_img {
        width:100%;
        height:500px;
        background-size:100% 500px;
    }
    #map {
        width:100%;
        height:300px
    }

    #route_img .container {
        z-index: 3;
        position: relative;
        width: 90%;
        height: 50%;
        display: block;
        top: 30%;
        text-align: center;
    }
    .content {
        z-index: 3;
        width: 100%;
        height: 100%;
        display: block;
        color: white;
        text-align: center;
        text-shadow: 0px 1px 5px rgba(0, 0, 0, 0.2);
        line-height: 1.7;
        position: relative;
        top: 50%;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
    .content h1 {
        border:solid white 3px;
    }

    .separator-container {
        text-align: center;
        position: relative;
    }

    .aoh {
        max-width: 55px;
        margin: 0;
        border: 3px solid #fff;
        border-radius: 100%;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
    }
    .titleName {
        text-align: center;
        font-size: 20px;

    }
    .titleName a {
        color: #ffffff;
        text-decoration: none;
    }
    .route_des {
        width:100%;
        height:135px;
    }
    .route_about {
        width: 100%;
        margin: 10px 0 5px 0;
        float: left;
    }
    .route_check {
        width: 100%;
        margin: 10px 0 5px 0;
        float: left;
    }
    .route_path {
        text-align: center;
        width: 100%;
        margin: 10px 0 5px 0;
        float: left;
    }
    .rou_hea {
        text-align: left;
        border-bottom: solid 1px #ccc;
        margin: 0 0 10px 0;
        height: 35px;
    }
    .rou_hea_left {
        float: left;
        font-size: 24px;
    }
    .rou_hea_right {
        float: right;
        font-size: 21px;
        color: #31a7de;
    }
    .route_path_con {
        width: 100%;
        min-height: 70px;
        padding: 5px 0;
    }
    .paths_people {
        text-align: center;
        font-size: 20px;
        margin: 5px 5px;
        width: 55px;
        float: left;
    }
    .paths_people a {
        color: #000;
        text-decoration: none;
    }

    .route_path .rou_con {
        text-align: center;
        font-size: 20px;
        width: 300px;
        border: solid 2px #31a7de;
        color: #31a7de;
        margin: 0 auto;
        display: block;
        text-decoration: none;
    }



    .article {
        height: 100px;
        /*background-color: #efefef;*/
    }
    .column1, .column2, .column3,.column4{
        width: 25%;
        float: left;
        margin: 0;
        padding: 20px 3px;
        text-align: center;
    }

    .icons{
        height: 70px;
        /*background-color: #efefef;*/
    }
    .column11,.column12, .column13,.column14,.column15,.column16{
        width: 14.27%;
        float: left;
        margin: 0 3px;
        padding: 14px 0;
        text-align: center;
    }

    .red {
        color:red;
    }
</style>

<?php if(Yii::$app->session->hasFlash('success')):?>
<div class="red">
    <?php echo Yii::$app->session->getFlash('success'); ?>
</div>
<?php endif; ?>


<div class="route-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
        if($model->author_id == Yii::$app->user->identity->id) {


    ?>
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
    <?php
        }
    ?>

    <div id="route_img" style="border-radius: 20px;background-image: url(<?php echo Url::to('@web/' . $model->img, true);?>);">

        <div class="container">
            <div class="content">
                <h4><?php echo $model->departure . '--' . $model->destination;?></h4>
                <div class="separator-container">
                    <div class="separator line-separator"><?php echo $model->status; ?></div>
                </div>
                <h4><?php echo $model->start_time . '--' . $model->end_time;?></h4>

                    <a href="<?php echo Url::toRoute('user/profile/show?id='.$model->author->id, true); ?>">
                        <img class="aoh" src="http://gravatar.com/avatar/<?php echo $model->author->profile->gravatar_id; ?>?s=230">
                    </a>

                <div class="titleName"><a href="<?php echo Url::toRoute('user/profile/show?id='.$model->author->id, true); ?>"><?php echo $model->author->username; ?></a></div>

            </div>
        </div>

    </div>

    <div id="content">
        <div class="article column1">
            <h6><?php echo $model->days; ?> DAYS</h6>
            <h6>Tour Length</h6>
        </div>
        <div class="article column2">
            <h6><?php echo $model->miles; ?> MILES</h6>
            <h6>Tour Distance</h6>
        </div>
        <div class="article column3">
            <h6><?php echo round($model->miles/$model->days, 2); ?> MILES</h6>
            <h6>Daily Distance</h6>
        </div>
        <div class="article column4">
            <h6>+<?php echo $join_count; ?></h6>
            <h6>Pedalers</h6>
        </div>
    </div>


    <div id="map"></div>

    <div class="route_about">
        <div class="rou_hea">
            <div class="rou_hea_left">About This Trip</div>
        </div>
        <div class="rou_con" id="rou_con"><?php echo $model->about; ?></div>
    </div>

    <div class="route_check">
        <div class="rou_hea">
            <div class="rou_hea_left">Check List</div>
<!--            <div class="rou_hea_right">Read all</div>-->
        </div>
        <div id="content">

            <div class="icons column11">
                <img src="<?php echo Url::to('@web/images/icon_list_1.png', true);?>">
                <div>Tent</div>
            </div>
            <div class="icons column12">
                <img src="<?php echo Url::to('@web/images/icon_list_2.png', true);?>">
                <div>Telescope</div>
            </div>
            <div class="icons column13">
                <img src="<?php echo Url::to('@web/images/icon_list_3.png', true);?>">
                <div>Notebooks</div>
            </div>
            <div class="icons column14">
                <img src="<?php echo Url::to('@web/images/icon_list_4.png', true);?>">
                <div>Backpack</div>
            </div>
            <div class="icons column15">
                <img src="<?php echo Url::to('@web/images/icon_list_6.png', true);?>">
                <div>Boots</div>
            </div>
            <div class="icons column16">
                <img src="<?php echo Url::to('@web/images/icon_list_7.png', true);?>">
                <div>Passport</div>
            </div>
        </div>

    </div>


    <div class="route_path">
        <div class="rou_hea">
            <div class="rou_hea_left">Paths</div>
            <div class="rou_hea_right"><a href="<?php echo Url::toRoute("comment/paths?id=".$model->id, true); ?>" >Check Paths</a></div>
        </div>

        <div class="route_path_con">
            <?php
                foreach ($join as $item) {
            ?>
            <div class="paths_people">
                <a href="<?php echo Url::toRoute('user/profile/show?id='.$model->author->id, true); ?>">
                    <img class="aoh" src="http://bootstrap-themes.github.io/application/assets/img/avatar-dhg.png" />
                </a>
            </div>
            <?php
                }
            ?>
        </div>


        <?php
            if ($model->author->id != Yii::$app->user->identity->id) {
        ?>
        <a role="button" id="joinus" class="rou_con" target="_self" type="submit" href="javascript:;">join us</a>
        <?php }?>
    </div>


    <div class="comment-form">
        <?php
        $form = ActiveForm::begin([
            'action' => ['comment/mypath'],
            'method' => 'post',
        ]);
        ?>
        <?= $form->field($comment, 'content')->textarea(['rows' => 6]) ?>

        <?= $form->field($comment, 'miles')->textInput() ?>

        <?= $form->field($comment, 'route_id')->hiddenInput(['value' => $model->id])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('Create', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>


</div>


</div>
<script>

    function show(){
        var box = document.getElementById("rou_con");
        var text = box.innerHTML;
            box.innerHTML = text.length > 200 ? text.substring(0,200) + "..." : text;
            if($("#rou_about_ra").length == 0) {
                $(".route_about .rou_hea").append('<div class="rou_hea_right" id="rou_about_ra"><a href="###" id="re_al">Read all</a></div>')
            }

            $("#re_al").click(function(){
                if ($("#re_al").text() == "Read all") {
                    $("#re_al").text("Hide");
                    box.innerHTML = text;
                } else {
                    $("#re_al").text("Read all");
                    box.innerHTML = text.substring(0,200);
                }
            })

    }
    show();


    $("#joinus").click(function(){
        var data = {
            user_id : <?php echo Yii::$app->user->identity->id; ?>,
            route_id : <?php echo $model->id; ?>,
        };
        $.ajax({
            url : "/index.php/join/joinus",
            type : "post",
            data : data,
            async : "true",
            dataType : "json"
        });
    });

    function initMap() {
        var directionsService = new google.maps.DirectionsService;
        var directionsDisplay = new google.maps.DirectionsRenderer;
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 7,
            center: {lat: 41.85, lng: -87.65}
        });
        directionsDisplay.setMap(map);
        calculateAndDisplayRoute(directionsService, directionsDisplay);
    }

    function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        directionsService.route({
            origin: "<?php echo $model->departure;?>",//document.getElementById('start').value,
            destination: "<?php echo $model->destination;?>",//document.getElementById('end').value,
            travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
            if (status === google.maps.DirectionsStatus.OK) {
                directionsDisplay.setDirections(response);
            } else {
                window.alert('Directions request failed due to ' + status);
            }
        });
    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBL_I1SvUIxx_E1h-P3YrEH8dwGJ3L3PeY&signed_in=true&callback=initMap"
        async defer></script>






