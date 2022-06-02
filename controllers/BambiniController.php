<?php

namespace app\controllers;

use app\controllers\UtentiController;
use app\models\TerapiaAssegnataSearch;
use app\models\Utenti;
use app\models\Bambini;
use app\models\BambiniSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BambiniController implements the CRUD actions for Bambini model.
 */
class BambiniController extends Controller
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
     * Lists all Bambini models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new BambiniSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bambini model.
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

    public function actionViewesercizi($idUtente)
    {
        return $this->render('viewesercizi', [
            'model' => $this->findModel($idUtente),
        ]);
    }


    public function actionViewlog($idUtente)
    {
        return $this->render('viewlog', [
            'model' => $this->findModel($idUtente),
        ]);
    }

    public function actionViewlogaggiungi($idUtente)
    {
        return $this->render('viewlogaggiungi', [
            'model' => $this->findModel($idUtente),
        ]);
    }

    /**
     * Creates a new Bambini model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Bambini();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                $utente = new Utenti();
                $utente->setTipo(5);
                return $this->redirect(['view',  'idUtente' => $model->idUtente]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Bambini model.
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
     * Deletes an existing Bambini model.
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

    public function actionAggiungi($idUtente)
    {
        $model = $this->findModel($idUtente);
        $model->idLogopedista = Yii::$app->user->id;
        $model->save();

        return $this->redirect(['logopedisti/listabambini']);
    }

    /**
     * Finds the Bambini model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idUtente Id Utente
     * @return Bambini the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idUtente)
    {
        if (($model = Bambini::findOne(['idUtente' => $idUtente])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionTerapiebambino($idBambino)
    {
        $searchModel = new TerapiaAssegnataSearch();
        $dataProvider = $searchModel->searchTerapie($this->request->queryParams, $idBambino);

        return $this->render('terapiebambino', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTerapiebambinocar($idBambino)
    {
        $searchModel = new TerapiaAssegnataSearch();
        $dataProvider = $searchModel->searchTerapie($this->request->queryParams, $idBambino);

        return $this->render('terapiebambinocar', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionTerapiepersonali()
    {
        $searchModel = new TerapiaAssegnataSearch();
        $dataProvider = $searchModel->searchTerapiepersonali($this->request->queryParams);

        return $this->render('terapiepersonali', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionDeletelog($idUtente)
    {
        $model = $this->findModel($idUtente);
        $model->idLogopedista = 'NULL';
        $model->save();


        return $this->redirect(['logopedisti/listabambini']);
    }


    public function actionViewcar($idUtente)
    {
        if($idUtente == 0){
            Yii::$app->session->setFlash('info', 'nessun bambino trovato, vai nel tuo profilo -> modifica e seleziona il desiderato');
            return $this->goHome();
        }
        return $this->render('viewcar', [
            'model' => $this->findModel($idUtente),
        ]);
    }

}
