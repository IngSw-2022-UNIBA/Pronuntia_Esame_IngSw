<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "es_della_batteria".
 *
 * @property int $idBatteria
 * @property int $idEsercizio
 *
 * @property BatterieDiEs $idBatteria0
 * @property LibrerieEsercizi $idEsercizio0
 */
class EserciziBatteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'es_della_batteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idBatteria', 'idEsercizio'], 'required'],
            [['idBatteria', 'idEsercizio'], 'integer'],
            [['idBatteria', 'idEsercizio'], 'unique', 'targetAttribute' => ['idBatteria', 'idEsercizio']],
            [['idBatteria'], 'exist', 'skipOnError' => true, 'targetClass' => BatterieDiEs::className(), 'targetAttribute' => ['idBatteria' => 'idBatteria']],
            [['idEsercizio'], 'exist', 'skipOnError' => true, 'targetClass' => LibrerieEsercizi::className(), 'targetAttribute' => ['idEsercizio' => 'idEsercizio']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idBatteria' => 'Id Batteria',
            'idEsercizio' => 'Id Esercizio',
        ];
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

    /**
     * Gets query for [[IdEsercizio0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEsercizio0()
    {
        return $this->hasOne(LibrerieEsercizi::className(), ['idEsercizio' => 'idEsercizio']);
    }
}
