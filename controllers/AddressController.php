<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\db\ActiveRecord;
use app\models\Customer;
use app\models\Address;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class AddressController extends Controller
{
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

    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Address::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $address = new Address();

        if ($address->load(Yii::$app->request->post()) && $address->save()) {
                return $this->redirect(['/']);
        }
        return $this->render('create', [
            'address' => $address
        ]);
    }

    public function actionUpdate($id)
    {
        $address = $this->findModel($id);

        if ($address->load(Yii::$app->request->post()) && $address->save()) {
            return $this->redirect(['/']);
        }
        return $this->render('update', [
            'address' => $address
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['/']);
    }

//    protected function findModel($className, $id)
//    {
//        if (class_exists($className)) {
//            $model = new $className();
//            if ($model instanceof ActiveRecord) {
//                $model = $model::findOne($id);
//                if (!is_null($model)) {
//                    return $model;
//                }
//            }
//        }
//        throw new NotFoundHttpException();
//    }

    protected function findModel($id)
    {
        if (($model = Address::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }


}