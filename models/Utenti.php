<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utenti".
 *
 * @property int $idUtente
 * @property string $email
 * @property string $password
 * @property int $tipoUtente
 *
 * @property Bambini $bambini
 * @property Caregiver $caregiver
 * @property Logopedisti $logopedisti
 */
class Utenti extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'utenti';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'tipoUtente'], 'required'],
            [['tipoUtente'], 'integer'],
            [['email'], 'string', 'max' => 55],
            [['password'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idUtente' => 'Id Utente',
            'email' => 'Email',
            'password' => 'Password',
            'tipoUtente' => 'Tipo Utente',
        ];
    }

    /**
     * Gets query for [[Bambini]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBambini()
    {
        return $this->hasOne(Bambini::className(), ['idUtente' => 'idUtente']);
    }

    /**
     * Gets query for [[Caregiver]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCaregiver()
    {
        return $this->hasOne(Caregiver::className(), ['idUtente' => 'idUtente']);
    }

    /**
     * Gets query for [[Logopedisti]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLogopedisti()
    {
        return $this->hasOne(Logopedisti::className(), ['idUtente' => 'idUtente']);
    }
}
