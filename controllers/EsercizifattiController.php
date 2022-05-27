<?php

namespace app\controllers;

use app\models\Esercizifatti;
use app\models\EsercizifattiSearch;
use app\models\TerapiaAssegnata;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EsercizifattiController implements the CRUD actions for Esercizifatti model.
 */
class EsercizifattiController extends Controller
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
     * Lists all Esercizifatti models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EsercizifattiSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Esercizifatti model.
     * @param int $idTerapia Id Terapia
     * @param int $idEsercizio Id Esercizio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idTerapia, $idEsercizio)
    {
        return $this->render('view', [
            'model' => $this->findModel($idTerapia, $idEsercizio),
        ]);
    }

    /**
     * Creates a new Esercizifatti model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Esercizifatti();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idTerapia' => $model->idTerapia, 'idEsercizio' => $model->idEsercizio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Esercizifatti model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idTerapia Id Terapia
     * @param int $idEsercizio Id Esercizio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idTerapia, $idEsercizio)
    {
        $model = $this->findModel($idTerapia, $idEsercizio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idTerapia' => $model->idTerapia, 'idEsercizio' => $model->idEsercizio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Esercizifatti model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idTerapia Id Terapia
     * @param int $idEsercizio Id Esercizio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idTerapia, $idEsercizio)
    {
        $this->findModel($idTerapia, $idEsercizio)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Esercizifatti model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idTerapia Id Terapia
     * @param int $idEsercizio Id Esercizio
     * @return Esercizifatti the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idTerapia, $idEsercizio)
    {
        if (($model = Esercizifatti::findOne(['idTerapia' => $idTerapia, 'idEsercizio' => $idEsercizio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionBene($idEsercizio, $idTerapia)
    {
        $exists = Esercizifatti::find()->where( " idEsercizio = '$idEsercizio' and idTerapia = '$idTerapia' ")->exists();

        if($exists) {
            //it exists
            $model = $this->findModel($idTerapia, $idEsercizio);
        } else {
            $model = new Esercizifatti();
            $model->idTerapia = $idTerapia;
            $model->idEsercizio = $idEsercizio;
        }

        $model->stato = 1;
        $model->save();

        $terapia = $model = TerapiaAssegnata::findOne(['idTerapia' => $idTerapia]);


        return $this->redirect(['esercizi/esercizibambino',
            'idBatteria' => $terapia->idBatteria,
            'idTerapia' => $idTerapia,
        ]);
    }
    public function actionMale($idEsercizio, $idTerapia)
    {
        $exists = Esercizifatti::find()->where( " idEsercizio = '$idEsercizio' and idTerapia = '$idTerapia' ")->exists();

        if($exists) {
            //it exists
            $model = $this->findModel($idTerapia, $idEsercizio);
        } else {
            $model = new Esercizifatti();
            $model->idTerapia = $idTerapia;
            $model->idEsercizio = $idEsercizio;
        }

        $model->stato = 0;
        $model->save();

        $terapia = $model = TerapiaAssegnata::findOne(['idTerapia' => $idTerapia]);


        return $this->redirect(['esercizi/esercizibambino',
            'idBatteria' => $terapia->idBatteria,
            'idTerapia' => $idTerapia,
        ]);
    }
}
