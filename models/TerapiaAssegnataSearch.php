<?php

namespace app\models;

use app\models\TerapiaAssegnata;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * TerapiaAssegnataSearch represents the model behind the search form of `app\models\TerapiaAssegnata`.
 */
class TerapiaAssegnataSearch extends TerapiaAssegnata
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTerapia', 'idBatteria', 'idBambino'], 'integer'],
            [['data', 'Diagnosi'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = TerapiaAssegnata::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idTerapia' => $this->idTerapia,
            'idBatteria' => $this->idBatteria,
            'idBambino' => $this->idBambino,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'Diagnosi', $this->Diagnosi]);

        return $dataProvider;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function searchTerapie($params, $idBambino)
    {
        $logopedista = Bambini::findOne(['idUtente' => $idBambino])->idLogopedista;

        $query = TerapiaAssegnata::find()->select('*')->from('terapie_assegnate')
            ->join("JOIN", "bambini", "terapie_assegnate.idBambino = bambini.idUtente")
            ->where("bambini.idLogopedista='$logopedista' AND terapie_assegnate.idBambino='$idBambino'");

        //-----

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idTerapia' => $this->idTerapia,
            'idBatteria' => $this->idBatteria,
            'idBambino' => $this->idBambino,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'Diagnosi', $this->Diagnosi]);

        return $dataProvider;
    }

    public function searchTerapiepersonali($params)
    {
        $bambino = Yii::$app->user->id;
        $query = TerapiaAssegnata::find()->select('*')->from('terapie_assegnate')
            ->where("idBambino='$bambino'");

        //-----

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idTerapia' => $this->idTerapia,
            'idBatteria' => $this->idBatteria,
            'idBambino' => $this->idBambino,
            'data' => $this->data,
        ]);

        $query->andFilterWhere(['like', 'Diagnosi', $this->Diagnosi]);

        return $dataProvider;
    }
}
