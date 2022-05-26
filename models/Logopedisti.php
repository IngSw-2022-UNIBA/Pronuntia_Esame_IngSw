<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logopedisti".
 *
 * @property int $idUtente
 * @property string $nome
 * @property string $cognome
 *
 * @property Batterie[] $batterieDiEs
 * @property Utenti $idUtente0
 */
class Logopedisti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'logopedisti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['idUtente', 'nome', 'cognome'], 'required'],
            [['idUtente'], 'integer'],
            [['nome', 'cognome'], 'string', 'max' => 25],
            [['idUtente'], 'unique'],
            [['idUtente'], 'exist', 'skipOnError' => true, 'targetClass' => Utenti::className(), 'targetAttribute' => ['idUtente' => 'idUtente']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUtente' => 'Id Utente',
            'nome' => 'Nome',
            'cognome' => 'Cognome',
        ];
    }

    /**
     * Gets query for [[BatterieDiEs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBatterieDiEs()
    {
        return $this->hasMany(Batterie::className(), ['idLogopedista' => 'idUtente']);
    }



    /**
     * Gets query for [[IdUtente0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getIdUtente0()
    {
        return $this->hasOne(Utenti::className(), ['idUtente' => 'idUtente']);
    }
}
