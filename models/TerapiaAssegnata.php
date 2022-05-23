<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "terapie_assegnate".
 *
 * @property int $idTerapia
 * @property int $idBatteria
 * @property int $idBambino
 * @property string $data
 * @property string $Diagnosi
 *
 * @property Bambini $idBambino0
 * @property BatterieDiEs $idBatteria0
 */
class TerapiaAssegnata extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'terapie_assegnate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBatteria', 'idBambino', 'data', 'Diagnosi'], 'required'],
            [['idBatteria', 'idBambino'], 'integer'],
            [['data'], 'safe'],
            [['Diagnosi'], 'string'],
            [['idBatteria'], 'exist', 'skipOnError' => true, 'targetClass' => BatterieDiEs::className(), 'targetAttribute' => ['idBatteria' => 'idBatteria']],
            [['idBambino'], 'exist', 'skipOnError' => true, 'targetClass' => Bambini::className(), 'targetAttribute' => ['idBambino' => 'idUtente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTerapia' => 'Id Terapia',
            'idBatteria' => 'Id Batteria',
            'idBambino' => 'Id Bambino',
            'data' => 'Data',
            'Diagnosi' => 'Diagnosi',
        ];
    }

    /**
     * Gets query for [[IdBambino0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdBambino0()
    {
        return $this->hasOne(Bambini::className(), ['idUtente' => 'idBambino']);
    }

    /**
     * Gets query for [[IdBatteria0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdBatteria0()
    {
        return $this->hasOne(BatterieDiEs::className(), ['idBatteria' => 'idBatteria']);
    }
}
