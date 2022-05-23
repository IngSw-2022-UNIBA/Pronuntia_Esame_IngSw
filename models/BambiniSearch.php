<?php

namespace app\models;

use app\models\Bambini;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * BambiniSearch represents the model behind the search form of `app\models\Bambini`.
 */
class BambiniSearch extends Bambini
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUtente'], 'integer'],
            [['nome', 'cognome'], 'safe'],
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
        $query = Bambini::find();

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
            'idUtente' => $this->idUtente,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cognome', $this->cognome]);

        return $dataProvider;
    }

    public function searchPazienti($params)
    {
        $logopedista = Yii::$app->user->id;
        $query = Bambini::find()->select('*')->from('bambini')
            ->where("idLogopedista='$logopedista'");

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
            'idUtente' => $this->idUtente,
        ]);

        $query->andFilterWhere(['like', 'nome', $this->nome])
            ->andFilterWhere(['like', 'cognome', $this->cognome]);

        return $dataProvider;
    }
}
