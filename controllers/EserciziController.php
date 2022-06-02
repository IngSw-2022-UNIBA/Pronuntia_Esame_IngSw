<?php

namespace app\controllers;

use app\models\Esercizi;
use app\models\Esercizifatti;
use app\models\EserciziSearch;
use app\models\TerapiaAssegnataSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EserciziController implements the CRUD actions for Esercizi model.
 */
class EserciziController extends Controller
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
     * Lists all Esercizi models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EserciziSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionEsercizidellabat($idBatteria)
    {
        $searchModel = new EserciziSearch();
        $dataProvider = $searchModel->searchEsercizidellabat($this->request->queryParams, $idBatteria);

        return $this->render('esercizidellabat', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idBatteria' => $idBatteria,
        ]);
    }

    /**
     * Displays a single Esercizi model.
     * @param int $idEsercizio Id Esercizio
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idEsercizio)
    {
        return $this->render('view', [
            'model' => $this->findModel($idEsercizio),
        ]);
    }

    /**
     * Creates a new Esercizi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Esercizi();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idEsercizio' => $model->idEsercizio]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Esercizi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idEsercizio Id Esercizio
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idEsercizio)
    {
        $model = $this->findModel($idEsercizio);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idEsercizio' => $model->idEsercizio]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Esercizi model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idEsercizio Id Esercizio
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idEsercizio)
    {
        $this->findModel($idEsercizio)->delete();

        return $this->redirect(['index']);
    }

    public function actionRimuovidallabat($idBatteria, $idEsercizio)
    {
        $connection = Yii::$app->getDb();
        $command = $connection->createCommand("DELETE FROM es_della_batteria WHERE idBatteria = '$idBatteria'  AND idEsercizio = '$idEsercizio'", [':start_date' => '1970-01-01']);
        $result = $command->queryAll();

        //--------------------------------------
        $searchModel = new EserciziSearch();
        $dataProvider = $searchModel->searchEsercizidellabat($this->request->queryParams, $idBatteria);

        return $this->render('esercizidellabat', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idBatteria' => $idBatteria,
        ]);
    }

    /**
     * Finds the Esercizi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idEsercizio Id Esercizio
     * @return Esercizi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idEsercizio)
    {
        if (($model = Esercizi::findOne(['idEsercizio' => $idEsercizio])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionEsercizibambino($idBatteria, $idTerapia)
    {
        $searchModel = new EserciziSearch();
        $dataProvider = $searchModel->searchEsercizidellabatteria($this->request->queryParams, $idBatteria, $idTerapia);

        return $this->render('esercizibambino', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idTerapia' => $idTerapia,
        ]);
    }

    public function actionViewesercizio($idEsercizio, $idTerapia)
    {

        $exists = Esercizifatti::find()->where( " idEsercizio = '$idEsercizio' and idTerapia = '$idTerapia' ")->exists();

        if($exists) {
            //it exists
            $model1 = Esercizifatti::findOne(['idTerapia' => $idTerapia, 'idEsercizio' => $idEsercizio]);

            return $this->render('viewesercizio', [
                'model' => $this->findModel($idEsercizio),
                'idTerapia' => $idTerapia,
                'stato' => $model1->stato,
            ]);
        }

        return $this->render('viewesercizio', [
            'model' => $this->findModel($idEsercizio),
            'idTerapia' => $idTerapia,
            'stato' => 2,
        ]);
    }
}
