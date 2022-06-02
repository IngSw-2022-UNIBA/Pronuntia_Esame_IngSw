<?php

namespace app\models;

use app\models\Esercizi;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * EserciziSearch represents the model behind the search form of `app\models\Esercizi`.
 */
class EserciziSearch extends Esercizi
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idEsercizio'], 'integer'],
            [['testo', 'link'], 'safe'],
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
        $query = Esercizi::find();

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
            'idEsercizio' => $this->idEsercizio,
        ]);

        $query->andFilterWhere(['like', 'testo', $this->testo])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }

    public function searchnotinbat($params, $idBatteria)
    {
        $query = Esercizi::find()->select('esercizi.idEsercizio, testo, link')->from('es_della_batteria, esercizi')->where("es_della_batteria.idEsercizio = esercizi.idEsercizio and esercizi.idEsercizio NOT IN (SELECT idEsercizio from es_della_batteria where idBatteria = '$idBatteria')")->distinct();

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
            'idEsercizio' => $this->idEsercizio,
        ]);

        $query->andFilterWhere(['like', 'testo', $this->testo])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }

    public function searchEsercizidellabatteria($params, $idBatteria, $idTerapia)
    {

        //$query = Esercizi::find()->select('*')->from('esercizi, es_della_batteria, esercizifatti')
          //  ->where("esercizi.idEsercizio = es_della_batteria.idEsercizio and idBatteria = '$idBatteria' and esercizifatti.idTerapia = '$idTerapia' and  esercizifatti.idEsercizio = esercizi.idEsercizio and (stato is null or stato = 0)");

        $query = Esercizi::find()->select('*')->from('esercizi, es_della_batteria')
          ->where("esercizi.idEsercizio = es_della_batteria.idEsercizio and idBatteria = '$idBatteria'");


        //$query = Esercizi::find()->select('*')->from('es_della_batteria')->rightJoin( "esercizi", "esercizi.idEsercizio = es_della_batteria.idEsercizio");

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
            'idEsercizio' => $this->idEsercizio,
        ]);

        $query->andFilterWhere(['like', 'testo', $this->testo])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }

    public function searchEsercizidellabat($params, $idBatteria)
    {

        //$query = Esercizi::find()->select('*')->from('esercizi, es_della_batteria, esercizifatti')
        //  ->where("esercizi.idEsercizio = es_della_batteria.idEsercizio and idBatteria = '$idBatteria' and esercizifatti.idTerapia = '$idTerapia' and  esercizifatti.idEsercizio = esercizi.idEsercizio and (stato is null or stato = 0)");

        $query = Esercizi::find()->select('*')->from('esercizi, es_della_batteria')
            ->where("esercizi.idEsercizio = es_della_batteria.idEsercizio and idBatteria = '$idBatteria'");


        //$query = Esercizi::find()->select('*')->from('es_della_batteria')->rightJoin( "esercizi", "esercizi.idEsercizio = es_della_batteria.idEsercizio");

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
            'idEsercizio' => $this->idEsercizio,
        ]);

        $query->andFilterWhere(['like', 'testo', $this->testo])
            ->andFilterWhere(['like', 'link', $this->link]);

        return $dataProvider;
    }
}
