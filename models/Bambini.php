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
 * @property string $dataDiNascita
 * @property string $CF
 * @property string $notePersonali
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
            [['idUtente', 'nome', 'cognome', 'dataDiNascita', 'CF'], 'required'],
            [['idUtente'], 'integer'],
            [['nome', 'cognome', 'dataDiNascita', 'CF'], 'string', 'max' => 25],
            [['notePersonali'], 'string', 'max' => 45],
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
            'dataDiNascita' => 'Data di nascita',
            'CF' => 'Codice fiscale',
            'notePersonali' => 'Note personali',

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
