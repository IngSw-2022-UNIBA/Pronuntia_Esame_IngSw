<?php

namespace app\models;

use app\models\CuratoDa;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CuratoDaSearch represents the model behind the search form of `app\models\CuratoDa`.
 */
class CuratoDaSearch extends CuratoDa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data'], 'safe'],
            [['idLogopedista', 'idCaregiver', 'idBambino'], 'integer'],
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
        $query = CuratoDa::find();

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
            'data' => $this->data,
            'idLogopedista' => $this->idLogopedista,
            'idCaregiver' => $this->idCaregiver,
            'idBambino' => $this->idBambino,
        ]);

        return $dataProvider;
    }

    // funzione che ricerca i pazienti del logopedista

    public function searchPazienti($params)
    {
        $logopedista = Yii::$app->user->id;
        $query = Utenti::find()->select('*')->from('utenti')
            ->join("join", "bambini", "utenti.idUtente = bambini.idUtente")
            ->where("bambini.idUtente='$logopedista'");

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
            'data' => $this->data,
            'idLogopedista' => $this->idLogopedista,
            'idCaregiver' => $this->idCaregiver,
            'idBambino' => $this->idBambino,
        ]);

        return $dataProvider;

    }
}
