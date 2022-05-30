<?php

namespace app\controllers;

use app\models\Pretest;
use app\models\PretestSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PretestController implements the CRUD actions for Pretest model.
 */
class PretestController extends Controller
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
     * Lists all Pretest models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new PretestSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pretest model.
     * @param int $idPretest Id Pretest
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idPretest)
    {
        return $this->render('view', [
            'model' => $this->findModel($idPretest),
        ]);
    }

    /**
     * Creates a new Pretest model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Pretest();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->goHome();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pretest model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idPretest Id Pretest
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idPretest)
    {
        $model = $this->findModel($idPretest);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idPretest' => $model->idPretest]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pretest model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idPretest Id Pretest
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idPretest)
    {
        $this->findModel($idPretest)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Pretest model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idPretest Id Pretest
     * @return Pretest the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idPretest)
    {
        if (($model = Pretest::findOne(['idPretest' => $idPretest])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
