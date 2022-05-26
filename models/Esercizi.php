<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "esercizi".
 *
 * @property int $idEsercizio
 * @property string $testo
 * @property string $link
 *
 * @property EsDellaBatteria[] $esDellaBatterias
 * @property Esercizifatti[] $esercizifattis
 * @property Batterie[] $idBatterias
 * @property TerapieAssegnate[] $idTerapias
 */
class Esercizi extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'esercizi';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['testo', 'link'], 'required'],
            [['testo'], 'string'],
            [['link'], 'string', 'max' => 500],
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
            'link' => 'Link',
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
     * Gets query for [[Esercizifattis]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsercizifattis()
    {
        return $this->hasMany(Esercizifatti::className(), ['idEsercizio' => 'idEsercizio']);
    }

    /**
     * Gets query for [[IdBatterias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdBatterias()
    {
        return $this->hasMany(Batterie::className(), ['idBatteria' => 'idBatteria'])->viaTable('es_della_batteria', ['idEsercizio' => 'idEsercizio']);
    }

    /**
     * Gets query for [[IdTerapias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTerapias()
    {
        return $this->hasMany(TerapieAssegnate::className(), ['idTerapia' => 'idTerapia'])->viaTable('esercizifatti', ['idEsercizio' => 'idEsercizio']);
    }
}
