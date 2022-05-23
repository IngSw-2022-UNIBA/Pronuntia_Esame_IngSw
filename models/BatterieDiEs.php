<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "batterie_di_es".
 *
 * @property int $idBatteria
 * @property string $nome
 * @property string $descrizione
 * @property string $categoria
 * @property int $idLogopedista
 *
 * @property EsDellaBatteria[] $esDellaBatterias
 * @property LibrerieEsercizi[] $idEsercizios
 * @property Logopedisti $idLogopedista0
 * @property TerapieAssegnate[] $terapieAssegnates
 */
class BatterieDiEs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'batterie_di_es';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nome', 'descrizione', 'categoria', 'idLogopedista'], 'required'],
            [['descrizione'], 'string'],
            [['idLogopedista'], 'integer'],
            [['nome'], 'string', 'max' => 25],
            [['categoria'], 'string', 'max' => 55],
            [['idLogopedista'], 'exist', 'skipOnError' => true, 'targetClass' => Logopedisti::className(), 'targetAttribute' => ['idLogopedista' => 'idUtente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idBatteria' => 'Id Batteria',
            'nome' => 'Nome',
            'descrizione' => 'Descrizione',
            'categoria' => 'Categoria',
            'idLogopedista' => 'Id Logopedista',
        ];
    }

    /**
     * Gets query for [[EsDellaBatterias]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEsDellaBatterias()
    {
        return $this->hasMany(EsDellaBatteria::className(), ['idBatteria' => 'idBatteria']);
    }

    /**
     * Gets query for [[IdEsercizios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdEsercizios()
    {
        return $this->hasMany(LibrerieEsercizi::className(), ['idEsercizio' => 'idEsercizio'])->viaTable('es_della_batteria', ['idBatteria' => 'idBatteria']);
    }

    /**
     * Gets query for [[IdLogopedista0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdLogopedista0()
    {
        return $this->hasOne(Logopedisti::className(), ['idUtente' => 'idLogopedista']);
    }

    /**
     * Gets query for [[TerapieAssegnates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTerapieAssegnates()
    {
        return $this->hasMany(TerapieAssegnate::className(), ['idBatteria' => 'idBatteria']);
    }
}
