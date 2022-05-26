<?php

namespace app\controllers;

use app\models\Batterie;
use app\models\BatterieSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BatterieController implements the CRUD actions for Batterie model.
 */
class BatterieController extends Controller
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
     * Lists all Batterie models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BatterieSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Batterie model.
     * @param int $idBatteria Id Batteria
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idBatteria)
    {
        return $this->render('view', [
            'model' => $this->findModel($idBatteria),
        ]);
    }

    /**
     * Creates a new Batterie model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Batterie();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idBatteria' => $model->idBatteria]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Batterie model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idBatteria Id Batteria
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idBatteria)
    {
        $model = $this->findModel($idBatteria);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idBatteria' => $model->idBatteria]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Batterie model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idBatteria Id Batteria
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idBatteria)
    {
        $this->findModel($idBatteria)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Batterie model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idBatteria Id Batteria
     * @return Batterie the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idBatteria)
    {
        if (($model = Batterie::findOne(['idBatteria' => $idBatteria])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
