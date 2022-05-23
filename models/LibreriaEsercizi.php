<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "librerie_esercizi".
 *
 * @property int $idEsercizio
 * @property string $testo
 *
 * @property EsDellaBatteria[] $esDellaBatterias
 * @property BatterieDiEs[] $idBatterias
 */
class LibreriaEsercizi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'librerie_esercizi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['testo'], 'required'],
            [['testo'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idEsercizio' => 'Id Esercizio',
            'testo' => 'Testo',
        ];
    }

    /**
     * Gets query for [[EsDellaBatterias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsDellaBatterias()
    {
        return $this->hasMany(EsDellaBatteria::className(), ['idEsercizio' => 'idEsercizio']);
    }

    /**
     * Gets query for [[IdBatterias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdBatterias()
    {
        return $this->hasMany(BatterieDiEs::className(), ['idBatteria' => 'idBatteria'])->viaTable('es_della_batteria', ['idEsercizio' => 'idEsercizio']);
    }
}
