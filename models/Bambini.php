<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "bambini".
 *
 * @property int $idUtente
 * @property string $nome
 * @property string $cognome
 * @property int $idLogopedista
 *
 *
 * @property Utenti $idUtente0
 */
class Bambini extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bambini';
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
            'toCar' => 'Passa al caregiver',

        ];
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
