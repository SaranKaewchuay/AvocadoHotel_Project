<?php

namespace frontend\controllers;
use app\models\Rooms;
use app\models\RoomType;
use app\models\RoomTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Booking;
use yii;

/**
 * RoomTypeController implements the CRUD actions for RoomType model.
 */
class RoomTypeController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all RoomType models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $book = Booking::find()->where(["user_id"=>(String)Yii::$app->user->identity->id])->all();

        return $this->render('index', [
            'book' => $book
        ]);
    }

    /**
     * Displays a single RoomType model.
     * @param int $_id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($_id)
    {

        $bookingModel = new Booking();
        $dateBooked = new Rooms();
        $i = 0;
       

        if ($this->request->isPost && $bookingModel->load($this->request->post())) {
 

            $book = Booking::find()->where(["user_id"=>(String)Yii::$app->user->identity->id,
            'room_type'=>$bookingModel->room_type,
            'room_id'=>$bookingModel->room_id,
            'dateFrom'=>$bookingModel->dateFrom,
            'dateTo'=>$bookingModel->dateTo,
            'status'=>$bookingModel->status,
            
            ])->one();

            if(!empty($book)){
                 $bookingModel  = Booking::findOne(['_id' => new MongoDB\BSON\ObjectId ($book->_id)]);
             }
             //$bookingModel->save();


            if( !empty($bookingModel->dateFrom) && 
                !empty($bookingModel->dateTo) && 
                !empty($bookingModel->guest_name) && 
                !empty($bookingModel->email) && 
                !empty($bookingModel->line) &&
                !empty($bookingModel->room_id) &&
                !empty($bookingModel->request)  // || empty($bookingModel->request)
            ){
                //$bookingModel->save();
                //$bookingModel->room_id = implode(",",$bookingModel->room_id);
    
        
                $bookingModel->save();
                return $this->redirect(['booking/index']);
            }
            

        }
        
        return $this->render('view', [
            'model' => $this->findModel($_id),
            'type_id'=> $_id,
            'bookingModel' => $bookingModel,
            'dateBooked'=> $dateBooked 
        ]);

        /*return $this->render('view', [
            'model' => $this->findModel($_id),
        ]);*/
    }

    

    /**
     * Creates a new RoomType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new RoomType();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', '_id' => (string) $model->_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing RoomType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $_id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($_id)
    {
        $model = $this->findModel($_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', '_id' => (string) $model->_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing RoomType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $_id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($_id)
    {
        $this->findModel($_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the RoomType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $_id ID
     * @return RoomType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($_id)
    {
        if (($model = RoomType::findOne(['_id' => $_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
