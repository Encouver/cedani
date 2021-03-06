<?php

namespace backend\controllers;

use Yii;
use app\models\Productos;
use app\models\Inventarios;
use app\models\InventariosActual;
use app\models\ProductosSearch;
use app\models\HistoricoPrecios;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Json;
/**
 * ProductosController implements the CRUD actions for Productos model.
 */
class ProductosController extends Controller
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
     * Lists all Productos models.
     * @return mixed
     */
    public function actionConsultar()
    {
        $searchModel = new ProductosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('consultar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Lists all Productos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductosSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productos model.
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
     * Creates a new Productos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productos();
        $inventario = new Inventarios();
        $inventario_actual = new InventariosActual();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $inventario->producto_id = $model->id;
            $inventario->cantidad = 0;
            $inventario->fecha = new \yii\db\Expression('NOW()');
            $inventario->insert();
            $inventario_actual->producto_id = $model->id;
            $inventario_actual->cantidad = 0;
            $inventario_actual->insert();

            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Productos model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        $precio_viejo = $model->precio_venta;

        if ($model->load(Yii::$app->request->post())){
            if ($precio_viejo != $model->precio_venta){
                //inserto en historico precios
                $modelHistoricoPrecios = new HistoricoPrecios;
                $modelHistoricoPrecios->producto_id = $id;
                $modelHistoricoPrecios->precio = $precio_viejo;
                $modelHistoricoPrecios->fecha = date("Y-m-d H:i");
                $modelHistoricoPrecios->save();
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);

        

        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Productos model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }



    public function actionGetPrecio($productoId){
        $precio = Productos::findOne($productoId);
        echo Json::encode($precio);
    }
    /**
     * Finds the Productos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
