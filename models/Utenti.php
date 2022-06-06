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
 * @property string $passwordRepeat
 *
 * @property Bambini $bambini
 * @property Caregiver $caregiver
 * @property Logopedisti $logopedisti
 */
class Utenti extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{

    public $password_repeat;

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
            [['email', 'password', 'password_repeat', 'tipoUtente'], 'required'],
            [['tipoUtente'], 'integer'],
            [['email'], 'string', 'max' => 55],
            ['email','email'],
            [['email'], 'unique'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
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
        return Yii::$app->security->validatePassword($password, $this->password);
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



    public static function isLogopedista($tipo){
        //solo se è logopedista non confermato
        if($tipo == 1){
            return true;
        }
        return false;
    }

    public static function isLogopedistaConf($tipo){
        //solo se è logopedista confermato
        if($tipo == 4){
            return true;
        }

        return false;
    }

    public static function isBambino($tipo){
        //solo se è bambino non confermato
        if($tipo == 2){
            return true;
        }
        return false;
    }

    public static function isBambinoConf($tipo){
        //solo se è bambino confermato
        if($tipo == 5){
            return true;
        }
        return false;
    }

    public static function isCaregiver($tipo){
        //solo se è Caregiver non confermato
        if($tipo == 3){
            return true;
        }
        return false;
    }

    public static function isCaregiverConf($tipo){
        //solo se è Caregiver confermato
        if($tipo == 6){
            return true;
        }
        return false;
    }

    // setta il tipo del utente loggato
    public static function setTipo($tipo){
        $model = UtentiSearch::findIdentity(Yii::$app->user->id);
        $model->tipoUtente = $tipo;
        $model->save();
    }

}
