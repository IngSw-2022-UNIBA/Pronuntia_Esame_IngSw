<?php

namespace app\controllers;

use app\controllers\UtentiController;
use app\models\Utenti;
use app\models\Caregiver;
use app\models\CaregiverSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use app\models\TerapiaAssegnataSearch;
use app\models\Bambini;
use app\models\BambiniSearch;

/**
 * CaregiverController implements the CRUD actions for Caregiver model.
 */
class CaregiverController extends Controller
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
     * Lists all Caregiver models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CaregiverSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Caregiver model.
     * @param int $idUtente Id Utente
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idUtente)
    {
        return $this->render('view', [
            'model' => $this->findModel($idUtente),
        ]);
    }

    public function actionViewlog($idUtente)
    {
        return $this->render('viewlog', [
            'model' => $this->findModel($idUtente),
        ]);
    }

    /**
     * Creates a new Caregiver model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Caregiver();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                // Imposto il tipo utente a 6 che significa utente registrato con conferma
                $utente = new Utenti();
                $utente->setTipo(6);
                return $this->redirect(['view', 'idUtente' => $model->idUtente]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Caregiver model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idUtente Id Utente
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idUtente)
    {
        $model = $this->findModel($idUtente);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idUtente' => $model->idUtente]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Caregiver model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idUtente Id Utente
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idUtente)
    {
        $this->findModel($idUtente)->delete();

        $modelutente = Utenti::findOne(['idUtente' => $idUtente]);
        $modelutente->delete($idUtente);

        return $this->goHome();
    }


    /**
     * Finds the Caregiver model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idUtente Id Utente
     * @return Caregiver the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUtente)
    {
        if (($model = Caregiver::findOne(['idUtente' => $idUtente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionDeletebambino($idUtente)
    {
        $model = $this->findModel($idUtente);
        $bambino = $model->idBambino;
        $model->idBambino = 'NULL';
        $model->save();


        return $this->redirect(['caregiver/caregiversdelbambino', 'idBambino' => $bambino]);
    }

    public function actionCaregiversdelbambino($idBambino)
    {
        $searchModel = new CaregiverSearch();
        $dataProvider = $searchModel->searchCaregiversdelbambino($this->request->queryParams, $idBambino);

        return $this->render('caregiversdelbambino', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'idBambino' => $idBambino,
        ]);
    }

    public function actionAggiungi($bambino, $idUtente)
    {
        $model = $this->findModel($idUtente);
        $model->idBambino = $bambino;
        $model->save();
        return $this->redirect(['caregiver/caregiversdelbambino', 'idBambino' => $bambino]);
    }

}
