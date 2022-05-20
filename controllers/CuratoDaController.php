<?php

namespace app\controllers;

use app\models\CuratoDa;
use app\models\CuratoDaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CuratoDaController implements the CRUD actions for CuratoDa model.
 */
class CuratoDaController extends Controller
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
     * Lists all CuratoDa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CuratoDaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CuratoDa model.
     * @param int $idLogopedista Id Logopedista
     * @param int $idCaregiver Id Caregiver
     * @param int $idBambino Id Bambino
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idLogopedista, $idCaregiver, $idBambino)
    {
        return $this->render('view', [
            'model' => $this->findModel($idLogopedista, $idCaregiver, $idBambino),
        ]);
    }

    /**
     * Creates a new CuratoDa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CuratoDa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idLogopedista' => $model->idLogopedista, 'idCaregiver' => $model->idCaregiver, 'idBambino' => $model->idBambino]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CuratoDa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idLogopedista Id Logopedista
     * @param int $idCaregiver Id Caregiver
     * @param int $idBambino Id Bambino
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idLogopedista, $idCaregiver, $idBambino)
    {
        $model = $this->findModel($idLogopedista, $idCaregiver, $idBambino);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idLogopedista' => $model->idLogopedista, 'idCaregiver' => $model->idCaregiver, 'idBambino' => $model->idBambino]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CuratoDa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idLogopedista Id Logopedista
     * @param int $idCaregiver Id Caregiver
     * @param int $idBambino Id Bambino
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idLogopedista, $idCaregiver, $idBambino)
    {
        $this->findModel($idLogopedista, $idCaregiver, $idBambino)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CuratoDa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idLogopedista Id Logopedista
     * @param int $idCaregiver Id Caregiver
     * @param int $idBambino Id Bambino
     * @return CuratoDa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idLogopedista, $idCaregiver, $idBambino)
    {
        if (($model = CuratoDa::findOne(['idLogopedista' => $idLogopedista, 'idCaregiver' => $idCaregiver, 'idBambino' => $idBambino])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
