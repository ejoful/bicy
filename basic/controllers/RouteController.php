<?php

namespace app\controllers;

use Yii;
use app\models\Route;
use app\models\RouteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use app\models\Join;
use app\models\Comment;
use app\models\Lookup;

/**
 * RouteController implements the CRUD actions for Route model.
 */
class RouteController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Route models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RouteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Route model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {


        $model = $this->findModel($id);

        $model->start_time = date('M d, Y', $model->start_time);
        $model->end_time = date('M d, Y', $model->end_time);
        $model->status = ucfirst(strtolower(Lookup::item("RouteStatus", $model->status)));

        $join = Join::find($id)
            ->joinWith('user')
            ->where(['route_id'=>$id])
            ->all();

        $join_count = count($join);

        $comment = new Comment();

        return $this->render('view', [
            'model' => $model,
            'join' => $join,
            'comment' => $comment,
            'join_count' => $join_count,
        ]);
    }

    /**
     * Creates a new Route model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $rootPath = Yii::$app->params['route_img_dir'];
        $model = new Route();

        $status = Lookup::items("RouteStatus");

        if ($model->load(Yii::$app->request->post())) {
                $image = UploadedFile::getInstance($model, 'img');

                $ext = $image->getExtension();
                $randName = time() . rand(1000, 9999) . "." . $ext;
                $path = abs(crc32($randName) % 500);
                $rootPath = $rootPath  . "img/";
                if (!file_exists($rootPath)) {
                    mkdir($rootPath, 0777, true);
                }
                $image->saveAs($rootPath . $randName);
                $model->img = $rootPath . $randName;

                if ($model->save()) {
                    $is_joined = Join::find()
                            ->andWhere(['user_id' => $model->author_id, 'route_id' => $model->id])
                            ->all() == null;
                    if ($is_joined) {
                        $join = new Join();
                        $join->user_id = $model->author_id;
                        $join->route_id = $model->id;
                        $join->save();
                    }

                    return $this->redirect(['view', 'id' => $model->id]);
                }
        } else {
            return $this->render('create', [
                'model' => $model,
                'status' => $status,
            ]);
        }
    }

    /**
     * Updates an existing Route model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $rootPath = Yii::$app->params['route_img_dir'];
        $model = $this->findModel($id);

        $model->start_time = date("Y-m-d H:i",$model->start_time);
        $model->end_time = date("Y-m-d H:i",$model->end_time);


        $old_img = $model->img;

        $status = Lookup::items("RouteStatus");

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'img');
            if ($image) {
                $ext = $image->getExtension();
                $randName = time() . rand(1000, 9999) . "." . $ext;
                $path = abs(crc32($randName) % 500);
                $rootPath = $rootPath  . "img/";
                if (!file_exists($rootPath)) {
                    mkdir($rootPath, 0777, true);
                }
                $image->saveAs($rootPath . $randName);
                $model->img = $rootPath . $randName;
                //删除图片
                unset($old_img);
            } else {
                $model->img = $old_img;
            }

            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id, 'status' => $status]);
            }
        } else {
            return $this->render('update', [
                'model' => $model,
                'status' => $status,
            ]);
        }
    }

    /**
     * Deletes an existing Route model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        //删除图片
        unset($this->findModel($id)->img);

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Route model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Route the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Route::find()
            ->where(['id'=>$id])
            ->with('author.profile')
            ->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
