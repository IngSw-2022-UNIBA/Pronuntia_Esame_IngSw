<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "esercizifatti".
 *
 * @property int $idTerapia
 * @property int $idEsercizio
 * @property int $stato
 *
 * @property Esercizi $idEsercizio0
 * @property TerapiaAssegnata $idTerapia0
 */
class Esercizifatti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'esercizifatti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idTerapia', 'idEsercizio'], 'required'],
            [['idTerapia', 'idEsercizio', 'stato'], 'integer'],
            [['idTerapia', 'idEsercizio'], 'unique', 'targetAttribute' => ['idTerapia', 'idEsercizio']],
            [['idEsercizio'], 'exist', 'skipOnError' => true, 'targetClass' => Esercizi::className(), 'targetAttribute' => ['idEsercizio' => 'idEsercizio']],
            [['idTerapia'], 'exist', 'skipOnError' => true, 'targetClass' => TerapiaAssegnata::className(), 'targetAttribute' => ['idTerapia' => 'idTerapia']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idTerapia' => 'Id Terapia',
            'idEsercizio' => 'Id Esercizio',
            'stato' => 'Stato',
        ];
    }

    /**
     * Gets query for [[IdEsercizio0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEsercizio0()
    {
        return $this->hasOne(Esercizi::className(), ['idEsercizio' => 'idEsercizio']);
    }

    /**
     * Gets query for [[IdTerapia0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdTerapia0()
    {
        return $this->hasOne(TerapiaAssegnata::className(), ['idTerapia' => 'idTerapia']);
    }
}
