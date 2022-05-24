<?php

namespace app\models;

use app\models\Caregiver;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * CaregiverSearch represents the model behind the search form of `app\models\Caregiver`.
 */
class CaregiverSearch extends Caregiver
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
        $query = Caregiver::find();

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

    public function searchCaregiversdelbambino($params, $idBambino)
    {
        $logopedista = Yii::$app->user->id;
        $query = Caregiver::find()->select('*')->from('caregiver')
            ->where("idBambino = '$idBambino'");
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

    public function searchCaregiverssenzabambino($params)
    {
        $query = Caregiver::find()->select('*')->from('caregiver')
            ->where("idBambino is NULL || idBambino = 0");
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
