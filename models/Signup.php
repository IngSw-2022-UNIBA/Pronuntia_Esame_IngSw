<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class Signup extends Model
{
    public $email;
    public $password;
    public $password_repeat;
    public $tipoUtente;

    private $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password', 'password_repeat', 'tipoUtente'], 'required'],
            [['email'], 'string', 'max' => 55],
            [['password', 'password_repeat'], 'string', 'min' =>4, 'max' =>25],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
            [['tipoUtente'], 'integer'],
        ];
    }

    public function signup(){
        $utente = new Utenti();
        $utente->email = $this->email; //$this->email mi restituisce null 
        $utente->password = Yii::$app->security->generatePasswordHash($this->password_repeat);
        $utente->tipoUtente = $this->tipoUtente; //$this->tipoUtente mi restituisce null 

        if($utente->save(false)){
            return true;
        }

        Yii::error('Non salvato');
    }
}
