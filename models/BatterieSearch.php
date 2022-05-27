<?php

namespace app\models;

use app\models\Batterie;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BatterieSearch represents the model behind the search form of `app\models\Batterie`.
 */
class BatterieSearch extends Batterie
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBatteria', 'idLogopedista'], 'integer'],
            [['nome', 'descrizione', 'categoria'], 'safe'],
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
        $query = Batterie::find();

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
            'idBatteria' => $this->idBatteria,
            'idLogopedista' => $this->idLogopedista,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descrizione', $this->descrizione])
            ->andFilterWhere(['like', 'categoria', $this->categoria]);

        return $dataProvider;
    }
    public function searchperlog($params, $idLogopedista)
    {
        $query = Batterie::find()->where("idLogopedista = '$idLogopedista'");

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
            'idBatteria' => $this->idBatteria,
            'idLogopedista' => $this->idLogopedista,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'descrizione', $this->descrizione])
            ->andFilterWhere(['like', 'categoria', $this->categoria]);

        return $dataProvider;
    }
}
