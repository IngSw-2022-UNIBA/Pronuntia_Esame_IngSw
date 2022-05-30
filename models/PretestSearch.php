<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pretest;

/**
 * PretestSearch represents the model behind the search form of `app\models\Pretest`.
 */
class PretestSearch extends Pretest
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idPretest', 'domanda1', 'domanda2', 'domanda3', 'telefono', 'idLogopedista', 'stato'], 'integer'],
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
        $query = Pretest::find();

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
            'idPretest' => $this->idPretest,
            'domanda1' => $this->domanda1,
            'domanda2' => $this->domanda2,
            'domanda3' => $this->domanda3,
            'telefono' => $this->telefono,
            'idLogopedista' => Yii::$app->user->id,
            'stato' => 0,
        ]);

        return $dataProvider;
    }
}
