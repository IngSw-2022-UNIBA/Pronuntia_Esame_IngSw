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
class Utenti extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
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
            ['email','email'],
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
     * {@inheritdoc}
     */
    public static function findIdentity($idUtente)
    {
        return self::findOne($idUtente);
    } 

    public static function findIdentityByAccessToken($token, $type = null)
    {
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return self::findOne(['email' => $username]);
    }

       /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->idUtente;
    }

    /**
     * @return string|null current user auth key
     */
    public function getAuthKey()
    {
    }

    public function validateAuthKey($authKey)
    {
    }


    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
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
