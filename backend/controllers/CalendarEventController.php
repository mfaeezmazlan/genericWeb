<?php

namespace backend\controllers;

use Yii;
use app\models\CalendarEvent;
use app\models\CalendarEventSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CalendarEventController implements the CRUD actions for CalendarEvent model.
 */
class CalendarEventController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
        'verbs' => [
        'class' => VerbFilter::className(),
        'actions' => [
        'delete' => ['POST'],
        ],
        ],
        ];
    }

    /**
     * Lists all CalendarEvent models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CalendarEventSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
    }

    /**
     * Displays a single CalendarEvent model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            ]);
    }

    /**
     * Creates a new CalendarEvent model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CalendarEvent();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Updates an existing CalendarEvent model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                ]);
        }
    }

    /**
     * Deletes an existing CalendarEvent model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CalendarEvent model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CalendarEvent the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CalendarEvent::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionGetEvent(){
        $model = CalendarEvent::find()->orderBy(["startDate"=>SORT_ASC])->all();
        $arr[] = array();
        foreach($model as $x){
            $arr[] = array(
                "title" => $x->title,
                "start" => $x->startDate." ".$x->startTime,
                "end" => $x->endDate." ".$x->endTime,
                "backgroundColor" => CalendarEvent::getRandColor(),
                "borderColor" => CalendarEvent::getRandColor(),
                "allDay"=>false,
            );
        }
        $encode = json_encode($arr);
        echo $encode;
    }

    public function actionInsertNewEvent(){
        $inTitle = $_POST['title'];
        $inStartDate = $_POST['startDate'];
        $inStartTime = $_POST['startTime'];
        $inEndDate = $_POST['endDate'];
        $inEndTime= $_POST['endTime'];
        $inAllDay = $_POST['allDay'];

        $model = new CalendarEvent();
        $model->title = $inTitle;
        $model->startDate = $inStartDate;
        $model->startTime = $inStartTime;
        $model->endDate = $inEndDate;
        $model->endTime = $inEndTime;

        $model->save(); 
    }
}
