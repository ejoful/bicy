<?php

//use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Route */

$this->title = 'path';
$this->params['breadcrumbs'][] = ['label' => 'Route', 'url' => ['route/view','id'=>$route_id]];
$this->params['breadcrumbs'][] = ['label' => 'Path'];
?>

<style type="text/css">

.timeline {
  list-style: none;
  padding: 20px 0 20px;
  position: relative;
}

.timeline:before {
  top: 0;
  bottom: 0;
  position: absolute;
  content: " ";
  width: 3px;
  background-color: #eeeeee;
  left: 10%;
  margin-left: -1.5px;
}

.timeline > li {
  margin-bottom: 20px;
  position: relative;
}

.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}

.timeline > li:after {
  clear: both;
}

.timeline > li:before,
.timeline > li:after {
  content: " ";
  display: table;
}

.timeline > li:after {
  clear: both;
}

.timeline > li > .timeline-panel {
  width: 80%;
  float: right;
  border: 1px solid #d4d4d4;
  border-radius: 2px;
  padding: 20px;
  position: relative;
  -webkit-box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.175);
}


.timeline > li > .timeline-panel:before {
  position: absolute;
  top: 26px;
  left: -15px;
  display: inline-block;
  border-top: 15px solid transparent;
  border-right: 15px solid #ccc;
  border-left: 0 solid #ccc;
  border-bottom: 15px solid transparent;
  content: " ";
}

.timeline > li > .timeline-panel:after {
  position: absolute;
  top: 27px;
  left: -14px;
  display: inline-block;
  border-top: 14px solid transparent;
  border-right: 14px solid #fff;
  border-left: 0 solid #fff;
  border-bottom: 14px solid transparent;
  content: " ";
}

.timeline > li > .timeline-badge {
  color: #fff;
  width: 50px;
  height: 50px;
  line-height: 50px;
  font-size: 1.4em;
  text-align: center;
  position: absolute;
  top: 16px;
  left: 10%;
  margin-left: -25px;
  background-color: #999999;
  z-index: 100;
  border-top-right-radius: 50%;
  border-top-left-radius: 50%;
  border-bottom-right-radius: 50%;
  border-bottom-left-radius: 50%;
}





.timeline-badge.primary {
  background-color: #d9534f !important;
}

.timeline-badge.success {
  background-color: #d9534f !important;
}

.timeline-badge.warning {
  background-color: #d9534f !important;
}

.timeline-badge.danger {
  background-color: #d9534f !important;
}

.timeline-badge.info {
  background-color: #d9534f !important;
}

.timeline-title {
  margin-top: 0;
  color: inherit;
}

.timeline-body > p,
.timeline-body > ul {
  margin-bottom: 0;
}

.timeline-body > p + p {
  margin-top: 5px;
}
.accordionOm {
  position: relative;
  background: #efefef;
  margin: 0;
  font: 300 18px 'Oswald', Arial, Helvetica, sans-serif;
  cursor: pointer;
}
.accordionOm:hover {
  color: #555;
}
.accordionOm:before,
.accordionOm:after {
  content: "";
  position: absolute;
  background: #efefef;
  display: inline-block;
}
.accordionOm:before {

}
.accordionOm:after {

  transition: transform .5s;
  transform: rotate(0);
}
.accordionOm.opened:after {
  transform: rotate(90deg);
}
.accordionOm + div {
  border-left: 4px solid #999;
  padding: 0 15px;
  margin-left: 8px;
  font: 13px 'Open Sans', Arial, Helvetica, sans-serif;
  color: #666;
}

.column11, .column12, .column13,.column14,.column15,.column16,.column17{
	width: 14.27%;
	float: left;
	margin: 0%;
}

