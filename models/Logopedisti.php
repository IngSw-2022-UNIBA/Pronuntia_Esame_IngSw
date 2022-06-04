<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "logopedisti".
 *
 * @property int $idUtente
 * @property string $nome
 * @property string $cognome
 * @property int $matricola
 * @property string $inizioServizio
 * @property string $specializzazione
 * @property string $CF
 *
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
            [['idUtente', 'nome', 'cognome', 'matricola', 'inizioServizio', 'specializzazione', 'CF'], 'required'],
            [['idUtente', 'matricola'], 'integer'],
            [['nome', 'cognome', 'inizioServizio', 'specializzazione', 'CF'], 'string', 'max' => 25],
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
            'matricola' => 'Matricola',
            'inizioServizio' => 'Inizio servizio',
            'specializzazione' => 'Specializzazione',
            'CF' => 'Codice fiscale',
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
