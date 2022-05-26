<?php

namespace app\controllers;

use app\models\TerapiaAssegnata;
use app\models\TerapiaAssegnataSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TerapiaAssegnataController implements the CRUD actions for TerapiaAssegnata model.
 */
class TerapiaAssegnataController extends Controller
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
     * Lists all TerapiaAssegnata models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TerapiaAssegnataSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TerapiaAssegnata model.
     * @param int $idTerapia Id Terapia
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTerapia)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTerapia),
        ]);
    }

    /**
     * Creates a new TerapiaAssegnata model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($bambino)
    {
        $model = new TerapiaAssegnata();
        $model->idBambino= $bambino;
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idTerapia' => $model->idTerapia]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TerapiaAssegnata model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTerapia Id Terapia
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTerapia)
    {
        $model = $this->findModel($idTerapia);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTerapia' => $model->idTerapia]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TerapiaAssegnata model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTerapia Id Terapia
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTerapia)
    {
        $this->findModel($idTerapia)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TerapiaAssegnata model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTerapia Id Terapia
     * @return TerapiaAssegnata the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTerapia)
    {
        if (($model = TerapiaAssegnata::findOne(['idTerapia' => $idTerapia])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