#timeline {
	font-family: Arial, Verdana, sans-serif;
	color: #665544;
	text-align: center;
}
body {
	width: 100%;
	margin: 0 auto;
}
			

		#trailBar{
			margin-left: 35px;
			margin-right: 35px;
			margin-top: 25px;
			margin-bottom: 25px;
			overflow: hidden;
    		background: -webkit-linear-gradient(right, #31a7de, #31a7de 35px, white 35px, white);
    		border: transparent;
    		border-radius:0.25em;
		}


		p.trailTextTop{
			padding-top: 25px;
			padding-left: 25px;
			padding-right: 60px;
			padding-bottom: 25px;
			font-size: large;
		}

		p.trailTextBot{
		
			padding-left: 25px;
			padding-right: 60px;
			padding-bottom: 25px;
			font-size: large;

		}

		.left { float: left; }
		.right { float: right; }
		p { overflow: hidden; }

		.panel-group .list-group {
			margin-bottom: 0;
		}

		.panel-group .list-group .list-group-item {
			border-radius: 0;
			border-left: none;
			border-right: none;
		}

		.panel-group .list-group .list-group-item:last-child {
			border-bottom: none;
		}
			
		.panel-body{
			background: #efefef;
		}

		#listItem{
			position: relative;
			height: 200px;
			background: #efefef;
		}
		
		#listItemProfile{
			position: absolute;
    		height: 80px;
   			width: 80px;
    		left: 35px;
    		top: 60px;
   
		}
		
		#listItemTitle{
			position: absolute;
			left: 150px;
			top: 50px;
			font-size: large;
		}
		
		#listItemSubtitle{
			position: absolute;
			left: 150px;
			top: 95px;
			font-size: large;
		}

		#listItemInfo{
			position: absolute;
			right:70px;
			top:88px;
		}

		#listItemArrow{
			position: absolute;
    		height: 40px;
   			width: 20px;
    		right: 35px;
    		top: 40%;
		}

</style>

<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>-->

  <div class="page-header">
    <h1 id="timeline">Path</h1>
  </div>

<?php
foreach($model as $item) {

?>
	<h4 class="accordionOm opened">
		<div id="listItem">

			<img id="listItemProfile" src="http://gravatar.com/avatar/<?php echo $item['gravatar_id']; ?>?s=230">


			<div id="listItemTitle">
				<p color: black><?php echo $item['user']->username; ?></p>
			</div>

			<div id="listItemSubtitle">
				<p><?php echo $item['bio']; ?></p>
			</div>

			<div id="listItemInfo">
				<p>View all</p>
			</div>

			<img id="listItemArrow" src="<?php echo Url::to('@web/images/ArrowMark_icon.png', true);?>">

			</img>

		</div>
	</h4>
<div>
	<div class="container1">

		<ul class="timeline">
			<?php
			foreach ($item['path'] as $path) {
			?>
			<li class="timeline">
				<div class="timeline-badge warning"><img src="<?php echo Url::to('@web/images/Post_icon.png', true);?>" /></div>
				<div class="timeline-panel">

					<div class="timeline-body">
						<div id="trailBar">
							<p class="trailTextTop"><span class='left'><?php echo $path->content;?></span>
							</p>

							<p class="trailTextBot"><span class='left'><?php echo $path->create_time;?></span><span class='right'><?php echo $path->miles;?> Miles</span></p>

						</div>
					</div>
				</div>
			</li>
			<?php
			}
			?>



				<li>
					<div class="timeline-badge danger"><img src="<?php echo Url::to('@web/images/Photo_icon.png', true);?>"></div>
					<div class="timeline-panel">

						<div class="timeline-body">
							<div id="trailBar">
								<div class="trailTextTop">
									<div class="icons column11">
										<img src="<?php echo Url::to('@web/images/icon_list_1.png', true);?>">
									</div>
									<div class="icons column12">
										<img src="<?php echo Url::to('@web/images/icon_list_2.png', true);?>">
									</div>
									<div class="icons column13">
										<img src="<?php echo Url::to('@web/images/icon_list_3.png', true);?>">
									</div>
									<div class="icons column14">
										<img src="<?php echo Url::to('@web/images/icon_list_4.png', true);?>">
									</div>
									<div class="icons column15">
										<img src="<?php echo Url::to('@web/images/icon_list_6.png', true);?>">
									</div>
									<div class="icons column16">
										<img src="<?php echo Url::to('@web/images/icon_list_7.png', true);?>">
									</div>
								</div>

							</div>
						</div>
					</div>
				</li>


		</div>

	</div>
<?php
}
?>












<script>
$('.accordionOm').next().hide();
$(".opened").next().show();
$('.accordionOm').click(function() {
  if ($(this).hasClass("opened") == true) {
    $(this).next().slideUp("slow");
    $(this).removeClass('opened');
  } else {
    $(".opened").next().slideUp("slow");
    $(".opened").removeClass("opened");
    $(this).addClass('opened');
    $(this).next().slideDown("slow");
  }
});
</script>
