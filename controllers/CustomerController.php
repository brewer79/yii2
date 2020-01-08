<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Customer;
use app\models\Address;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class CustomerController extends Controller
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
            'query' => Customer::find(),
            'pagination' => [
                'pageSize' => 5
            ],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => Customer::findOne($id),
        ]);
    }

    public function actionCreate()
    {
        $customer = new Customer();
        $address = new Address();

        if ($customer->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post())) {
            if ($customer->validate()) {
                $customer->save(false);
                $address->customer_id = $customer->id;
                $address->save(false);
                return $this->redirect(['index', 'id' => $customer->id]);
            }
        }
        return $this->render('create', [
            'customer' => $customer,
            'address' => $address
        ]);
    }

    public function actionUpdate($id)
    {
        $customer = Customer::findOne($id);
        $address = Address::find()->where(['customer_id' => $id])->one();

        if ($customer->load(Yii::$app->request->post()) && $address->load(Yii::$app->request->post())) {
            $isValid = $customer->validate();
            $isValid = $address->validate() && $isValid;
            if ($isValid) {
                $customer->save(false);
                $address->save(false);
                return $this->redirect(['index', 'id' => $customer->id]);
            }
        }
        return $this->render('update', [
            'customer' => $customer,
            'address' => $address,
        ]);
    }

    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $model->delete();
        return $this->redirect(['index']);
    }

    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }
        throw new NotFoundHttpException('The requested page does not exist.');
    }

}